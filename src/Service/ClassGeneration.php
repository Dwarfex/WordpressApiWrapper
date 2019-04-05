<?php


namespace Somecoding\WordpressApiWrapper\Service;


use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Hashids\Hashids;
use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Helpers;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PhpNamespace;
use Nette\PhpGenerator\PsrPrinter;
use Psr\SimpleCache\CacheInterface;

class ClassGeneration
{
    const API_CACHING_TIME = 100;
    protected $clientInterface;

    /**
     * @var CacheInterface
     */
    protected $cacheInterface;

    public function __construct(ClientInterface $client, CacheInterface $cache = null)
    {
        $this->clientInterface = $client;
        $this->cacheInterface  = $cache;
    }

    public function generateClassesFromApi(string $url, string $apiNamespace)
    {
        $json = null;
        try {
            $json = $this->getJsonFromApi($url);
            if ($this->isValidJsonResponse($json)) {

            }
        } catch (\Exception $exception) {

        }
        $arrayStructure = json_decode($json, true);

        $generated = $this->generateClassFromArray($arrayStructure, 'Base', $apiNamespace);
    }

    //recursive?
    protected function generateClassFromArray(array $array, $classname = 'Base', $namespaceString = '')
    {

        $properties = [];
        $usages = [];
        $printer = new PsrPrinter();
        $file = new PhpFile();
        $file->addComment('This file is auto-generated.');
        $file->setStrictTypes(); // adds declare(strict_types=1)

        $namespace = $file->addNamespace($namespaceString);
        $class = $namespace->addClass($classname);
//        $file->addClass($class->getName());


//        $namespace->add($class);

        if(empty($array)){
            $file->addComment('This point has no vlaues.');
        }
        $consideredProperties = [];

        foreach ($array as $item => $value) {
            if (!is_array($value)) {
                $class = $this->addPropertyWithGetterAndSetter($class, $item, gettype($value), true);
                continue;
            }

            // We have an array here
            if (!$this->arrayOnlyContainsSubArrays($value)) {

                $class = $this->addPropertyWithGetterAndSetter($class, $item, gettype($value), true, $value);
                continue;
            }

            // At this point we have an array we should create a new class for
            $class = $this->addPropertyWithGetterAndSetter($class, $item, $this->camelCase($item).'[]', false, null);
            $usages[] = $namespaceString.'\\'.$classname.'\\'.$this->camelCase($item);

            $test = $this->generateClassFromArray($value, $this->camelCase($item, true), $namespaceString.'\\'.$classname);
            continue;
            //var_dump($item, $value);

        }
        foreach ($usages as $useStatement){
            $namespace->addUse($useStatement);
        }
//        echo $printer->printFile($file);








//        echo $file;

        var_dump($usages);
        $filename = str_replace('\\', '/', $namespaceString);
        $filename = $filename.'/'.$classname.'.ignore.php';
        $foldername = dirname($filename);
        if(!file_exists($foldername)){
            mkdir($foldername, 0777, true);
        }
        file_put_contents($filename, (new PsrPrinter)->printFile($file));
        return true;
    }

    protected function addPropertyWithGetterAndSetter(ClassType $class, string $propertyName, string $propertyType, bool $isNullable, $value = null){
        if(!Helpers::isIdentifier($propertyName)){

            $hashids = new Hashids('', 10, 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
            $propertyName = $hashids->encodeHex(md5($propertyName));
            var_dump($propertyName);

//            return $class;
        }
        $property = $class->addProperty($this->camelCase($propertyName, false))
            ->addComment('')
            ->addComment('@var ' . $propertyType)
            ->addComment('');

        if ($value !== null) {
            $property->setValue($value);
        }

        $isObjectArrayPropertie = false;
        if(substr($propertyType, -2, 2) === '[]'){
            $isObjectArrayPropertie = true;
        }


        $getMethod =
            $class->addMethod('get' . $this->camelCase($propertyName))

            ->setReturnNullable()->setBody('return $this->' . $this->camelCase($propertyName, false).';');
        if(!$isObjectArrayPropertie){
            $getMethod->setReturnType(gettype($value));
        }else {
            $getMethod->setReturnType('array');
        }
        if($getMethod->getReturnNullable()){
            $returnString = '@return null|'.$propertyType;
        } else {
            $returnString = '@return '.$propertyType;
        }
        $getMethod
            ->addComment('')
            ->addComment($returnString)
            ->addComment('');

        $setMethod = $class->addMethod('set' . $this->camelCase($propertyName))
            ->setReturnType($class->getName());
        $setMethod->setBody('$this->' . $this->camelCase($propertyName, false) . ' = $' . $this->camelCase($propertyName, false) . ';' . PHP_EOL . PHP_EOL . 'return $this;');
        if($isObjectArrayPropertie){
            $setterProperty = 'array';

        }else {
            $setterProperty = $propertyType;
        }
        $setMethod->addParameter($this->camelCase($propertyName, false))->setTypeHint($setterProperty);


        $setterTypeHint = sprintf('@param %s $%s', $setterProperty,$this->camelCase($propertyName, false));
        $setMethod
            ->addComment('')
            ->addComment($setterTypeHint)
            ->addComment('@return $this')
            ->addComment('');
        return $class;
    }


    protected function arrayOnlyContainsSubArrays(array $arrayToCheck): bool
    {
        $everySubItemIsArray = true;

        foreach ($arrayToCheck as $checkForArray) {
            if (!is_array($checkForArray)) {
                return false;

            }
        }

        return $everySubItemIsArray;
    }


    /**
     * @param $url
     * @param null $parameters
     * @return string|null
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    protected function getJsonFromApi($url, $parameters = null): ?string
    {
        $cachedValue = false;
        if ($this->cacheInterface instanceof CacheInterface) {
            $cachedValue = $this->cacheInterface->get(md5($url . serialize($parameters)), false);
        }

        if ($cachedValue !== false) {
            return $cachedValue;
        }

        $response = $this->clientInterface->request('GET', $url, ['query' => $parameters]);
        $content  = $response->getBody()->getContents();

        if ($this->isValidJsonResponse(json_encode($content))) {
            if ($this->cacheInterface instanceof CacheInterface) {
                $this->cacheInterface->set(md5($url . serialize($parameters)), $content, self::API_CACHING_TIME);
            }
            return $content;
        }

        return null;
    }


    /**
     * @param string $responseData
     * @return bool
     */
    protected function isValidJsonResponse(string $responseData): bool
    {
        if (!empty($responseData)) {
            try {
                json_decode($responseData);
            } catch (\Throwable $throwable) {
                return false;
            }
            return (json_last_error() === JSON_ERROR_NONE);
        }

        return false;

    }


    protected function camelCase($str, $firstCharIsUpperCase = true, array $noStrip = [])
    {
        // non-alpha and non-numeric characters become spaces
        $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
        $str = trim($str);
        // uppercase the first character of each word
        $str = ucwords($str);
        $str = str_replace(" ", "", $str);

        if ($firstCharIsUpperCase) {
            $str = ucfirst($str);
        } else {
            $str = lcfirst($str);
        }

        return $str;
    }
}
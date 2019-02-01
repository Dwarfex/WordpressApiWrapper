<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Model;

/**
 * Class Endpoint
 * @package WordpressApiWrapper\Model
 */
class Endpoint extends HydratableModel
{
    /**
     * @var string[]
     */
    protected $methods;

    /**
     * @var array
     */
    protected $args;

    /**
     * @return string[]
     */
    public function getMethods(): array
    {
        return $this->methods;
    }

    /**
     * @param string[] $methods
     * @return Endpoint
     */
    public function setMethods(array $methods): Endpoint
    {
        $this->methods = $methods;
        return $this;
    }

    /**
     * @return array
     */
    public function getArgs(): array
    {
        return $this->args;
    }

    /**
     * @param array $args
     * @return Endpoint
     */
    public function setArgs(array $args): Endpoint
    {
        $this->args = $args;
        return $this;
    }
}

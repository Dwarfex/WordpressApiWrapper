<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Model;

use Zend\Hydrator\HydratorInterface;

/**
 * Class HydratableModel
 * @package Somecoding\WordpressApiWrapper\Model
 */
class HydratableModel
{
    /**
     * @var HydratorInterface
     */
    protected $hydrator;

    /**
     * HydratableModel constructor.
     * @param HydratorInterface $hydrator
     */
    public function __construct(HydratorInterface $hydrator)
    {
        $this->hydrator = $hydrator;
    }

    /**
     * @return HydratorInterface
     */
    public function getHydrator(): HydratorInterface
    {
        return $this->hydrator;
    }

    /**
     * @param HydratorInterface $hydrator
     * @return HydratableModel
     */
    public function setHydrator(HydratorInterface $hydrator): HydratableModel
    {
        $this->hydrator = $hydrator;
        return $this;
    }

    /**
     * @param string $string
     * @return string
     */
    protected function cleanStringFromFormatting(string $string): string
    {
        $string = html_entity_decode($string);

        return $string;
    }
}

<?php

namespace Somecoding\WordpressApiWrapper\Model;

use Zend\Hydrator\HydratorInterface;

/**
 * Class HydratableModel
 * @package Somecoding\WordpressApiWrapper\Model
 */
class HydratableModel
{
	protected $hydrator;

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



}
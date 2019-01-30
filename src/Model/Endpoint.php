<?php

namespace Somecoding\WordpressApiWrapper\Model;

/**
 * Class Endpoint
 * @package WordpressApiWrapper\Model
 */
class Endpoint extends HydratableModel
{
	protected $methods;
	protected $args;

	/**
	 * @return mixed
	 */
	public function getMethods()
	{
		return $this->methods;
	}

	/**
	 * @param mixed $methods
	 * @return Endpoint
	 */
	public function setMethods($methods)
	{
		$this->methods = $methods;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getArgs()
	{
		return $this->args;
	}

	/**
	 * @param mixed $args
	 * @return Endpoint
	 */
	public function setArgs($args)
	{
		$this->args = $args;
		return $this;
	}



}
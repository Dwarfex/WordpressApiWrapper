<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Model;

/**
 * Class Endpoint
 * @package WordpressApiWrapper\Model
 */
class Route extends HydratableModel
{

    protected $route;
    protected $namespace;
    protected $methods;
    protected $endpoints;
    protected $links;

    /**
     * @return mixed
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     * @return Route
     */
    public function setRoute($route)
    {
        $this->route = $route;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param mixed $namespace
     * @return Route
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethods()
    {
        return $this->methods;
    }

    /**
     * @param mixed $methods
     * @return Route
     */
    public function setMethods($methods)
    {
        $this->methods = $methods;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEndpoints()
    {
        return $this->endpoints;
    }

    /**
     * @param mixed $endpoints
     * @return Route
     */
    public function setEndpoints($endpoints)
    {
        $this->endpoints = $endpoints;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param mixed $links
     * @return Route
     */
    public function setLinks($links)
    {
        $this->links = $links;
        return $this;
    }
}

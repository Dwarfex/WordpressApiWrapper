<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Model;

/**
 * Class Api
 * @package WordpressApiWrapper\Model
 */
class Api extends HydratableModel
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $home;

    /**
     * @var int
     */
    protected $gmt_offset;

    /**
     * @var string
     */
    protected $timezone_string;

    /**
     * @var array
     */
    protected $namespaces;

    protected $authentication;

    /**
     * @var Route[]
     */
    protected $routes;

    /**
     * @var array
     */
    protected $links;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Api
     */
    public function setName(string $name): Api
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Api
     */
    public function setDescription(string $description): Api
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Api
     */
    public function setUrl(string $url): Api
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getHome(): string
    {
        return $this->home;
    }

    /**
     * @param string $home
     * @return Api
     */
    public function setHome(string $home): Api
    {
        $this->home = $home;
        return $this;
    }

    /**
     * @return int
     */
    public function getGmtOffset(): int
    {
        return $this->gmt_offset;
    }

    /**
     * @param int $gmt_offset
     * @return Api
     */
    public function setGmtOffset(int $gmt_offset): Api
    {
        $this->gmt_offset = $gmt_offset;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezoneString(): string
    {
        return $this->timezone_string;
    }

    /**
     * @param string $timezone_string
     * @return Api
     */
    public function setTimezoneString(string $timezone_string): Api
    {
        $this->timezone_string = $timezone_string;
        return $this;
    }

    /**
     * @return array
     */
    public function getNamespaces(): array
    {
        return $this->namespaces;
    }

    /**
     * @param array $namespaces
     * @return Api
     */
    public function setNamespaces(array $namespaces): Api
    {
        $this->namespaces = $namespaces;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthentication()
    {
        return $this->authentication;
    }

    /**
     * @param mixed $authentication
     * @return Api
     */
    public function setAuthentication($authentication)
    {
        $this->authentication = $authentication;
        return $this;
    }

    /**
     * @return Route[]
     */
    public function getRoutes(): array
    {
        return $this->routes;
    }

    /**
     * @param Route[] $routes
     * @return Api
     */
    public function setRoutes(array $routes): Api
    {
        if (!reset($routes) instanceof Route) {
            $hydratedRoutes = [];
            foreach ($routes as $routeName => $route) {
                $route['route'] = $routeName;
                $hydratedRoutes[] = $this->hydrator->hydrate($route, new Route($this->hydrator));
            }
            $routes = $hydratedRoutes;
        }

        $this->routes = $routes;
        return $this;
    }

    /**
     * @return array
     */
    public function getLinks(): array
    {
        return $this->links;
    }

    /**
     * @param array $links
     * @return Api
     */
    public function setLinks(array $links): Api
    {
        $this->links = $links;
        return $this;
    }
}

<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Model\Media;

use Somecoding\WordpressApiWrapper\Model\HydratableModel;

/**
 * Class Details
 * @package Somecoding\WordpressApiWrapper\Model\Media
 */
class Details extends HydratableModel
{
    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var string
     */
    protected $file;

    /**
     * @var array|Size[]
     */
    protected $sizes;

    /**
     * @var array|ImageMeta
     */
    protected $imageMeta;

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Details
     */
    public function setWidth(int $width): Details
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Details
     */
    public function setHeight(int $height): Details
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    /**
     * @param string $file
     * @return Details
     */
    public function setFile(string $file): Details
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return array|Size[]
     */
    public function getSizes()
    {
        return $this->sizes;
    }

    /**
     * @param array|Size[] $sizes
     * @return Details
     */
    public function setSizes($sizes)
    {
        $this->sizes = $sizes;
        return $this;
    }

    /**
     * @return array|ImageMeta
     */
    public function getImageMeta()
    {
        return $this->imageMeta;
    }

    /**
     * @param array|ImageMeta $imageMeta
     * @return Details
     */
    public function setImageMeta($imageMeta)
    {
        $this->imageMeta = $imageMeta;
        return $this;
    }
}

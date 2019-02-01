<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Model\Media;

use Somecoding\WordpressApiWrapper\Model\HydratableModel;

/**
 * Class Size
 * @package Somecoding\WordpressApiWrapper\Model\Media
 */
class Size extends HydratableModel
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $file;

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
    protected $mimeType;

    /**
     * @var string
     */
    protected $sourceUrl;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Size
     */
    public function setType(string $type): Size
    {
        $this->type = $type;
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
     * @return Size
     */
    public function setFile(string $file): Size
    {
        $this->file = $file;
        return $this;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @param int $width
     * @return Size
     */
    public function setWidth(int $width): Size
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
     * @return Size
     */
    public function setHeight(int $height): Size
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     * @return Size
     */
    public function setMimeType(string $mimeType): Size
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceUrl(): string
    {
        return $this->sourceUrl;
    }

    /**
     * @param string $sourceUrl
     * @return Size
     */
    public function setSourceUrl(string $sourceUrl): Size
    {
        $this->sourceUrl = $sourceUrl;
        return $this;
    }
}

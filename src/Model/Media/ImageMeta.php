<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Model\Media;

use Somecoding\WordpressApiWrapper\Model\HydratableModel;

/**
 * Class ImageMeta
 * @package Somecoding\WordpressApiWrapper\Model\Media
 */
class ImageMeta extends HydratableModel
{
    /**
     * @var string
     */
    protected $aperture;

    /**
     * @var string
     */
    protected $credit;

    /**
     * @var string
     */
    protected $camera;

    /**
     * @var string
     */
    protected $caption;

    /**
     * @var string
     */
    protected $created_timestamp;

    /**
     * @var string
     */
    protected $copyright;

    /**
     * @var string
     */
    protected $focal_length;

    /**
     * @var string
     */
    protected $iso;

    /**
     * @var string
     */
    protected $shutter_speed;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $orientation;

    /**
     * @var array
     */
    protected $keywords;

    /**
     * @return string
     */
    public function getAperture(): string
    {
        return $this->aperture;
    }

    /**
     * @param string $aperture
     * @return ImageMeta
     */
    public function setAperture(string $aperture): ImageMeta
    {
        $this->aperture = $aperture;
        return $this;
    }

    /**
     * @return string
     */
    public function getCredit(): string
    {
        return $this->credit;
    }

    /**
     * @param string $credit
     * @return ImageMeta
     */
    public function setCredit(string $credit): ImageMeta
    {
        $this->credit = $credit;
        return $this;
    }

    /**
     * @return string
     */
    public function getCamera(): string
    {
        return $this->camera;
    }

    /**
     * @param string $camera
     * @return ImageMeta
     */
    public function setCamera(string $camera): ImageMeta
    {
        $this->camera = $camera;
        return $this;
    }

    /**
     * @return string
     */
    public function getCaption(): string
    {
        return $this->caption;
    }

    /**
     * @param string $caption
     * @return ImageMeta
     */
    public function setCaption(string $caption): ImageMeta
    {
        $this->caption = $caption;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedTimestamp(): string
    {
        return $this->created_timestamp;
    }

    /**
     * @param string $created_timestamp
     * @return ImageMeta
     */
    public function setCreatedTimestamp(string $created_timestamp): ImageMeta
    {
        $this->created_timestamp = $created_timestamp;
        return $this;
    }

    /**
     * @return string
     */
    public function getCopyright(): string
    {
        return $this->copyright;
    }

    /**
     * @param string $copyright
     * @return ImageMeta
     */
    public function setCopyright(string $copyright): ImageMeta
    {
        $this->copyright = $copyright;
        return $this;
    }

    /**
     * @return string
     */
    public function getFocalLength(): string
    {
        return $this->focal_length;
    }

    /**
     * @param string $focal_length
     * @return ImageMeta
     */
    public function setFocalLength(string $focal_length): ImageMeta
    {
        $this->focal_length = $focal_length;
        return $this;
    }

    /**
     * @return string
     */
    public function getIso(): string
    {
        return $this->iso;
    }

    /**
     * @param string $iso
     * @return ImageMeta
     */
    public function setIso(string $iso): ImageMeta
    {
        $this->iso = $iso;
        return $this;
    }

    /**
     * @return string
     */
    public function getShutterSpeed(): string
    {
        return $this->shutter_speed;
    }

    /**
     * @param string $shutter_speed
     * @return ImageMeta
     */
    public function setShutterSpeed(string $shutter_speed): ImageMeta
    {
        $this->shutter_speed = $shutter_speed;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return ImageMeta
     */
    public function setTitle(string $title): ImageMeta
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrientation(): string
    {
        return $this->orientation;
    }

    /**
     * @param string $orientation
     * @return ImageMeta
     */
    public function setOrientation(string $orientation): ImageMeta
    {
        $this->orientation = $orientation;
        return $this;
    }

    /**
     * @return array
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @param array $keywords
     * @return ImageMeta
     */
    public function setKeywords(array $keywords): ImageMeta
    {
        $this->keywords = $keywords;
        return $this;
    }
}

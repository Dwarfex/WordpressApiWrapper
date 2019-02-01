<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Model;

/**
 * Class Media
 * @package Somecoding\WordpressApiWrapper\Model
 */
class Media extends HydratableModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $date;

    /**
     * @var string
     */
    protected $date_gmt;

    /**
     * @var string|array
     */
    protected $guid;

    /**
     * @var string
     */
    protected $modified;

    /**
     * @var string
     */
    protected $modified_gmt;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $link;

    /**
     * @var string|array
     */
    protected $title;

    /**
     * @var int
     */
    protected $author;

    /**
     * @var string
     */
    protected $commentStatus;

    /**
     * @var string
     */
    protected $pingStatus;

    /**
     * @var string
     */
    protected $template;

    /**
     * @var array
     */
    protected $meta;

    /**
     * @var string|array
     */
    protected $description;

    /**
     * @var string|array
     */
    protected $caption;

    /**
     * @var string
     */
    protected $altText;

    /**
     * @var string
     */
    protected $mediaType;

    /**
     * @var string
     */
    protected $mimeType;

    /**
     * @var array
     */
    protected $mediaDetails;


}

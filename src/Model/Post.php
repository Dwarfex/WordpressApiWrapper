<?php
declare(strict_types=1);

namespace Somecoding\WordpressApiWrapper\Model;

/**
 * Class Post
 * @package Somecoding\WordpressApiWrapper\Model
 */
class Post extends HydratableModel
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var \DateTime|string
     */
    protected $date;

    /**
     * @var \DateTime|string
     */
    protected $date_gmt;

    /**
     * @var array|string
     */
    protected $guid;

    /**
     * @var \DateTime|string
     */
    protected $modified;

    /**
     * @var \DateTime|string
     */
    protected $modifiedGmt;

    /**
     * @var string
     */
    protected $slug;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $link;

    /**
     * @var array|string
     */
    protected $title;

    /**
     * @var array|string
     */
    protected $content;

    /**
     * @var array|string
     */
    protected $excerpt;

    /**
     * @var int
     */
    protected $author;

    /**
     * @var int
     */
    protected $featuredMedia;

    /**
     * @var string
     */
    protected $commentStatus;

    /**
     * @var string
     */
    protected $pingStatus;

    /**
     * @var boolean
     */
    protected $sticky;

    /**
     * @var string
     */
    protected $template;

    /**
     * @var string
     */
    protected $format;

    /**
     * @var array
     */
    protected $meta;

    /**
     * @var array
     */
    protected $categories;

    /**
     * @var array
     */
    protected $tags;

    /**
     * @var array
     */
    protected $links;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Post
     */
    public function setId(int $id): Post
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime|string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime|string $date
     * @return Post
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \DateTime|string
     */
    public function getDateGmt()
    {
        return $this->date_gmt;
    }

    /**
     * @param \DateTime|string $date_gmt
     * @return Post
     */
    public function setDateGmt($date_gmt)
    {
        $this->date_gmt = $date_gmt;
        return $this;
    }

    /**
     * @return array|string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * @param $guid
     * @return $this
     */
    public function setGuid($guid)
    {
        if (is_array($guid)) {
            $guid = $guid['rendered'];
        }
        $this->guid = $guid;
        return $this;
    }

    /**
     * @return \DateTime|string
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @param \DateTime|string $modified
     * @return Post
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
        return $this;
    }

    /**
     * @return \DateTime|string
     */
    public function getModifiedGmt()
    {
        return $this->modifiedGmt;
    }

    /**
     * @param \DateTime|string $modifiedGmt
     * @return Post
     */
    public function setModifiedGmt($modifiedGmt)
    {
        $this->modifiedGmt = $modifiedGmt;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return Post
     */
    public function setSlug(string $slug): Post
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Post
     */
    public function setType(string $type): Post
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return Post
     */
    public function setLink(string $link): Post
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return array|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        if (is_array($title)) {
            $title = $title['rendered'];
        }

        $title = $this->cleanStringFromFormatting($title);

        $this->title = $title;
        return $this;
    }

    /**
     * @return array|string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        if (is_array($content)) {
            $content = $content['rendered'];
        }

        $content = $this->cleanStringFromFormatting($content);

        $this->content = $content;
        return $this;
    }

    /**
     * @return array|string
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * @param $excerpt
     * @return $this
     */
    public function setExcerpt($excerpt)
    {
        if (is_array($excerpt)) {
            $excerpt = $excerpt['rendered'];
        }
        $excerpt = $this->cleanStringFromFormatting($excerpt);
        $this->excerpt = $excerpt;
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthor(): int
    {
        return $this->author;
    }

    /**
     * @param int $author
     * @return Post
     */
    public function setAuthor(int $author): Post
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return int
     */
    public function getFeaturedMedia()
    {
        return $this->featuredMedia;
    }

    /**
     * @param $featuredMedia
     * @return $this
     */
    public function setFeaturedMedia($featuredMedia)
    {
        $this->featuredMedia = $featuredMedia;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentStatus()
    {
        return $this->commentStatus;
    }

    /**
     * @param $commentStatus
     * @return $this
     */
    public function setCommentStatus($commentStatus)
    {
        $this->commentStatus = $commentStatus;
        return $this;
    }

    /**
     * @return string
     */
    public function getPingStatus()
    {
        return $this->pingStatus;
    }

    /**
     * @param $pingStatus
     * @return $this
     */
    public function setPingStatus($pingStatus)
    {
        $this->pingStatus = $pingStatus;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSticky(): bool
    {
        return $this->sticky;
    }

    /**
     * @param bool $sticky
     * @return Post
     */
    public function setSticky(bool $sticky): Post
    {
        $this->sticky = $sticky;
        return $this;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param $template
     * @return $this
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * @param $format
     * @return $this
     */
    public function setFormat($format)
    {
        $this->format = $format;
        return $this;
    }

    /**
     * @return array
     */
    public function getMeta()
    {
        return $this->meta;
    }

    /**
     * @param $meta
     * @return $this
     */
    public function setMeta($meta)
    {
        $this->meta = $meta;
        return $this;
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param $categories
     * @return $this
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param $tags
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return array
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @param $links
     * @return $this
     */
    public function setLinks($links)
    {
        $this->links = $links;
        return $this;
    }
}

<?php

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

	protected $title;

	protected $content;

	protected $excerpt;

	/**
	 * @var int
	 */
	protected $author;

	protected $featuredMedia;

	protected $commentStatus;

	protected $pingStatus;

	/**
	 * @var boolean
	 */
	protected $sticky;

	protected $template;

	protected $format;

	protected $meta;

	protected $categories;

	protected $tags;

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
	 * @return mixed
	 */
	public function getGuid()
	{
		return $this->guid;
	}

	/**
	 * @param mixed $guid
	 * @return Post
	 */
	public function setGuid($guid)
	{
		if(is_array($guid)){
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
	 * @return mixed
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * @param mixed $title
	 * @return Post
	 */
	public function setTitle($title)
	{
		if(is_array($title)){
			$title = $title['rendered'];
		}
		$this->title = $title;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getContent()
	{
		return $this->content;
	}

	/**
	 * @param mixed $content
	 * @return Post
	 */
	public function setContent($content)
	{
		if(is_array($content)){
			$content = $content['rendered'];
		}
		$this->content = $content;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getExcerpt()
	{
		return $this->excerpt;
	}

	/**
	 * @param mixed $excerpt
	 * @return Post
	 */
	public function setExcerpt($excerpt)
	{
		if(is_array($excerpt)){
			$excerpt = $excerpt['rendered'];
		}
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
	 * @return mixed
	 */
	public function getFeaturedMedia()
	{
		return $this->featuredMedia;
	}

	/**
	 * @param mixed $featuredMedia
	 * @return Post
	 */
	public function setFeaturedMedia($featuredMedia)
	{
		$this->featuredMedia = $featuredMedia;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCommentStatus()
	{
		return $this->commentStatus;
	}

	/**
	 * @param mixed $commentStatus
	 * @return Post
	 */
	public function setCommentStatus($commentStatus)
	{
		$this->commentStatus = $commentStatus;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPingStatus()
	{
		return $this->pingStatus;
	}

	/**
	 * @param mixed $pingStatus
	 * @return Post
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
	 * @return mixed
	 */
	public function getTemplate()
	{
		return $this->template;
	}

	/**
	 * @param mixed $template
	 * @return Post
	 */
	public function setTemplate($template)
	{
		$this->template = $template;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getFormat()
	{
		return $this->format;
	}

	/**
	 * @param mixed $format
	 * @return Post
	 */
	public function setFormat($format)
	{
		$this->format = $format;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMeta()
	{
		return $this->meta;
	}

	/**
	 * @param mixed $meta
	 * @return Post
	 */
	public function setMeta($meta)
	{
		$this->meta = $meta;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCategories()
	{
		return $this->categories;
	}

	/**
	 * @param mixed $categories
	 * @return Post
	 */
	public function setCategories($categories)
	{
		$this->categories = $categories;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTags()
	{
		return $this->tags;
	}

	/**
	 * @param mixed $tags
	 * @return Post
	 */
	public function setTags($tags)
	{
		$this->tags = $tags;
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
	 * @return Post
	 */
	public function setLinks($links)
	{
		$this->links = $links;
		return $this;
	}




}
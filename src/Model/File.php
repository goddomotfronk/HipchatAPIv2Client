<?php

namespace SolutionDrive\HipchatAPIv2Client\Model;

class File implements FileInterface
{
    protected $name = '';

    protected $size = 0;

    protected $thumbUrl = '';

    protected $url = '';

    /**
     * File constructor
     */
    public function __construct($json = null)
    {
        $this->parseJson($json);
    }

    /**
     * @inheritdoc
     */
    public function parseJson($json)
    {
        if (! $json) {
            return;
        }

        $this->name = $json['name'];
        $this->size = (int) $json['size'];
        $this->url = $json['url'];

        if (isset($json['thumb_url'])) {
            $this->thumbUrl = $json['thumb_url'];
        }
    }

    /**
     * @inheritdoc
     */
    public function toJson()
    {
        $json = array(
            'name' => $this->name,
            'size' => $this->size,
            'url' => $this->url,
        );

        if ($this->thumbUrl) {
            $json['thumb_url'] = $this->thumbUrl;
        }

        return $json;
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @inheritdoc
     */
    public function setSize($size)
    {
        $this->size = (int) $size;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @inheritdoc
     */
    public function setThumbUrl($thumbUrl)
    {
        $this->thumbUrl = $thumbUrl;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getThumbUrl()
    {
        return $this->thumbUrl;
    }

    /**
     * @inheritdoc
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getUrl()
    {
        return $this->url;
    }
}

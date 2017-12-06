<?php

namespace SolutionDrive\HipchatAPIv2Client\Model;

class Webhook implements WebhookInterface
{

    /**
     * The unique identifier for the created entity
     * @var string|null
     */
    protected $id = null;

    /**
     * The URL to send the webhook POST to
     * @var string
     */
    protected $url;

    /**
     * The regular expression pattern to match against messages.
     * Only applicable for message events.
     * @var string
     */
    protected $pattern;

    /**
     * The event to listen for
     * Valid values:
     *    room_message, room_notification, room_exit, room_enter, room_topic_change.
     * @var string
     */
    protected $event;

    /**
     * The label for this webhook
     * @var string
     */
    protected $name;

    /**
     * URLs to retrieve webhook information
     * @var array
     */
    protected $links;

    /**
     * Webhook constructor
     */
    public function __construct($json = null)
    {
        if ($json) {
            $this->parseJson($json);
        } else {
            $this->url = '';
            $this->pattern = '';
            $this->event = 'room_message';
            $this->name = '';
            $this->links = [];
        }
    }

    /**
     * @inheritdoc
     */
    public function parseJson($json)
    {
        $this->id = isset($json['id']) ? $json['id'] : null;
        $this->url = $json['url'];
        $this->pattern = $json['pattern'];
        $this->event = $json['event'];
        $this->name = $json['name'];
        $this->links = (isset($json['links']) && is_array($json['links'])) ? $json['links'] : array();
    }


    /**
     * @inheritdoc
     */
    public function toJson()
    {
        $json = array();
        $json['id'] = $this->id;
        $json['url'] = $this->url;
        $json['pattern'] = $this->pattern;
        $json['event'] = $this->event;
        $json['name'] = $this->name;
        $json['links'] = $this->links;

        return $json;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getEvent() {
        return $this->event;
    }

    /**
     * @inheritdoc
     */
    public function setEvent($event) {
        $this->event = $event;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * @inheritdoc
     */
    public function setLinks($links)
    {
        $this->links = $links;
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
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * @inheritdoc
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @inheritdoc
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
}

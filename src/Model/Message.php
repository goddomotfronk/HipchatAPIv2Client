<?php

namespace SolutionDrive\HipchatAPIv2Client\Model;

class Message implements MessageInterface
{

    protected $id = null;

    protected $color;

    protected $message;

    protected $notify;

    protected $messageFormat;

    protected $date = null;

    protected $from = '';


    const COLOR_YELLOW = 'yellow';
    const COLOR_GREEN = 'green';
    const COLOR_RED = 'red';
    const COLOR_PURPLE = 'purple';
    const COLOR_GRAY = 'gray';
    const COLOR_RANDOM = 'random';

    const FORMAT_HTML = 'html';
    const FORMAT_TEXT = 'text';

    /**
     * Message constructor
     */
    public function __construct($json = null)
    {
        if ($json) {
            $this->parseJson($json);
        } else {
            $this->color = self::COLOR_YELLOW;
            $this->messageFormat = self::FORMAT_HTML;
            $this->message = "";
            $this->notify = false;
        }
    }

    /**
     * @inheritdoc
     */
    public function parseJson($json)
    {
        $this->id = $json['id'];
        $this->from = is_array($json['from']) ? $json['from']['name'] : $json['from'];
        $this->message = $json['message'];
        $this->color = isset($json['color']) ? $json['color'] : null;
        $this->notify = $json['notify'];
        $this->messageFormat = isset($json['message_format']) ? $json['message_format'] : 'html';
        $this->date = $json['date'];
    }


    /**
     * @inheritdoc
     */
    public function toJson()
    {
        $json = array();
        $json['id'] = $this->id;
        $json['from'] = $this->from;
        $json['color'] = $this->color;
        $json['message'] = $this->message;
        $json['notify'] = $this->notify;
        $json['message_format'] = $this->messageFormat;
        $json['date'] = $this->date;

        return $json;

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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function setColor($color)
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @inheritdoc
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @inheritdoc
     */
    public function setNotify($notify)
    {
        $this->notify = $notify;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isNotify()
    {
        return $this->notify;
    }

    /**
     * @inheritdoc
     */
    public function setMessageFormat($messageFormat)
    {
        $this->messageFormat = $messageFormat;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getMessageFormat()
    {
        return $this->messageFormat;
    }

    /**
     * @inheritdoc
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @inheritdoc
     */
    public function setFrom($from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getFrom()
    {
        return $this->from;
    }
}

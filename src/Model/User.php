<?php

namespace SolutionDrive\HipchatAPIv2Client\Model;

class User implements UserInterface
{
    protected $xmppJid;

    protected $deleted;

    protected $name;

    protected $lastActive;

    protected $title;

    protected $links;

    //protected $presence;

    protected $created;

    protected $id;

    protected $mentionName;

    protected $groupAdmin;

    protected $timezone;

    protected $guest;

    protected $email;

    protected $photoUrl;

    /**
     * Builds a user object from server response if json given, otherwise creates an empty object
     * Works with partial and full user information.
     *
     * @param array $json json_decoded response in json given by the server
     * 
     */
    public function __construct($json = null)
    {
        if ($json) {
            $this->parseJson($json);
        } else {
            $this->groupAdmin = false;
            $this->timezone = 'UTC';
        }
    }

    /**
     * @inheritdoc
     */
    public function parseJson($json)
    {
        $this->mentionName = $json['mention_name'];
        $this->id = $json['id'];
        $this->name = $json['name'];
        if (isset($json['links'])) {
            $this->links = $json['links'];
        }
        if(isset($json['xmpp_jid'])) {
            $this->xmppJid = $json['xmpp_jid'];
            $this->deleted = $json['is_deleted'];
            $this->lastActive = $json['last_active'];
            $this->title = $json['title'];
            $this->created = new \Datetime($json['created']);
            $this->groupAdmin = $json['is_group_admin'];
            $this->timezone = $json['timezone'];
            $this->guest = $json['is_guest'];
            $this->email = $json['email'];
            $this->photoUrl = $json['photo_url'];
        }
    }

    /**
     * @inheritdoc
     */
    public function toJson()
    {
        $json = array();
        $json['name'] = $this->name;
        $json['title'] = $this->title;
        $json['mention_name'] = $this->mentionName;
        $json['is_group_admin'] = $this->groupAdmin;
        $json['timezone'] = $this->timezone;
        $json['email'] = $this->email;

        return $json;
    }

    /**
     * @inheritdoc
     */
    public function setXmppJid($xmppJid)
    {
        $this->xmppJid = $xmppJid;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getXmppJid()
    {
        return $this->xmppJid;
    }

    /**
     * @inheritdoc
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isDeleted()
    {
        return $this->deleted;
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
    public function setLastActive($lastActive)
    {
        $this->lastActive = $lastActive;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getLastActive()
    {
        return $this->lastActive;
    }

    /**
     * @inheritdoc
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @inheritdoc
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getCreated()
    {
        return $this->created;
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
    public function setMentionName($mentionName)
    {
        $this->mentionName = $mentionName;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getMentionName()
    {
        return $this->mentionName;
    }

    /**
     * @inheritdoc
     */
    public function setGroupAdmin($groupAdmin)
    {
        $this->groupAdmin = $groupAdmin;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isGroupAdmin()
    {
        return $this->groupAdmin;
    }

    /**
     * @inheritdoc
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @inheritdoc
     */
    public function setGuest($guest)
    {
        $this->guest = $guest;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isGuest()
    {
        return $this->guest;
    }

    /**
     * @inheritdoc
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @inheritdoc
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }
}

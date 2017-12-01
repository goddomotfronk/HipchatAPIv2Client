<?php

namespace SolutionDrive\HipchatAPIv2Client\Model;

class Room implements RoomInterface
{
    protected $id;

    protected $xmppJid;

    //protected $statistics;

    protected $name;

    protected $links;

    protected $created;

    protected $archived;

    protected $privacy;

    protected $guestAccessible;

    protected $topic;

    protected $participants;

    protected $owner;

    protected $guestAccessUrl;

    /**
     * Builds a room object from server response if json given, otherwise creates an empty object
     *
     * @param array $json json_decoded response in json given by the server
     *
     * @return self
     */
    public function __construct($json = null)
    {
        if ($json) {
            $this->parseJson($json);
        } else {
            $this->guestAccessible = false;
            $this->privacy = 'public';
        }
    }

    /**
     * @inheritdoc
     */
    public function parseJson($json)
    {
        $this->id = $json['id'];
        $this->name = $json['name'];
        $this->links = $json['links'];

        if (isset($json['xmpp_jid'])) {
            $this->xmppJid = $json['xmpp_jid'];
            //Statistics need to be implemented
            $this->created = new \DateTime($json['created']);
            $this->archived = $json['is_archived'];
            $this->privacy = $json['privacy'];
            $this->guestAccessible = $json['is_guest_accessible'];
            $this->topic = $json['topic'];
            $this->participants = array();
            foreach ($json['participants'] as $participant) {
                $this->participants[] = new User($participant);
            }
            $this->owner = new User($json['owner']);
            $this->guestAccessUrl = $json['guest_access_url'];
        }
    }

    /**
     * @inheritdoc
     */
    public function toJson()
    {
        $json = array();

        $json['name'] = $this->getName();
        $json['privacy'] = $this->getPrivacy();
        //Parameters for PUT call (Room already exists)
        if ($this->getId()) {
            $json['is_archived'] = $this->isArchived();
            $json['is_guest_accessible'] = $this->isGuestAccessible();
            $json['topic'] = $this->getTopic();
            $json['owner'] = array('id' => $this->getOwner()->getId());
        } else { //Paramters for POST call
            $json['guest_access'] = $this->isGuestAccessible();
            if ($this->getOwner()) {
                $json['owner_user_id'] = $this->getOwner()->getId();
            }
        }
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
    public function setLinks($links)
    {
        $this->links = $links;
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
    public function setArchived($archived)
    {
        $this->archived = $archived;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isArchived()
    {
        return $this->archived;
    }

    /**
     * @inheritdoc
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * @inheritdoc
     */
    public function setGuestAccessible($guestAccessible)
    {
        $this->guestAccessible = $guestAccessible;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function isGuestAccessible()
    {
        return $this->guestAccessible;
    }

    /**
     * @inheritdoc
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @inheritdoc
     */
    public function setParticipants($participants)
    {
        $this->participants = $participants;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * @inheritdoc
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @inheritdoc
     */
    public function setGuestAccessUrl($guestAccessUrl)
    {
        $this->guestAccessUrl = $guestAccessUrl;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getGuestAccessUrl()
    {
        return $this->guestAccessUrl;
    }
}

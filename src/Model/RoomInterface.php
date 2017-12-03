<?php
/**
 * Created by solutionDrive GmbH.
 *
 * @author:    Tobias Lückel <tl@solutionDrive.de>
 * @date:      01.12.17
 * @time:      19:31
 * @copyright: 2017 solutionDrive GmbH
 */

namespace SolutionDrive\HipchatAPIv2Client\Model;

interface RoomInterface
{
    /**
     * Parses response given by the API and maps the fields to Room object
     *
     * @param array $json json_decoded response in json given by the server
     *
     * @return void
     */
    public function parseJson($json);

    /**
     * Serializes Room object
     *
     * @return array
     */
    public function toJson();

    /**
     * Sets id
     *
     * @param integer $id The id to be set
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setId($id);

    /**
     * Returns id
     *
     * @return integer
     */
    public function getId();

    /**
     * Sets XMPP/Jabber ID of the room
     *
     * @param string $xmppJid XMPP/Jabber ID of the room
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setXmppJid($xmppJid);

    /**
     * Returns XMPP/Jabber ID of the room
     *
     * @return string
     */
    public function getXmppJid();

    /**
     * Sets name of the room
     *
     * @param mixed $name Name of the room.
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setName($name);

    /**
     * Returns Name of the room
     *
     * @return string
     */
    public function getName();

    /**
     * Sets URLs to retrieve room information
     *
     * @param array $links URLs to retrieve room information
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setLinks($links);

    /**
     * Returns URLs to retrieve room information
     *
     * @return array
     */
    public function getLinks();

    /**
     * Sets time the room was created in UTC
     *
     * @param \Datetime $created Time the room was created in UTC
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setCreated($created);

    /**
     * Returns time the room was created in UTC
     *
     * @return \Datetime
     */
    public function getCreated();

    /**
     * Sets whether or not this room is archived
     *
     * @param boolean $archived Whether or not this room is archived
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setArchived($archived);

    /**
     * Returns if is archived or not
     *
     * @return mixed
     */
    public function isArchived();

    /**
     * Sets Privacy setting
     *
     * @param string $privacy Privacy setting. Valid values: public | private
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setPrivacy($privacy);

    /**
     * Returns privacy setting
     *
     * @return string public | private
     */
    public function getPrivacy();

    /**
     * Sets whether or not guests can access this room
     *
     * @param boolean $guestAccessible Whether or not guests can access this room
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setGuestAccessible($guestAccessible);

    /**
     * Returns whether or not guests can access this room
     *
     * @return boolean
     */
    public function isGuestAccessible();

    /**
     * Sets current topic
     *
     * @param string $topic Current topic
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setTopic($topic);

    /**
     * Returns current topic
     *
     * @return string
     */
    public function getTopic();

    /**
     * Sets list of current room participants
     *
     * @param array $participants List of current room participants
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setParticipants($participants);

    /**
     * Returns list of current room participants
     *
     * @return array of User
     */
    public function getParticipants();

    /**
     * Sets the room owner
     *
     * @param User $owner The room owner
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setOwner($owner);

    /**
     * Returns the room owner
     *
     * @return User
     */
    public function getOwner();

    /**
     * Sets URL for guest access
     *
     * @param string $guestAccessUrl URL for guest access
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Room
     */
    public function setGuestAccessUrl($guestAccessUrl);

    /**
     * Returns URL for guest access, if enabled
     *
     * @return string | null
     */
    public function getGuestAccessUrl();
}

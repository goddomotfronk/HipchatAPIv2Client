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

interface UserInterface
{
    /**
     * Parses response given by the API and maps the fields to User object
     *
     * @param array $json json_decoded response in json given by the server
     *
     * @return void
     */
    public function parseJson($json);

    public function toJson();

    /**
     * Sets XMPP/Jabber ID of the user.
     *
     * @param string $xmppJid XMPP/Jabber ID of the user
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setXmppJid($xmppJid);

    /**
     * Returns XMPP/Jabber ID of the user.
     *
     * @return string
     */
    public function getXmppJid();

    /**
     * Sets whether the user has been deleted or not
     *
     * @param boolean $deleted Whether the user has been deleted or not
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setDeleted($deleted);

    /**
     * Returns whether the user has been deleted or not
     *
     * @return boolean
     */
    public function isDeleted();

    /**
     * Sets user's full name
     *
     * @param string $name User's full name
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setName($name);

    /**
     * Returns user's full name
     *
     * @return string
     */
    public function getName();

    /**
     * Sets when the user was last active
     *
     * @param \Datetime $lastActive When the user was last active
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setLastActive($lastActive);

    /**
     * Returns when the user was last active
     *
     * @return \Datetime
     */
    public function getLastActive();

    /**
     * Sets user's title
     *
     * @param mixed $title User's title
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setTitle($title);

    /**
     * Returns user's title
     *
     * @return mixed
     */
    public function getTitle();

    /**
     * Sets when the user was created
     *
     * @param \Datetime $created When the user was created
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setCreated($created);

    /**
     * Returns when the user was created
     *
     * @return \Datetime
     */
    public function getCreated();

    /**
     * Sets user's ID
     *
     * @param mixed $id User's ID
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setId($id);

    /**
     * Returns user's ID
     *
     * @return mixed
     */
    public function getId();

    /**
     * Sets user's @mention name
     *
     * @param mixed $mentionName User's @mention name
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setMentionName($mentionName);

    /**
     * Returns user's @mention name
     *
     * @return mixed
     */
    public function getMentionName();

    /**
     * Sets whether or not this user is an admin of the group
     *
     * @param boolean $groupAdmin Whether or not this user is an admin of the group
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setGroupAdmin($groupAdmin);

    /**
     * Returns whether or not this user is an admin of the group
     *
     * @return boolean
     */
    public function isGroupAdmin();

    /**
     * Sets the desired user timezone
     *
     * @param string $timezone The desired user timezone
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setTimezone($timezone);

    /**
     * Returns the desired user timezone
     *
     * @return mixed
     */
    public function getTimezone();

    /**
     * Sets whether or not this user is a guest or registered user
     *
     * @param boolean $guest Whether or not this user is a guest or registered user
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setGuest($guest);

    /**
     * Returns whether or not this user is a guest or registered user
     *
     * @return boolean
     */
    public function isGuest();

    /**
     * Sets user's email
     *
     * @param string $email User's email
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setEmail($email);

    /**
     * Returns user's email
     *
     * @return string
     */
    public function getEmail();

    /**
     * Sets URL to user's photo.
     *
     * @param string $photoUrl URL to user's photo
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\User
     */
    public function setPhotoUrl($photoUrl);

    /**
     * Returns URL to user's photo. 125px on the longest side
     *
     * @return string
     */
    public function getPhotoUrl();
}

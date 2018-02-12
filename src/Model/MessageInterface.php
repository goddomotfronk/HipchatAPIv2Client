<?php
/**
 * Created by solutionDrive GmbH.
 *
 * @author:    Tobias Lückel <tl@solutionDrive.de>
 * @date:      01.12.17
 * @time:      19:30
 * @copyright: 2017 solutionDrive GmbH
 */

namespace SolutionDrive\HipchatAPIv2Client\Model;

interface MessageInterface
{
    public function parseJson($json);

    /**
     * Serializes Message object
     *
     * @return array
     */
    public function toJson();

    /**
     * Sets id message
     *
     * @param string $id Id message
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Message
     */
    public function setId($id);

    /**
     * Returns id for message
     *
     * @return string
     */
    public function getId();

    /**
     * Sets background color for message
     *
     * @param string $color Background color for message
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Message
     */
    public function setColor($color);

    /**
     * Returns background color for message
     *
     * @return string
     */
    public function getColor();

    /**
     * Sets the message body
     *
     * @param string $message The message body
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Message
     */
    public function setMessage($message);

    /**
     * Returns the message body
     *
     * @return string
     */
    public function getMessage();

    /**
     * Sets whether or not this message should trigger a notification
     *
     * @param boolean $notify Whether or not this message should trigger a notification
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Message
     */
    public function setNotify($notify);

    /**
     * Returns whether or not this message should trigger a notification for people in the room
     * (change the tab color, play a sound, etc). Each recipient's notification preferences are taken into account.
     *
     * @return boolean
     */
    public function isNotify();

    /**
     * Sets how the message is treated by the server and rendered inside HipChat applications
     *
     * @param string $messageFormat How the message is treated by the server and rendered inside HipChat applications
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Message
     */
    public function setMessageFormat($messageFormat);

    /**
     * Returns how the message is treated by the server and rendered inside HipChat applications
     *
     * @return string
     */
    public function getMessageFormat();

    /**
     * Sets date for message
     *
     * @param string $date The date
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Message
     */
    public function setDate($date);

    /**
     * Gets date for message
     *
     * @return string
     */
    public function getDate();

    /**
     * Sets a label to be shown in addition to the sender's name
     *
     * @param string $from The label
     *
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Message
     */
    public function setFrom($from);

    /**
     * Gets the label to be shown in addition to the sender's name
     *
     * @return string|array
     */
    public function getFrom();
}

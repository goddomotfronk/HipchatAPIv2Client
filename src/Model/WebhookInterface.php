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

interface WebhookInterface
{
    public function parseJson($json);

    /**
     * Serializes Webhook object
     *
     * @return array
     */
    public function toJson();

    /**
     * Gets the unique identifier for the created entity
     * @return null|string
     */
    public function getId();

    /**
     * Sets the unique identifier for the created entity
     * @param null|string $id
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Webhook
     */
    public function setId($id);

    /**
     * Gets the event to listen for
     *
     * @return string
     */
    public function getEvent();

    /**
     * Sets the event to listen for
     *
     * @param string $event
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Webhook
     */
    public function setEvent($event);

    /**
     * Gets the URLs to retrieve webhook information
     * @return array
     */
    public function getLinks();

    /**
     * Sets the URLs to retrieve webhook information
     * @param array $links
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Webhook
     */
    public function setLinks($links);

    /**
     * Gets the label for this webhook
     * @return string
     */
    public function getName();

    /**
     * Sets the label for this webhook
     * @param string $name
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Webhook
     */
    public function setName($name);

    /**
     * Gets the regular expression pattern to match against messages.
     * @return string
     */
    public function getPattern();

    /**
     * Sets the regular expression pattern to match against messages.
     * @param string $pattern
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Webhook
     */
    public function setPattern($pattern);

    /**
     * Gets the URL to send the webhook POST to
     * @return string
     */
    public function getUrl();

    /**
     * Sets the URL to send the webhook POST to
     * @param string $url
     * @return \SolutionDrive\HipchatAPIv2Client\Model\Webhook
     */
    public function setUrl($url);
}

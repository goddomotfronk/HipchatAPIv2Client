<?php

namespace SolutionDrive\HipchatAPIv2Client\Model;

interface FileInterface
{
    /**
     * Parses response given by the API and maps the fields to File object
     *
     * @param array $json json_decoded response in json given by the server
     *
     * @return void
     */
    public function parseJson($json);

    /**
     * Serializes File object
     *
     * @return array
     */
    public function toJson();

    /**
     * Sets name for file
     *
     * @param string $name Name of file
     *
     * @return FileInterface
     */
    public function setName($name);

    /**
     * Returns name for file
     *
     * @return string
     */
    public function getName();

    /**
     * Sets size for file in bytes
     *
     * @param string $size Size of file in bytes
     *
     * @return FileInterface
     */
    public function setSize($size);

    /**
     * Returns size for file in bytes
     *
     * @return string
     */
    public function getSize();

    /**
     * Sets thumbnail url for file
     *
     * @param string $thumbUrl Thumbnail url of file
     *
     * @return FileInterface
     */
    public function setThumbUrl($thumbUrl);

    /**
     * Returns thumbnail url for file
     *
     * @return string
     */
    public function getThumbUrl();

    /**
     * Sets url for file
     *
     * @param string $url Url of file
     *
     * @return FileInterface
     */
    public function setUrl($url);

    /**
     * Returns url for file
     *
     * @return string
     */
    public function getUrl();
}

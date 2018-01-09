<?php
/**
 * Created by solutionDrive GmbH.
 *
 * @author:    Tobias Lückel <lueckel@solutionDrive.de>
 * @date:      16.12.17
 * @time:      18:47
 * @copyright: 2017 solutionDrive GmbH
 */

namespace SolutionDrive\HipchatAPIv2Client\Model;


interface AddonInterface
{
    /**
     * @param string $target
     */
    public function setTarget($target);

    /**
     * @param int $ttl
     */
    public function setTTL($ttl);

    /**
     * @param string $token
     */
    public function setToken($token);

    /**
     * @return string
     */
    public function getTarget();

    /**
     * @return int
     */
    public function getTTL();

    /**
     * @return string
     */
    public function getToken();

    /**
     * Serializes Addon object
     *
     * @return array
     */
    public function toJson();
}

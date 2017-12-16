<?php

namespace SolutionDrive\HipchatAPIv2Client\Model;

class Addon implements AddonInterface
{
    private $target;
    private $ttl;
    private $token;

    /**
     * @inheritdoc
     */
    public function toJson()
    {
        return [
            'target' => $this->getTarget(),
            'ttl'    => $this->getTTL(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @inheritdoc
     */
    public function setTTL($ttl)
    {
        $this->ttl = $ttl;
    }

    /**
     * @inheritdoc
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @inheritdoc
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @inheritdoc
     */
    public function getTTL()
    {
        return $this->ttl;
    }

    /**
     * @inheritdoc
     */
    public function getToken()
    {
        return $this->token;
    }
}

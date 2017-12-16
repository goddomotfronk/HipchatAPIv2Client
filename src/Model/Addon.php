<?php

namespace SolutionDrive\HipchatAPIv2Client\Model;

class Addon implements AddonInterface
{
    private $target;
    private $ttl;
    private $token;

    public function setTarget($target)
    {
        $this->target = $target;
    }

    public function setTTL($ttl)
    {
        $this->ttl = $ttl;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function getTTL()
    {
        return $this->ttl;
    }

    public function getToken()
    {
        return $this->token;
    }
}

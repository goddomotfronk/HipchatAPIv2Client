<?php

namespace spec\SolutionDrive\HipchatAPIv2Client\Model;

use SolutionDrive\HipchatAPIv2Client\Model\Addon;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SolutionDrive\HipchatAPIv2Client\Model\AddonInterface;

class AddonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Addon::class);

        $this->shouldImplement(AddonInterface::class);
    }

    public function it_set_and_get_target()
    {
        $this->setTarget('https://example.com/target');
        $this->getTarget()->shouldReturn('https://example.com/target');
    }

    public function it_set_and_get_ttl()
    {
        $this->setTTL(5);
        $this->getTTL()->shouldReturn(5);
    }

    public function it_set_and_get_token()
    {
        $this->setToken('token');
        $this->getToken()->shouldReturn('token');
    }
}

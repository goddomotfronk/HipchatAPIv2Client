<?php

namespace spec\SolutionDrive\HipchatAPIv2Client;

use SolutionDrive\HipchatAPIv2Client\Auth\AuthInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ClientSpec extends ObjectBehavior
{
    function let(AuthInterface $auth)
    {
        $this->beConstructedWith($auth);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('SolutionDrive\HipchatAPIv2Client\Client');
    }
}

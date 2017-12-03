<?php

namespace spec\SolutionDrive\HipchatAPIv2Client;

use SolutionDrive\HipchatAPIv2Client\Auth\AuthInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SolutionDrive\HipchatAPIv2Client\Client;
use SolutionDrive\HipchatAPIv2Client\ClientInterface;

class ClientSpec extends ObjectBehavior
{
    function let(AuthInterface $auth)
    {
        $this->beConstructedWith($auth);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Client::class);

        $this->shouldImplement(ClientInterface::class);
    }
}

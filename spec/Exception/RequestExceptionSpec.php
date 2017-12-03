<?php

namespace spec\SolutionDrive\HipchatAPIv2Client\Exception;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SolutionDrive\HipchatAPIv2Client\Exception\RequestException;
use SolutionDrive\HipchatAPIv2Client\Exception\RequestExceptionInterface;

class RequestExceptionSpec extends ObjectBehavior
{
    function let()
    {
        $response = array('error' => array('code' => 404, 'message' => 'Room not found', 'type' => 'Not found'));
        $this->beConstructedWith($response);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType(RequestException::class);

        $this->shouldImplement(RequestExceptionInterface::class);
    }

    function it_returns_error_code()
    {
        $this->getResponseCode()->shouldReturn(404);
    }

    function it_returns_message()
    {
        $this->getMessage()->shouldReturn('Room not found');
    }

    function it_returns_type()
    {
        $this->getType()->shouldReturn('Not found');
    }
}

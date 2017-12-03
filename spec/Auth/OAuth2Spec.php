<?php

namespace spec\SolutionDrive\HipchatAPIv2Client\Auth;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SolutionDrive\HipchatAPIv2Client\Auth\AuthInterface;
use SolutionDrive\HipchatAPIv2Client\Auth\OAuth2;

class OAuth2Spec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('aojqe89yf23jn273n23gy3u23932f89');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(OAuth2::class);

        $this->shouldImplement(AuthInterface::class);
    }

    function it_returns_credential()
    {
        $this->getCredential()->shouldReturn('Bearer aojqe89yf23jn273n23gy3u23932f89');
    }
}

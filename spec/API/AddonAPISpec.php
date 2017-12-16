<?php

namespace spec\SolutionDrive\HipchatAPIv2Client\API;

use SolutionDrive\HipchatAPIv2Client\API\AddonAPI;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SolutionDrive\HipchatAPIv2Client\API\AddonAPIInterface;
use SolutionDrive\HipchatAPIv2Client\ClientInterface;
use SolutionDrive\HipchatAPIv2Client\Model\AddonInterface;

class AddonAPISpec extends ObjectBehavior
{
    function let(
        ClientInterface $client
    ) {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(AddonAPI::class);

        $this->shouldImplement(AddonAPIInterface::class);
    }

    public function it_creates_addon_link(
        ClientInterface $client,
        AddonInterface $addon
    ) {
        $request = [
            'target' => 'https://example.com/target',
            'ttl' => 10
        ];
        $addon->toJson()
            ->shouldBeCalled()
            ->willReturn($request);
        $client->post('/v2/addon/link', $request)
            ->shouldBeCalled()
            ->willReturn([
                'token' => 'token'
            ]);
        $this->createAddonLink($addon)
            ->shouldReturn('token');
    }
}

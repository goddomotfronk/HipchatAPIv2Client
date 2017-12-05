<?php

namespace spec\SolutionDrive\HipchatAPIv2Client;

use Buzz\Browser;
use Buzz\Message\Response;
use SolutionDrive\HipchatAPIv2Client\Auth\AuthInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SolutionDrive\HipchatAPIv2Client\Client;
use SolutionDrive\HipchatAPIv2Client\ClientInterface;

class ClientSpec extends ObjectBehavior
{
    function let(
        AuthInterface $auth,
        Browser $browser,
        Response $response
    ) {
        $this->beConstructedWith(
            $auth,
            $browser,
            'example.com'
        );

        $auth->getCredential()
            ->willReturn('Bearer: hash');

        $browser->getLastResponse()
            ->willReturn($response);

        $response->getStatusCode()
            ->willReturn(200);

        $response->getContent()
            ->willReturn(null);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Client::class);

        $this->shouldImplement(ClientInterface::class);
    }

    function it_can_basic_get_request(
        Browser $browser,
        Response $response
    ) {
        $browser->get(
            'example.com/v2/resource',
            ['Authorization' => 'Bearer: hash']
        )->willReturn($response);

        $browser->getLastResponse()
            ->willReturn($response);

        $this->get('/v2/resource')
            ->shouldReturn(null);
    }

    function it_can_basic_post_request(
        Browser $browser,
        Response $response
    ) {
        $browser->post(
            'example.com/v2/resource',
            ['Content-Type' => 'application/json', 'Authorization' => 'Bearer: hash'],
            Argument::any()
        )->willReturn($response);

        $this->post('/v2/resource', null)
            ->shouldReturn(null);
    }

    function it_can_basic_put_request(
        Browser $browser,
        Response $response
    ) {
        $browser->put(
            'example.com/v2/resource',
            ['Content-Type' => 'application/json', 'Authorization' => 'Bearer: hash'],
            Argument::any()
        )->willReturn($response);

        $this->put('/v2/resource', null)
            ->shouldReturn(null);
    }

    function it_can_basic_delete_request(
        Browser $browser,
        Response $response
    ) {
        $browser->delete(
            'example.com/v2/resource',
            ['Authorization' => 'Bearer: hash']
        )->willReturn($response);

        $this->delete('/v2/resource', null)
            ->shouldReturn(null);
    }
}

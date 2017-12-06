<?php

namespace spec\SolutionDrive\HipchatAPIv2Client\API;

use SolutionDrive\HipchatAPIv2Client\API\UserAPI;
use SolutionDrive\HipchatAPIv2Client\API\UserAPIInterface;
use SolutionDrive\HipchatAPIv2Client\ClientInterface;
use SolutionDrive\HipchatAPIv2Client\Model\MessageInterface;
use SolutionDrive\HipchatAPIv2Client\Model\UserInterface;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserAPISpec extends ObjectBehavior
{
    function let(ClientInterface $client)
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(UserAPI::class);

        $this->shouldImplement(UserAPIInterface::class);
    }

    function it_gets_all_users(ClientInterface $client)
    {
        $response = array('items' => array(array(
            'mention_name' => '@test', 'id' => '123456', 'links' => array(), 'name' => 'Test')),
            'startIndex' => 0, 'maxResults' => 50, 'links' => array()
        );

        $client->get('/v2/user', array())->shouldBeCalled()->willReturn($response);

        $this->getAllUsers()->shouldHaveCount(1);
    }

    function it_gets_user(ClientInterface $client)
    {
        $mentionName = '@test';
        $response = $this->getTestResponse();
        $client->get("/v2/user/$mentionName")->shouldBeCalled()->willReturn($response);

        $this->getUser($mentionName)->shouldReturnAnInstanceOf('SolutionDrive\HipchatAPIv2Client\Model\User');
    }

    function it_creates_user(ClientInterface $client, UserInterface $user)
    {
        $request = array(
            'name' => 'Test', 'title' => 'Tester', 'mention_name' => 'test', 'is_group_admin' => false,
            'email' => 'test@test.com');
        $user->toJson()->shouldBeCalled()->willReturn($request);
        $request['password'] = 'test1234';
        $client->post('/v2/user', $request)->shouldBeCalled()->willReturn(array('id' => '123456', 'links' => array()));

        $this->createUser($user, 'test1234')->shouldReturn('123456');
    }

    function it_updates_user(ClientInterface $client, UserInterface $user)
    {
        $request = array(
            'id' => '123456', 'name' => 'Test', 'title' => 'Tester', 'mention_name' => 'test',
            'is_group_admin' => false, 'email' => 'test@test.com');
        $user->toJson()->shouldBeCalled()->willReturn($request);
        $user->getId()->shouldBeCalled()->willReturn('123456');
        $client->put('/v2/user/123456', $request)->shouldBeCalled();

        $this->updateUser($user, 'test1234');
    }

    function it_deletes_user(ClientInterface $client)
    {
        $client->delete('/v2/user/test')->shouldBeCalled();

        $this->deleteUser('test');
    }

    function it_sends_private_message_user(ClientInterface $client)
    {
        $client->post('/v2/user/123456/message', array('message' => 'Im testing!!'))->shouldBeCalled();
        $this->privateMessageUser('123456', 'Im testing!!');
    }

    function it_sends_private_message_user_with_message_object(
        ClientInterface $client,
        MessageInterface $message
    ) {
        $message->toJson()
            ->willReturn(['message' => 'Im testing message object!!']);

        $client->post('/v2/user/123456/message', ['message' => 'Im testing message object!!'])
            ->shouldBeCalled();

        $this->privateMessageUser('123456', $message);
    }

    function it_will_return_empty_array_if_chat_history_is_empty(
        ClientInterface $client
    ) {
        $client->get('/v2/user/123456/history/latest', [])
            ->willReturn([
                'items' => []
            ]);

        $this->getRecentPrivateChatHistory('123456', [])
            ->shouldReturn([]);
    }

    function it_will_return_a_array_for_chat_history(
        ClientInterface $client
    ) {
        $client->get('/v2/user/123456/history/latest', [])
            ->willReturn([
                'items' => [
                    null,
                    null
                ]
            ]);

        $this->getRecentPrivateChatHistory('123456', [])
            ->shouldBeArray();
    }

    function it_will_get_a_private_chat_message(
        ClientInterface $client
    ) {
        $client->get('/v2/user/123456/history/654321', [])
            ->willReturn([
                'message' => null
            ]);

        $this->getPrivateChatMessage('123456', '654321', [])
            ->shouldReturnAnInstanceOf(MessageInterface::class);
    }

    function it_will_get_a_photo_in_a_specific_size(
        ClientInterface $client
    ) {
        $client->get('/v2/user/123456/photo/big')
            ->willReturn('beautiful photo!');

        $this->getPhoto('123456', 'big')
            ->shouldReturn('beautiful photo!');
    }

    protected function getTestResponse()
    {
        return array(
            'xmpp_jid' => '',
            'is_deleted' => false,
            'name' => 'Sr. Test',
            'last_active' => '2014-07-09 13:51:54',
            'title' => 'Tester',
            'presence' => array(),
            'created' => '2014-07-05 13:51:54',
            'id' => 123435,
            'mention_name' => '@test',
            'is_group_admin' => false,
            'timezone' => 'UTC+1',
            'is_guest' => false,
            'email' => 'test@test.com',
            'photo_url' => 'http://test.com/test.jpg'
        );
    }
}

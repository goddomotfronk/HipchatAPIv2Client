<?php

namespace spec\SolutionDrive\HipchatAPIv2Client\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SolutionDrive\HipchatAPIv2Client\Model\User;
use SolutionDrive\HipchatAPIv2Client\Model\UserInterface;

class UserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(User::class);

        $this->shouldImplement(UserInterface::class);
    }

    function it_parses_full_json()
    {
        $json = [
            'mention_name' => 'Tester',
            'id' => '123456',
            'name' => 'Tester',
            'links' => 'https://example.com/user',
            'xmpp_jid' => '654321',
            'is_deleted' => false,
            'last_active' => '2017-12-03 19:39:10',
            'title' => 'mr',
            'created' => '2017-12-03 14:52:01',
            'is_group_admin' => false,
            'timezone' => 'CET',
            'is_guest' => false,
            'email' => 'test@exmaple.com',
            'photo_url' => 'example.com/photo'
        ];
        $this->parseJson($json);
    }
}

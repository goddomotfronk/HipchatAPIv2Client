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

    function it_encodes_to_json()
    {
        $this->setName('Tester');
        $this->setTimezone('CET');
        $this->toJson()->shouldReturn(
            ['name' => 'Tester', 'title' => null, 'mention_name' => null, 'is_group_admin' => false, 'timezone' => 'CET', 'email' => null]
        );
    }

    function it_set_and_get_xmpp_jid()
    {
        $this->setXmppJid('xmppjid');
        $this->getXmppJid()->shouldReturn('xmppjid');
    }

    function it_set_and_get_deleted()
    {
        $this->setDeleted(true);
        $this->isDeleted()->shouldReturn(true);

        $this->setDeleted(false);
        $this->isDeleted()->shouldReturn(false);
    }

    function it_set_and_get_name()
    {
        $this->setName('Testing');
        $this->getName()->shouldReturn('Testing');
    }

    function it_set_and_get_last_active()
    {
        $now = new \DateTime();
        $this->setLastActive($now);
        $this->getLastActive()->shouldReturn($now);
    }

    function it_set_and_get_title()
    {
        $this->setTitle('title');
        $this->getTitle()->shouldReturn('title');
    }

    function it_set_and_get_created()
    {
        $now = new \DateTime();
        $this->setCreated($now);
        $this->getCreated()->shouldReturn($now);
    }

    function it_set_and_get_id()
    {
        $this->setId('testid');
        $this->getId()->shouldReturn('testid');
    }

    function it_set_and_get_mention_name()
    {
        $this->setMentionName('mentionTest');
        $this->getMentionName()->shouldReturn('mentionTest');
    }

    function it_set_and_get_group_admin()
    {
        $this->setGroupAdmin(true);
        $this->isGroupAdmin()->shouldReturn(true);

        $this->setGroupAdmin(false);
        $this->isGroupAdmin()->shouldReturn(false);
    }

    function it_set_and_get_timezone()
    {
        $this->setTimezone('JST');
        $this->getTimezone()->shouldReturn('JST');
    }

    function it_set_and_get_guest()
    {
        $this->setGuest(true);
        $this->isGuest()->shouldReturn(true);

        $this->setGuest(false);
        $this->isGuest()->shouldReturn(false);
    }

    function it_set_and_get_email()
    {
        $this->setEmail('test@example.com');
        $this->getEmail()->shouldReturn('test@example.com');
    }

    function it_set_and_get_photo_url()
    {
        $this->setPhotoUrl('example.com/photo');
        $this->getPhotoUrl()->shouldReturn('example.com/photo');
    }
}

<?php

namespace spec\SolutionDrive\HipchatAPIv2Client\Model;

use SolutionDrive\HipchatAPIv2Client\Model\Message;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SolutionDrive\HipchatAPIv2Client\Model\MessageInterface;

class MessageSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Message::class);

        $this->shouldImplement(MessageInterface::class);
    }

    function it_parses_full_json()
    {
        $json = array(
            'id' => '123556',
            'from' => 'Tester',
            'color' => 'yellow',
            'notify' => true,
            'message' => 'Hello World',
            'message_format' => 'html',
            'date' => '2014-02-10 10:02:10',
        );
        $this->parseJson($json);
    }

    function it_encodes_to_json()
    {
        $this->setColor(Message::COLOR_GRAY);
        $this->setMessage('This is a test!!');
        $this->toJson()->shouldReturn(array(
            'id' => null,
            'from' => '',
            'color' => 'gray',
            'message' => 'This is a test!!',
            'notify' => false,
            'message_format' => 'html',
            'date' => null,
        ));
    }

    function its_id_is_mutable()
    {
        $id = '654321';
        $this->setId($id)->shouldReturn($this);
        $this->getId()->shouldReturn($id);
    }

    function its_color_is_mutable()
    {
        $this->setColor(Message::COLOR_GRAY)->shouldReturn($this);
        $this->getColor()->shouldReturn(Message::COLOR_GRAY);
    }

    function its_message_is_mutable()
    {
        $this->setMessage('This is a test')->shouldReturn($this);
        $this->getMessage()->shouldReturn('This is a test');
    }

    function its_notify_is_mutable()
    {
        $this->setNotify(true)->shouldReturn($this);
        $this->isNotify()->shouldReturn(true);
    }

    function its_format_is_mutable()
    {
        $this->setMessageFormat(Message::FORMAT_TEXT)->shouldReturn($this);
        $this->getMessageFormat()->shouldReturn(Message::FORMAT_TEXT);
    }

    function its_date_is_mutable()
    {
        $date = date('c');
        $this->setFrom($date)->shouldReturn($this);
        $this->getFrom()->shouldReturn($date);
    }

    function its_from_is_mutable()
    {
        $this->setFrom('test from')->shouldReturn($this);
        $this->getFrom()->shouldReturn('test from');
    }
}

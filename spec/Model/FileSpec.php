<?php

namespace spec\SolutionDrive\HipchatAPIv2Client\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SolutionDrive\HipchatAPIv2Client\Model\File;
use SolutionDrive\HipchatAPIv2Client\Model\FileInterface;

class FileSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(File::class);
        $this->shouldImplement(FileInterface::class);
    }

    function it_parses_full_json()
    {
        $json = array(
            'name' => 'pic01.png',
            'size' => '123',
            'thumb_url' => 'http://example.com/pic01_thumb.png',
            'url' => 'http://example.com/pic01.png',
        );

        $this->parseJson($json);
    }

    function it_encodes_to_json()
    {
        $this->setName('test.pdf');
        $this->setUrl('http://example.com/test.pdf');

        $this->toJson()->shouldReturn(array(
            'name' => 'test.pdf',
            'size' => 0,
            'thumb_url' => '',
            'url' => 'http://example.com/test.pdf',
        ));
    }

    function its_name_is_mutable()
    {
        $name = 'test.jpg';
        $this->setName($name)->shouldReturn($this);
        $this->getName()->shouldReturn($name);
    }

    function its_size_is_mutable()
    {
        $size = 456;
        $this->setSize($size)->shouldReturn($this);
        $this->getSize()->shouldReturn($size);
    }

    function its_thumburl_is_mutable()
    {
        $thumbUrl = 'http://example.com/pic02_thumb.jpg';
        $this->setThumbUrl($thumbUrl)->shouldReturn($this);
        $this->getThumbUrl()->shouldReturn($thumbUrl);
    }

    function its_url_is_mutable()
    {
        $url = 'http://example.com/pic02.jpg';
        $this->setUrl($url)->shouldReturn($this);
        $this->getUrl()->shouldReturn($url);
    }
}

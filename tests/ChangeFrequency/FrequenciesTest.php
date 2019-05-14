<?php

namespace Jidoka1902\SitemapXML\Tests\ChangeFrequency;


use Jidoka1902\SitemapXML\ChangeFrequency\Always;
use Jidoka1902\SitemapXML\ChangeFrequency\Daily;
use Jidoka1902\SitemapXML\ChangeFrequency\Hourly;
use Jidoka1902\SitemapXML\ChangeFrequency\Monthly;
use Jidoka1902\SitemapXML\ChangeFrequency\Never;
use Jidoka1902\SitemapXML\ChangeFrequency\Weekly;
use Jidoka1902\SitemapXML\ChangeFrequency\Yearly;
use PHPUnit\Framework\TestCase;

class FrequenciesTest extends TestCase
{
    public function test_always()
    {
        $this->assertEquals("always", (string)new Always());
    }

    public function test_daily()
    {
        $this->assertEquals("daily", (string)new Daily());
    }

    public function test_hourly()
    {
        $this->assertEquals("hourly", (string)new Hourly());
    }

    public function test_Monthly()
    {
        $this->assertEquals("monthly", (string)new Monthly());
    }

    public function test_never()
    {
        $this->assertEquals("never", (string)new Never());
    }

    public function test_weekly()
    {
        $this->assertEquals("weekly", (string)new Weekly());
    }

    public function test_yearly()
    {
        $this->assertEquals("yearly", (string)new Yearly());
    }
}
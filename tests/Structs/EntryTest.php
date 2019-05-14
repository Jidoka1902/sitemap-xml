<?php

namespace Jidoka1902\SitemapXML\Tests\Structs;

use Jidoka1902\SitemapXML\ChangeFrequency\Daily;
use Jidoka1902\SitemapXML\Structs\SitemapEntry;
use PHPUnit\Framework\TestCase;

class EntryTest extends TestCase
{
    public function test_location_passthrough()
    {
        $location = "asf";

        $entry = new SitemapEntry($location);

        $this->assertEquals($location, $entry->getLoc());
    }

    public function test_negative_has_lastmod()
    {
        $entry = new SitemapEntry("");

        $this->assertFalse($entry->hasLastMod());
    }

    public function test_positive_has_lastmod()
    {
        $entry = new SitemapEntry("");

        $entry->setLastMod(new \DateTime());

        $this->assertTrue($entry->hasLastMod());
    }

    public function test_get_lastmod_null()
    {
        $entry = new SitemapEntry("");

        $this->assertNull($entry->getLastMod());
    }

    public function test_lastMod_passthrough()
    {
        $entry = new SitemapEntry("");

        $lastMod = new \DateTime();

        $entry->setLastMod($lastMod);

        $this->assertSame($lastMod, $entry->getLastMod());
    }

    public function test_has_no_changefreq()
    {
        $this->assertFalse((new SitemapEntry(""))->hasChangefreq());
    }

    public function test_has_changefreq()
    {
        $entry = new SitemapEntry("");
        $entry->setChangefreq(new Daily());

        $this->assertTrue($entry->hasChangefreq());
    }

    public function test_get_changefreq()
    {
        $entry = new SitemapEntry("");
        $changeFreq = new Daily();
        $entry->setChangefreq($changeFreq);

        $this->assertSame($changeFreq, $entry->getChangefreq());
    }

    public function test_get_changefreq_null()
    {
        $entry = new SitemapEntry("");

        $this->assertNull($entry->getChangefreq());
    }

    public function test_has_no_priority()
    {
        $this->assertFalse((new SitemapEntry(""))->hasPriority());
    }

    public function test_has_priority()
    {
        $entry = new SitemapEntry("");

        $entry->setPriority(0.1);

        $this->assertTrue($entry->hasPriority());
    }

    public function test_get_priority()
    {
        $entry = new SitemapEntry("");

        $prio = 0.1;
        $entry->setPriority($prio);

        $this->assertEquals($prio, $entry->getPriority());
    }

    public function test_get_priority_null()
    {
        $entry = new SitemapEntry("");

        $this->assertNull($entry->getPriority());
    }

}

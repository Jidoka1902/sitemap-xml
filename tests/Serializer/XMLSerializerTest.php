<?php

namespace Jidoka1902\SitemapXML\Tests\Serializer;


use Jidoka1902\SitemapXML\ChangeFrequency\Hourly;
use Jidoka1902\SitemapXML\Serializer\XMLSerializer;
use Jidoka1902\SitemapXML\Structs\Index;
use Jidoka1902\SitemapXML\Structs\IndexEntry;
use Jidoka1902\SitemapXML\Structs\SitemapEntry;
use Jidoka1902\SitemapXML\Structs\Sitemap;
use PHPUnit\Framework\TestCase;

class XMLSerializerTest extends TestCase
{
    /** @var XMLSerializer */
    private $serializer;

    public function setUp()
    {
        $this->serializer = new XMLSerializer();
    }

    public function test_entry_serialization()
    {
        $location = "https://www.google.de";
        $entry = new SitemapEntry($location);
        $result = $this->serializer->serialize($entry);

        $this->assertEquals("<url><loc>$location</loc></url>", $result);
    }

    public function test_entry_serialization_with_lastmod()
    {
        $dateFormat = "Y-m-d";
        $serializer = new XMLSerializer($dateFormat);
        $location = "https://www.google.de";
        $lastMod = new \DateTime("2017-01-01");
        $lastModDate = $lastMod->format($dateFormat);
        $entry = new SitemapEntry($location);
        $entry->setLastMod($lastMod);
        $result = $serializer->serialize($entry);

        $this->assertEquals("<url><loc>$location</loc><lastmod>$lastModDate</lastmod></url>", $result);
    }

    public function test_entry_serialization_with_changefreq()
    {
        $location = "https://www.google.de";
        $entry = new SitemapEntry($location);
        $hourly = new Hourly();
        $entry->setChangefreq($hourly);

        $result = $this->serializer->serialize($entry);

        $this->assertEquals("<url><loc>$location</loc><changefreq>$hourly</changefreq></url>", $result);
    }

    public function test_entry_serialization_with_priority()
    {
        $location = "https://www.google.de";
        $entry = new SitemapEntry($location);

        $priority = 0.5;
        $entry->setPriority($priority);

        $result = $this->serializer->serialize($entry);

        $this->assertEquals("<url><loc>$location</loc><priority>$priority</priority></url>", $result);
    }

    public function test_sitemap_serialization_empty()
    {
        $sitemap = new Sitemap();
        $expectation = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $expectation .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"></urlset>';

        $result = $this->serializer->serialize($sitemap);

        $this->assertEquals($expectation, $result);
    }

    public function test_sitemap_serialization_with_one_entry()
    {
        $sitemap = new Sitemap();
        $location = "https://www.google.de";
        $sitemap->addEntry(new SitemapEntry($location));
        $expectation = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $expectation .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
<url><loc>$location</loc></url>
</urlset>";

        $result = $this->serializer->serialize($sitemap);

        $this->assertEquals($expectation, $result);
    }
    public function test_sitemap_serialization_with_multiple_entries()
    {
        $sitemap = new Sitemap();
        $location = "https://www.google.de";
        $sitemap->addEntry(new SitemapEntry($location));
        $sitemap->addEntry(new SitemapEntry($location));
        $expectation = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
        $expectation .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
<url><loc>$location</loc></url>
<url><loc>$location</loc></url>
</urlset>";

        $result = $this->serializer->serialize($sitemap);

        $this->assertEquals($expectation, $result);
    }

    public function test_indexentry_serialization()
    {
        $location = "https://www.feuerwehr-grosskarolinenfeld.de";
        $iEntry = new IndexEntry($location);

        $result = $this->serializer->serialize($iEntry);

        $expectation = "<sitemap><loc>$location</loc></sitemap>";

        $this->assertEquals($expectation, $result);
    }

    public function test_empty_sitemapindex_serialization()
    {
        $sitemapindex = new Index();

        $result = $this->serializer->serialize($sitemapindex);

        $expectation = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\"></sitemapindex>";

        $this->assertEquals($expectation, $result);
    }
    public function test_sitemapindex_serialization()
    {
        $loc = "asdf";
        $sitemapindex = new Index();
        $sitemapindex->addEntry(new IndexEntry($loc));

        $result = $this->serializer->serialize($sitemapindex);

        $expectation = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<sitemapindex xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n<sitemap><loc>$loc</loc></sitemap>\n</sitemapindex>";

        $this->assertEquals($expectation, $result);
    }

}
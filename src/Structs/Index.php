<?php

namespace Jidoka1902\SitemapXML\Structs;


class Index extends SerializableSitemap implements Serializable, IteratableEntries
{
    private $entries;

    public function __construct()
    {
        $this->entries = [];
    }

    public function addEntry(IndexEntry $entry)
    {
        $this->entries[] = $entry;
    }

    public function entries(): iterable
    {
        foreach ($this->entries as $entry) {
            yield $entry;
        }
    }

    public function getTag(): string
    {
        return "sitemapindex";
    }

    public function getNamespace(): ?string
    {
        return "http://www.sitemaps.org/schemas/sitemap/0.9";
    }

}
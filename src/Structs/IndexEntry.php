<?php

namespace Jidoka1902\SitemapXML\Structs;


class IndexEntry extends SerializableEntry implements Serializable, Locatable, LastModAware
{

    private $lastMod;
    private $loc;

    public function __construct(string $loc)
    {
        $this->loc = $loc;
        $this->lastMod = null;
    }

    public function getTag(): string
    {
        return "sitemap";
    }

    public function getNamespace(): ?string
    {
        return "";
    }

    public function setLastMod(\DateTime $lastMod): void
    {
        $this->lastMod = $lastMod;
    }

    public function hasLastMod(): bool
    {
        return $this->lastMod instanceof \DateTime;
    }

    public function getLastMod(): ?\DateTime
    {
        return $this->lastMod;
    }

    public function getLoc(): string
    {
        return $this->loc;
    }


}
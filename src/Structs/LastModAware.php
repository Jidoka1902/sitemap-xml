<?php

namespace Jidoka1902\SitemapXML\Structs;


interface LastModAware
{
    public function setLastMod(\DateTime $lastMod): void;

    public function hasLastMod(): bool;

    public function getLastMod(): ?\DateTime;

}
<?php

namespace Jidoka1902\SitemapXML\Structs;


use Jidoka1902\SitemapXML\ChangeFrequency\ChangeFrequency;

interface ChangeFrequencyAware
{
    public function setChangefreq(ChangeFrequency $changefreq): void;

    public function hasChangefreq(): bool;

    public function getChangefreq(): ?ChangeFrequency;

}
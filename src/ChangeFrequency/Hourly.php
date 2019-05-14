<?php

namespace Jidoka1902\SitemapXML\ChangeFrequency;


class Hourly implements ChangeFrequency
{
    public function __toString(): string
    {
        return "hourly";
    }
}
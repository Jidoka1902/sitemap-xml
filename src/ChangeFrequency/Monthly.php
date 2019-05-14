<?php

namespace Jidoka1902\SitemapXML\ChangeFrequency;


class Monthly implements ChangeFrequency
{
    public function __toString(): string
    {
        return "monthly";
    }
}
<?php

namespace Jidoka1902\SitemapXML\ChangeFrequency;


class Weekly implements ChangeFrequency
{
    public function __toString(): string
    {
        return "weekly";
    }
}
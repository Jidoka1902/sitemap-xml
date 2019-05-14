<?php

namespace Jidoka1902\SitemapXML\ChangeFrequency;


class Always implements ChangeFrequency
{
    public function __toString(): string
    {
        return "always";
    }

}
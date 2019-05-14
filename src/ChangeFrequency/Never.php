<?php

namespace Jidoka1902\SitemapXML\ChangeFrequency;


class Never implements ChangeFrequency
{
    public function __toString(): string
    {
        return "never";
    }
}
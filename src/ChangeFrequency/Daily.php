<?php

namespace Jidoka1902\SitemapXML\ChangeFrequency;


class Daily implements ChangeFrequency
{
    public function __toString(): string
    {
        return "daily";
    }
}
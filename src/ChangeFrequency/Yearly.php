<?php

namespace Jidoka1902\SitemapXML\ChangeFrequency;


class Yearly implements ChangeFrequency
{
    public function __toString(): string
    {
        return "yearly";
    }
}
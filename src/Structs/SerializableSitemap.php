<?php

namespace Jidoka1902\SitemapXML\Structs;


abstract class SerializableSitemap implements Serializable
{
    final public function isRoot(): bool
    {
        return true;
    }
}
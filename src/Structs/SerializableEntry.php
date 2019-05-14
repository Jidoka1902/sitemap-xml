<?php

namespace Jidoka1902\SitemapXML\Structs;


abstract class SerializableEntry implements Serializable
{
    final public function isRoot(): bool
    {
        return false;
    }
}
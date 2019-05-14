<?php

namespace Jidoka1902\SitemapXML\Serializer;


use Jidoka1902\SitemapXML\Structs\Serializable;

interface Serializer
{
    public function serialize(Serializable $data): string;
}
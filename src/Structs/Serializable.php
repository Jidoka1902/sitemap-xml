<?php

namespace Jidoka1902\SitemapXML\Structs;


interface Serializable
{
    public function isRoot(): bool;

    public function getTag(): string;

    public function getNamespace(): ?string;
}
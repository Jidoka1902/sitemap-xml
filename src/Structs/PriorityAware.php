<?php

namespace Jidoka1902\SitemapXML\Structs;


interface PriorityAware
{
    public function setPriority(float $priority): void;

    public function hasPriority(): bool;

    public function getPriority(): ?float;

}
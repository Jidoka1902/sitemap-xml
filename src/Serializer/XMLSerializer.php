<?php

namespace Jidoka1902\SitemapXML\Serializer;


use Jidoka1902\SitemapXML\Structs\ChangeFrequencyAware;
use Jidoka1902\SitemapXML\Structs\IteratableEntries;
use Jidoka1902\SitemapXML\Structs\LastModAware;
use Jidoka1902\SitemapXML\Structs\Locatable;
use Jidoka1902\SitemapXML\Structs\PriorityAware;
use Jidoka1902\SitemapXML\Structs\Serializable;

class XMLSerializer implements Serializer
{

    /**
     * @var string
     */
    private $dateTimeFormat;

    public function __construct(string $dateTimeFormat = "Y-m-d")
    {
        $this->dateTimeFormat = $dateTimeFormat;
    }

    public function serialize(Serializable $data): string
    {
        $result = "";
        if ($data->isRoot()) $result .= "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";

        $result .= $this->createTag($data);

        return $result;
    }

    private function createTag(Serializable $data): string
    {
        $tag = $data->getTag();
        $namespace = $data->getNamespace();
        $content = "";

        if ($data instanceof Locatable) $content .= "<loc>" . $data->getLoc() . "</loc>";
        if ($data instanceof LastModAware && $data->hasLastMod()) $content .= "<lastmod>" . $data->getLastMod()->format($this->dateTimeFormat) . "</lastmod>";
        if ($data instanceof ChangeFrequencyAware && $data->hasChangefreq()) $content .= "<changefreq>" . (string)$data->getChangefreq() . "</changefreq>";
        if ($data instanceof PriorityAware && $data->hasPriority()) $content .= "<priority>" . $data->getPriority() . "</priority>";

        if ($data instanceof IteratableEntries) {
            $isEmpty = true;
            foreach ($data->entries() as $entry) {
                $isEmpty = false;
                $content .= "\n" . $this->createTag($entry);
            }
            if (!$isEmpty) $content .= "\n";
        }

        $ns = ($namespace !== "")? " xmlns=\"$namespace\"" : "";

        return "<$tag$ns>$content</$tag>";
    }
}
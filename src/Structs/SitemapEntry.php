<?php

namespace Jidoka1902\SitemapXML\Structs;


use Jidoka1902\SitemapXML\ChangeFrequency\ChangeFrequency;

class SitemapEntry extends SerializableEntry implements Serializable, Locatable, LastModAware, ChangeFrequencyAware, PriorityAware
{
    /**
     * @var string
     */
    private $loc;
    /**
     * @var \DateTime|null
     */
    private $lastMod;
    /**
     * @var ChangeFrequency
     */
    private $changefreq;
    /**
     * @var float
     */
    private $priority;

    public function __construct(string $loc)
    {
        $this->loc = $loc;
        $this->lastMod = null;
        $this->changefreq = null;
        $this->priority = null;
    }

    /**
     * @return string
     */
    public function getLoc(): string
    {
        return $this->loc;
    }

    /**
     * @param \DateTime $lastMod
     */
    public function setLastMod(\DateTime $lastMod): void
    {
        $this->lastMod = $lastMod;
    }

    public function hasLastMod(): bool
    {
        return $this->lastMod instanceof \DateTime;
    }

    /**
     * @return \DateTime
     */
    public function getLastMod(): ?\DateTime
    {
        return $this->lastMod;
    }

    public function setChangefreq(ChangeFrequency $changefreq): void
    {
        $this->changefreq = $changefreq;
    }

    public function hasChangefreq(): bool
    {
        return $this->changefreq instanceof ChangeFrequency;
    }

    public function getChangefreq(): ?ChangeFrequency
    {
        return $this->changefreq;
    }

    /**
     * @param float $priority
     */
    public function setPriority(float $priority): void
    {
        $this->priority = $priority;
    }

    public function hasPriority(): bool
    {
        return is_float($this->priority);
    }

    /**
     * @return float
     */
    public function getPriority(): ?float
    {
        return $this->priority;
    }

    public function getTag(): string
    {
        return "url";
    }

    public function getNamespace(): string
    {
        return "";
    }

}
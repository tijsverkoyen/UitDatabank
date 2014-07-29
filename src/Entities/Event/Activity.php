<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

class Activity
{
    /**
     * @var int
     */
    protected $count = 0;

    /**
     * @var string
     */
    protected $type;

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Activity
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $activity = new Activity();

        if (isset($xml->attributes()['count'])) {
            $activity->setCount((int) $xml->attributes()['count']);
        }
        if (isset($xml->attributes()['type'])) {
            $activity->setType((string) $xml->attributes()['type']);
        }

        return $activity;
    }
}

<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme;

class Day
{
    /**
     * @var string
     */
    protected $openType;

    /**
     * @param string $type
     */
    public function setOpenType($type)
    {
        $this->openType = $type;
    }

    /**
     * @return string
     */
    public function getOpenType()
    {
        return $this->openType;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Phone
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $day = new Day();
        $attributes = $xml->attributes();

        if (isset($attributes['opentype'])) {
            $day->setOpenType((string) $attributes['opentype']);
        }

        return $day;
    }
}

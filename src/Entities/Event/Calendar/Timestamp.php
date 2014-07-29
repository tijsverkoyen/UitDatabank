<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\Calendar;

class Timestamp
{
    /**
     * @var \DateTime
     */
    protected $timeStart;

    /**
     * @var \DateTime
     */
    protected $timeEnd;

    /**
     * @param \DateTime $timeEnd
     */
    public function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;
    }

    /**
     * @return \DateTime
     */
    public function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * @param \DateTime $timeStart
     */
    public function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;
    }

    /**
     * @return \DateTime
     */
    public function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Timestamp
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $timestamp = new Timestamp();

        if (isset($xml->date)) {
            if (isset($xml->timestart)) {
                $start = (string) $xml->date . ' ' . (string) $xml->timestart;
                $timestamp->setTimeStart(
                    new \DateTime($start)
                );
            }
            if (isset($xml->timeend)) {
                $end = (string) $xml->date . ' ' . (string) $xml->timeend;
                $timestamp->setTimeEnd(
                    new \DateTime($end)
                );
            }
        }

        return $timestamp;
    }
}

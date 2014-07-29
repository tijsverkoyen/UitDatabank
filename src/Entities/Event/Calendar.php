<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Permanent;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Timestamp;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Period;
use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class Calendar
{
    /**
     * @var array
     */
    protected $timestamps = array();

    /**
     * @var Permanent
     */
    protected $permanentOpeningTimes;

    /**
     * @var array
     */
    protected $periods = array();

    /**
     * @param Period $period
     */
    public function addPeriod(Period $period)
    {
        $this->periods[] = $period;
    }

    /**
     * @param array $periods
     */
    public function setPeriods($periods)
    {
        $this->periods = $periods;
    }

    /**
     * @return array
     */
    public function getPeriods()
    {
        return $this->periods;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Permanent $permanentOpeningTimes
     */
    public function setPermanentOpeningTimes($permanentOpeningTimes)
    {
        $this->permanentOpeningTimes = $permanentOpeningTimes;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Permanent
     */
    public function getPermanentOpeningTimes()
    {
        return $this->permanentOpeningTimes;
    }

    public function addTimestamp(Timestamp $timestamp)
    {
        $this->timestamps[] = $timestamp;
    }

    /**
     * @param array $timestamps
     */
    public function setTimestamps($timestamps)
    {
        $this->timestamps = $timestamps;
    }

    /**
     * @return array
     */
    public function getTimestamps()
    {
        return $this->timestamps;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Calendar
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $calendar = new Calendar();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($calendar, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                call_user_func(array($calendar, $method), $value);
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());
            $value = null;

            switch ($elementName) {
                case 'timestamps':
                    if (isset($element->timestamp)) {
                        $calendar->addTimestamp(
                            Timestamp::createFromXML($element->timestamp)
                        );
                    }
                    break;
                case 'permanentopeningtimes':
                    if (isset($element->permanent)) {
                        $value = Permanent::createFromXML($element->permanent);
                    }
                    break;
                case 'periods':
                    if (isset($element->period)) {
                        foreach ($element->period as $period) {
                            $calendar->addPeriod(
                                Period::createFromXML($period)
                            );
                        }
                    }
                    break;
                default:
                    $value = (string) $element;
                    break;
            }

            if (!method_exists($calendar, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($calendar, $method), $value);
                }
            }
        }

        return $calendar;
    }
}

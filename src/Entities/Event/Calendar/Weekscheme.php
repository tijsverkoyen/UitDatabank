<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\Calendar;

use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Day;
use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class WeekScheme
{
    /**
     * @var array
     */
    protected $days = array();

    public function addDay(Day $day)
    {
        $this->days[] = $day;
    }

    /**
     * @param array $days
     */
    public function setDays($days)
    {
        $this->days = $days;
    }

    /**
     * @return array
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return WeekScheme
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $weekScheme = new WeekScheme();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($weekScheme, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($weekScheme, $method), $value);
                }
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $skip = false;
            $value = null;
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                case 'weekscheme':
                    foreach ($element as $day) {
                        $className = '\\TijsVerkoyen\\UitDatabank\\Entities\\Event\\Calendar\\WeekScheme\\' . ucfirst($day->getName());
                        $weekScheme->addDay(
                            call_user_func(array($className, 'createFromXML'), $day)
                        );
                    }
                    $skip = true;
                    break;
                default:
                    $value = (string) $element;
                    break;
            }

            if (!$skip) {
                if (!method_exists($weekScheme, $method)) {
                    if (UitDatabank::DEBUG) {
                        throw new Exception('Unknown element: ' . $elementName);
                    }
                } else {
                    if ($value !== null) {
                        call_user_func(array($weekScheme, $method), $value);
                    }
                }
            }
        }

        return $weekScheme;
    }
}

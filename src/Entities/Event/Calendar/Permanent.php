<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\Calendar;

use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class Permanent
{
    /**
     * @var WeekScheme
     */
    protected $weekScheme;

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme $weekScheme
     */
    public function setWeekScheme($weekScheme)
    {
        $this->weekScheme = $weekScheme;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme
     */
    public function getWeekScheme()
    {
        return $this->weekScheme;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Permanent
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $permanent = new Permanent();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($permanent, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($permanent, $method), $value);
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
                case 'permanent':
                    if (isset($element->weekscheme)) {
                        $permanent->setWeekScheme(
                            WeekScheme::createFromXML($element->weekscheme)
                        );
                    }
                    $skip = true;
                    break;
                default:
                    $value = (string) $element;
                    break;
            }

            if (!$skip) {
                if (!method_exists($permanent, $method)) {
                    if (UitDatabank::DEBUG) {
                        throw new Exception('Unknown element: ' . $elementName);
                    }
                } else {
                    if ($value !== null) {
                        call_user_func(array($permanent, $method), $value);
                    }
                }
            }
        }

        return $permanent;
    }
}

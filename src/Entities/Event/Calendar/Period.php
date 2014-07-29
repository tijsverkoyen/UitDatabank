<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\Calendar;

use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class Period
{
    /**
     * @var \DateTime
     */
    protected $dateFrom;

    /**
     * @var \DateTime
     */
    protected $dateTo;

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
     * @param \DateTime $dateFrom
     */
    public function setDateFrom($dateFrom)
    {
        $this->dateFrom = $dateFrom;
    }

    /**
     * @return \DateTime
     */
    public function getDateFrom()
    {
        return $this->dateFrom;
    }

    /**
     * @param \DateTime $dateTo
     */
    public function setDateTo($dateTo)
    {
        $this->dateTo = $dateTo;
    }

    /**
     * @return \DateTime
     */
    public function getDateTo()
    {
        return $this->dateTo;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Permanent
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $period = new Period();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($period, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($period, $method), $value);
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
                case 'datefrom':
                case 'dateto':
                    $value = new \DateTime((string) $element . ' 00:00:00');
                    break;
                case 'weekscheme':
                    if (isset($element->weekscheme)) {
                        $period->setWeekScheme(
                            WeekScheme::createFromXML($element)
                        );
                    }
                    break;
                default:
                    $value = (string) $element;
                    break;
            }

            if (!$skip) {
                if (!method_exists($period, $method)) {
                    if (UitDatabank::DEBUG) {
                        throw new Exception('Unknown element: ' . $elementName);
                    }
                } else {
                    if ($value !== null) {
                        call_user_func(array($period, $method), $value);
                    }
                }
            }
        }

        return $period;
    }
}

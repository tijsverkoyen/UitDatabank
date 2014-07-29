<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\Address;

use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class Physical
{
    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $country;

    /**
     * @var Gis
     */
    protected $gis;

    /**
     * @var string
     */
    protected $houseNr;

    /**
     * @var string
     */
    protected $street;

    /**
     * @var string
     */
    protected $zipcode;

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis $gis
     */
    public function setGis($gis)
    {
        $this->gis = $gis;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis
     */
    public function getGis()
    {
        return $this->gis;
    }

    /**
     * @param string $houseNr
     */
    public function setHouseNr($houseNr)
    {
        $this->houseNr = $houseNr;
    }

    /**
     * @return string
     */
    public function getHouseNr()
    {
        return $this->houseNr;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Physical
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $physical = new Physical();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($physical, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($physical, $method), $value);
                }
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                case 'gis':
                    $value = Gis::createFromXML($element);
                    break;
                default:
                    $value = (string) $element;
                    break;
            }

            if (!method_exists($physical, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($physical, $method), $value);
                }
            }
        }

        return $physical;
    }
}

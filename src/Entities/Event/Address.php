<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

use TijsVerkoyen\UitDatabank\Entities\Event\Address\Physical;
use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class Address
{
    /**
     * @var Physical
     */
    protected $physical;

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Address\Physical $physical
     */
    public function setPhysical(Physical $physical)
    {
        $this->physical = $physical;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Address\Physical
     */
    public function getPhysical()
    {
        return $this->physical;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Address
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $address = new Address();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($address, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                call_user_func(array($address, $method), $value);
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                case 'physical':
                    $value = Physical::createFromXML($element);
                    break;

                default:
                    $value = (string) $value;
                    break;
            }

            if (!method_exists($address, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                call_user_func(array($address, $method), $value);
            }
        }

        return $address;
    }
}

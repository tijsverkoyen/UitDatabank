<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

use TijsVerkoyen\UitDatabank\Entities\Event\Location\Label;
use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class Location
{
    /**
     * @var Address
     */
    protected $address;

    /**
     * @var Label
     */
    protected $label;

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Address $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Label $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Address
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $location = new Location();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($location, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                call_user_func(array($location, $method), $value);
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                case 'address':
                    $value = Address::createFromXML($element);
                    break;
                case 'label':
                    $value = Label::createFromXML($element);
                    break;
                default:
                    $value = (string) $element;
                    break;
            }

            if (!method_exists($location, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                call_user_func(array($location, $method), $value);
            }
        }

        return $location;
    }
}

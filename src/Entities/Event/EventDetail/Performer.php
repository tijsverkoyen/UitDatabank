<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\EventDetail;

use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class Performer
{
    /**
     * @var string
     */
    protected $role;

    /**
     * @var string
     */
    protected $label;

    /**
     * @param string $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Performer
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $performer = new Performer();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($performer, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($performer, $method), $value);
                }
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                case 'pricevalue':
                    $method = 'setValue';
                    $value = (float) $element;
                    break;
                case 'pricedescription':
                    $method = 'setDescription';
                    $value = (string) $element;
                    break;
                default:
                    $value = (string) $element;
                    break;
            }

            if (!method_exists($performer, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($performer, $method), $value);
                }
            }
        }

        return $performer;
    }
}

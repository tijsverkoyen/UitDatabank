<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

class Organiser
{
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
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Organiser
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $organiser = new Organiser();

        // loop attributes
        foreach ($xml->attributes() as $key => $value) {
            $method = 'set' . ucfirst($key);

            switch ($key) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($organiser, $method)) {
                var_dump($method);
                var_dump($key);
                var_dump($value);
                exit;
            } else {
                call_user_func(array($organiser, $method), $value);
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                default:
                    $value = (string) $element;
                    break;
            }

            if (!method_exists($organiser, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                call_user_func(array($organiser, $method), $value);
            }
        }

        return $organiser;
    }
}

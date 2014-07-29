<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

class Phone
{
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Phone
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $phone = new Phone();

        if (isset($xml->attributes()['type'])) {
            $phone->setType((string) $xml->attributes()['type']);
        }
        $phone->setValue((string) $xml);

        return $phone;
    }
}

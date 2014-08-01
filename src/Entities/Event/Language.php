<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

class Language
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
     * @return Language
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $language = new Language();
        $attributes = $xml->attributes();

        if (isset($attributes['type'])) {
            $language->setType((string)$attributes['type']);
        }
        $language->setValue((string) $xml);

        return $language;
    }
}

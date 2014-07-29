<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

class Mail
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
     * @return Mail
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $mail = new Mail();

        if (isset($xml->attributes()['type'])) {
            $mail->setType((string) $xml->attributes()['type']);
        }
        $mail->setValue((string) $xml);

        return $mail;
    }
}

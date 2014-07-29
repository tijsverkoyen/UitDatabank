<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\Location;

class Label
{
    /**
     * @var string
     */
    protected $cdbid;

    /**
     * @var string
     */
    protected $value;

    /**
     * @param string $cdbid
     */
    public function setCdbid($cdbid)
    {
        $this->cdbid = $cdbid;
    }

    /**
     * @return string
     */
    public function getCdbid()
    {
        return $this->cdbid;
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
     * @return Gis
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $label = new Label();

        if (isset($xml->attributes()['cdbid'])) {
            $label->setCdbid($xml->attributes()['cdbid']);
        }

        $label->setValue((string) $xml);

        return $label;
    }
}

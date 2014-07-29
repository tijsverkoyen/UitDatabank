<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\Address;

class Gis
{
    /**
     * @var float
     */
    protected $xCoordinate;

    /**
     * @var float
     */
    protected $yCoordinate;

    /**
     * @param float $xCoordinate
     */
    public function setXCoordinate($xCoordinate)
    {
        $this->xCoordinate = $xCoordinate;
    }

    /**
     * @return float
     */
    public function getXCoordinate()
    {
        return $this->xCoordinate;
    }

    /**
     * @param float $yCoordinate
     */
    public function setYCoordinate($yCoordinate)
    {
        $this->yCoordinate = $yCoordinate;
    }

    /**
     * @return float
     */
    public function getYCoordinate()
    {
        return $this->yCoordinate;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Gis
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $gis = new Gis();

        if (isset($xml->xcoordinate)) {
            $gis->setXCoordinate((float) $xml->xcoordinate);
        }
        if (isset($xml->ycoordinate)) {
            $gis->setYCoordinate((float) $xml->ycoordinate);
        }

        return $gis;
    }
}

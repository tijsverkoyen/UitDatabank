<?php

namespace TijsVerkoyen\UitDatabank\Tests;

use TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis;

class TestHelper
{
    /**
     * Create an XML-string
     *
     * @param        $array
     * @param string $prefix
     * @param int    $counter
     * @return string
     */
    public static function createXMLFromArray($array, $prefix = '', $counter = 0)
    {
        if ($counter == 0) {
            $xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>' . "\n";
        } else {
            $xml = '';
        }

        foreach ($array as $key => $value) {
            $xml .= str_repeat("\t", $counter);
            $xml .= '<' . $prefix . $key . '>';

            if (is_array($value)) {
                $xml .= "\n";
                $xml .= static::createXMLFromArray($value, $prefix, ($counter + 1));
            } else {
                $xml .= $value;
            }

            $xml .= '</' . $prefix . $key . '>' . "\n";
        }

        if ($counter == 0) {
            return simplexml_load_string($xml);
        } else {
            return $xml;
        }
    }

    /**
     * @return array
     */
    public function getEntitiesEventAddressGisData()
    {
        return array(
            'gis' => array(
                'xcoordinate' => 2.849605,
                'ycoordinate' => 51.197985
            )
        );
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis
     */
    public function getEntitiesEventAddressGisObject()
    {
        $data = $this->getEntitiesEventAddressGisData();
        $xml = TestHelper::createXMLFromArray($data);

        return Gis::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventAddressPhysicalData()
    {
        return array(
            'physical' => array(
                'city' => 'Oostende',
                'country' => 'BE',
                'gis' => array(
                    'xcoordinate' => 2.849605,
                    'ycoordinate' => 51.197985,
                ),
                'housenr' => '636',
                'street' => 'Nieuwpoortsesteenweg',
                'zipcode' => '8400',
            ),
        );
    }
}

<?php

namespace TijsVerkoyen\UitDatabank\Tests;

use TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Monday;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme;

class TestHelper
{
    /**
     * Create an XML-string
     *
     * @param        $array
     * @param string $prefix
     * @param int    $counter
     * @return \SimpleXMLElement|string
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
            $xml .= '<' . $prefix . $key;

            if (is_array($value) && array_key_exists('@attributes', $value)) {
                foreach ($value['@attributes'] as $attribute => $attributeValue) {
                    $xml .= ' ' . $attribute . '="' . $attributeValue . '"';
                }

                unset($value['@attributes']);
                if (count($value) == 1 && array_key_exists('value', $value)) {
                    $value = $value['value'];
                }
            }

            if (empty($value)) {
                $xml .= ' />' . "\n";
            } else {
                $xml .= '>';

                if (is_array($value)) {
                    $xml .= "\n";
                    $xml .= static::createXMLFromArray($value, $prefix, ($counter + 1));
                } else {
                    $xml .= $value;
                }

                $xml .= '</' . $prefix . $key . '>' . "\n";
            }
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

    /**
     * @param string $dayName
     * @return array
     */
    public function getEntitiesEventCalendarWeekSchemeDayData($dayName = 'monday')
    {
        return array(
            $dayName => array(
                '@attributes' => array(
                    'opentype' => 'closed',
                ),
            ),
        );
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Phone
     */
    public function getEntitiesEventCalendarWeekSchemeDayObject()
    {
        $data = $this->getEntitiesEventCalendarWeekSchemeDayData();
        $xml = TestHelper::createXMLFromArray($data);

        return Monday::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventCalendarPeriodData()
    {
        return array(
            'period' => array(
                'datefrom' => '2014-07-08',
                'dateto' => '2014-09-30',
                'weekscheme' => array(
                    'monday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'tuesday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'wednesday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'thursday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'friday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'saturday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'sunday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                ),
            ),
        );
    }

    public function getEntitiesEventCalendarWeekSchemeData()
    {
        return array(
            'arf' => array(
                'weekscheme' => array(
                    'monday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'tuesday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'wednesday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'thursday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'friday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'saturday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'sunday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                ),
            ),
        );
    }

    /**
     * @return WeekScheme
     */
    public function getEntitiesEventCalendarWeekSchemeObject()
    {
        $data = $this->getEntitiesEventCalendarWeekSchemeData();
        $xml = TestHelper::createXMLFromArray($data);

        return WeekScheme::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventCalendarPermanentData()
    {
        return array(
            'permanent' => array(
                'weekscheme' => array(
                    'monday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'tuesday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'wednesday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'thursday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'friday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'saturday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                    'sunday' => array(
                        '@attributes' => array(
                            'opentype' => 'open',
                        ),
                    ),
                ),
            ),
        );
    }

    /**
     * @return array
     */
    public function getEntitiesEventCalendarTimestampData()
    {
        return array(
            'timestamp' => array(
                'date' => '2014-09-14',
                'timestart' => '10:00:00',
                'timeend' => '18:00:00',
            ),
        );
    }

    /**
     * @return array
     */
    public function getEntitiesEventEventDetailMediaData()
    {
        return array(
            'file' => array(
                '@attributes' => array(
                    'creationdate' => '23/07/2014 15:11:47',
                    'main' => "true",
                ),
                'copyright' => 'Open Monumentendag: Erfgoed vroeger, nu en in de toekomst',
                'filename' => '4e6946f6-3b21-4ce9-b7fb-d554298767f1.jpg',
                'filetype' => 'jpeg',
                'hlink' => '//media.uitdatabank.be/20140723/4e6946f6-3b21-4ce9-b7fb-d554298767f1.jpg',
                'mediatype' => 'photo',
            )
        );
    }

    /**
     * @return array
     */
    public function getEntitiesEventEventDetailPerformerData()
    {
        return array(
            'performer' => array(
                'role' => 'begeleider',
                'label' => 'Korneel De Rynck (historicus en auteur)',
            ),
        );
    }

    /**
     * @return array
     */
    public function getEntitiesEventEventDetailPrice()
    {
        return array(
            'price' => array(
                'pricevalue' => 10.0,
                'pricedescription' => 'ticketing inbegrepen
                        korting  voor jongeren',
            ),

        );
    }

    /**
     * @return array
     */
    public function getEntitiesEventLocationLabelData()
    {
        return array(
            'label' => array(
                '@attributes' => array(
                    'cdbid' => '1d36a305-1e89-4cd2-97eb-bb8644bcc6af',
                ),
                'value' => 'CC de Grote Post',
            ),
        );
    }
}

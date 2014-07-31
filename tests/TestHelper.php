<?php

namespace TijsVerkoyen\UitDatabank\Tests;

use TijsVerkoyen\UitDatabank\Entities\Event\Activity;
use TijsVerkoyen\UitDatabank\Entities\Event\Address\Gis;
use TijsVerkoyen\UitDatabank\Entities\Event\Address\Physical;
use TijsVerkoyen\UitDatabank\Entities\Event\Address;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Period;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Permanent;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Timestamp;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme\Monday;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\WeekScheme;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar;
use TijsVerkoyen\UitDatabank\Entities\Event\Category;
use TijsVerkoyen\UitDatabank\Entities\Event\ContactInfo;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Media;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Performer;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Price;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail;
use TijsVerkoyen\UitDatabank\Entities\Event\Language;
use TijsVerkoyen\UitDatabank\Entities\Event\Location\Label;
use TijsVerkoyen\UitDatabank\Entities\Event\Location;
use TijsVerkoyen\UitDatabank\Entities\Event\Mail;
use TijsVerkoyen\UitDatabank\Entities\Event\Organiser;
use TijsVerkoyen\UitDatabank\Entities\Event\Phone;
use TijsVerkoyen\UitDatabank\Entities\Event;

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
     * @return Physical
     */
    public function getEntitiesEventAddressPhysicalObject()
    {
        $data = $this->getEntitiesEventAddressPhysicalData();
        $xml = TestHelper::createXMLFromArray($data);

        return Physical::createFromXML($xml);
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

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Period
     */
    public function getEntitiesEventCalendarPeriodObject()
    {
        $data = $this->getEntitiesEventCalendarPeriodData();
        $xml = TestHelper::createXMLFromArray($data);

        return Period::createFromXML($xml);
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
     * @return Permanent
     */
    public function getEntitiesEventCalendarPermanentObject()
    {
        $data = $this->getEntitiesEventCalendarPermanentData();
        $xml = TestHelper::createXMLFromArray($data);

        return Permanent::createFromXML($xml);
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
     * @return Timestamp
     */
    public function getEntitiesEventCalendarTimestampObject()
    {
        $data = $this->getEntitiesEventCalendarTimestampData();
        $xml = TestHelper::createXMLFromArray($data);

        return Timestamp::createFromXML($xml);
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
     * @return Media
     */
    public function getEntitiesEventEventDetailMediaObject()
    {
        $data = $this->getEntitiesEventEventDetailMediaData();
        $xml = TestHelper::createXMLFromArray($data);

        return Media::createFromXML($xml);
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
     * @return Performer
     */
    public function getEntitiesEventEventDetailPerformerObject()
    {
        $data = $this->getEntitiesEventEventDetailPerformerData();
        $xml = TestHelper::createXMLFromArray($data);

        return Performer::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventEventDetailPriceData()
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
     * @return Price
     */
    public function getEntitiesEventEventDetailPriceObject()
    {
        $data = $this->getEntitiesEventEventDetailPriceData();
        $xml = TestHelper::createXMLFromArray($data);

        return Price::createFromXML($xml);
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

    /**
     * @return Label
     */
    public function getEntitiesEventLocationLabelObject()
    {
        $data = $this->getEntitiesEventLocationLabelData();
        $xml = TestHelper::createXMLFromArray($data);

        return Label::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventActivityData()
    {
        return array(
            'activity' => array(
                '@attributes' => array(
                    'count' => 0,
                    'type' => 'like',
                )
            )
        );
    }

    /**
     * @return Activity
     */
    public function getEntitiesEventActivityObject()
    {
        $data = $this->getEntitiesEventActivityData();
        $xml = TestHelper::createXMLFromArray($data);

        return Activity::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventAddressData()
    {
        return array(
            'address' => array(
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
            ),
        );
    }

    /**
     * @return Address
     */
    public function getEntitiesEventAddressObject()
    {
        $data = $this->getEntitiesEventAddressData();
        $xml = TestHelper::createXMLFromArray($data);

        return Address::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventCategoryData()
    {
        return array(
            'category' => array(
                '@attributes' => array(
                    'catid' => '1.7.4.0.0',
                    'type' => 'theme',
                ),
                'value' => 'Drama',
            ),
        );
    }

    /**
     * @return Category
     */
    public function getEntitiesEventCategoryObject()
    {
        $data = $this->getEntitiesEventCategoryData();
        $xml = TestHelper::createXMLFromArray($data);

        return Category::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventLanguageData()
    {
        return array(
            'language' => array(
                '@attributes' => array(
                    'type' => 'spoken',
                ),
                'value' => 'Nederlands',
            ),
        );
    }

    /**
     * @return Language
     */
    public function getEntitiesEventLanguageObject()
    {
        $data = $this->getEntitiesEventLanguageData();
        $xml = TestHelper::createXMLFromArray($data);

        return Language::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventMailData()
    {
        return array(
            'mail' => array(
                '@attributes' => array(
                    'type' => 'main',
                ),
                'value' => 'stadsmuseum@oostende.be',
            ),
        );
    }

    /**
     * @return mixed
     */
    public function getEntitiesEventMailObject()
    {
        $data = $this->getEntitiesEventMailData();
        $xml = TestHelper::createXMLFromArray($data);

        return Mail::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventOrganiserData()
    {
        return array(
            'organiser' => array(
                'label' => 'Koninklijke Oostendse Heem- en Geschiedkundige Kring De Plate',
            ),
        );
    }

    /**
     * @return Organiser
     */
    public function getEntitiesEventOrganiserObject()
    {
        $data = $this->getEntitiesEventOrganiserData();
        $xml = TestHelper::createXMLFromArray($data);

        return Organiser::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventPhoneData()
    {
        return array(
            'phone' => array(
                '@attributes' => array(
                    'type' => 'phone',
                ),
                'value' => '059 70 22 85',
            ),
        );
    }

    /**
     * @return Phone
     */
    public function getEntitiesEventPhoneObject()
    {
        $data = $this->getEntitiesEventPhoneData();
        $xml = TestHelper::createXMLFromArray($data);

        return Phone::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventLocationData()
    {
        return array(
            'location' => array(
                'address' => array(
                    'physical' => array(
                        'city' => 'Oostende',
                        'country' => 'BE',
                        'gis' => array(
                            'xcoordinate' => '2.849605',
                            'ycoordinate' => '51.197985',
                        ),
                        'housenr' => '636',
                        'street' => 'Nieuwpoortsesteenweg',
                        'zipcode' => '8400',
                    ),
                ),
                'label' => array(
                    '@attributes' => array(
                        'cdbid' => 'abd6bb31-ff5f-42f4-90ac-8120bbd3100d',
                    ),
                    'value' => 'Raversyde',
                ),
            ),
        );
    }

    /**
     * @return Location
     */
    public function getEntitiesEventLocationObject()
    {
        $data = $this->getEntitiesEventLocationData();
        $xml = TestHelper::createXMLFromArray($data);

        return Location::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventCalendarData()
    {
        return array(
            'calendar' => array(
                'periods' => array(
                    'period' => array(
                        'datefrom' => '2013-03-23',
                        'dateto' => '2014-11-11',
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
                ),
            ),
        );
    }

    /**
     * @return Calendar
     */
    public function getEntitiesEventCalendarObject()
    {
        $data = $this->getEntitiesEventCalendarData();
        $xml = TestHelper::createXMLFromArray($data);

        return Calendar::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventContactInfoData()
    {
        return array(
            'contactinfo' => array(
                'address' => array(
                    'physical' => array(
                        'city' => 'Oostende',
                        'country' => 'BE',
                        'gis' => array(
                            'xcoordinate' => '2.849605',
                            'ycoordinate' => '51.197985',
                        ),
                        'housenr' => '636',
                        'street' => 'Nieuwpoortsesteenweg',
                        'zipcode' => '8400',
                    ),
                ),
                'mail' => 'info@raversyde.be',
                'phone' => array(
                    '@attributes' => array(
                        'type' => 'phone',
                    ),
                    'value' => '059 70 22 85',
                ),
                'url' => 'http://www.raversyde.be',
            ),
        );
    }

    /**
     * @return ContactInfo
     */
    public function getEntitiesEventContactInfoObject()
    {
        $data = $this->getEntitiesEventContactInfoData();
        $xml = TestHelper::createXMLFromArray($data);

        return ContactInfo::createFromXML($xml);
    }

    public function getEntitiesEventEventDetailData()
    {
        return array(
            'eventdetail' => array(
                '@attributes' => array(
                    'lang' => 'nl',
                ),
                'calendarsummary' => 'van 23/03/13 tot 11/11/14
                    Altijd open',
                'longdescription' => 'longdescription',
                'media' => array(
                    'file' => array(
                        'hlink' => 'http://www.raversyde.be',
                        'mediatype' => 'webresource',
                    ),
                ),
                'price' => array(
                    'pricevalue' => '6.5',
                    'pricedescription' => 'Grabbelpassers: € 3,25 per attractie (i.p.v. € 6,50), begeleidende volwassenen: €6,50 per attractie.
                        Grabbelpassers € 6,50 voor All-In 3 attracties (i.p.v. € 9,75)',
                ),
                'shortdescription' => 'Raversyde ligt tussen Oostende en Middelkerke. Het strekt zich uit over een gebied van bijna 50 hectaren. Naast een bezoek aan Atlantikwall, anno 1465 (Walraversijde) en het memoriaal Prins Karel, kunt u ook wandelen in het Natuurpark met zijn schitterende vijvers, sportief ontspannen in het recreatiegedeelte of uitblazen in de cafetaria Walrave.',
                'title' => 'Raversyde - Oostende',
            ),
        );
    }

    /**
     * @return EventDetail
     */
    public function getEntitiesEventEventDetailObject()
    {
        $data = $this->getEntitiesEventEventDetailData();
        $xml = TestHelper::createXMLFromArray($data);

        return EventDetail::createFromXML($xml);
    }

    /**
     * @return array
     */
    public function getEntitiesEventData()
    {
        return array(
            'event' => array(
                '@attributes' => array(
                    'availablefrom' => '2014-06-16T00:00:00',
                    'availableto' => '2014-08-29T00:00:00',
                    'cdbid' => '450a6625-96de-437b-b5eb-4fda63545d10',
                    'createdby' => 'l_hoste@hotmail.com',
                    'creationdate' => '2014-06-16T15:38:00',
                    'externalid' => 'CDB:324c0916-8ff8-4d9f-8281-bbbcfa03d50f',
                    'isparent' => 'false',
                    'lastupdated' => '2014-07-16T11:41:14',
                    'lastupdatedby' => 'sandra.vandenbroucke@telenet.be',
                    'pctcomplete' => '75',
                    'published' => 'true',
                    'owner' => 'Invoerders Algemeen ',
                    'private' => 'false',
                    'validator' => 'Oostende Validatoren',
                    'wfstatus' => 'readyforvalidation',
                ),
                'activities' => array(
                    'activity' => array(
                        '@attributes' => array(
                            'count' => 0,
                            'type' => 'like',
                        ),
                    ),
                ),
                'calendar' => array(
                    'timestamps' => array(
                        'timestamp' => array(
                            'date' => '2014-08-28',
                            'timestart' => '14:00:00',
                            'timeend' => '16:00:00',
                        ),
                    ),
                ),
                'categories' => array(
                    'category' => array(
                        '@attributes' => array(
                            'catid' => '1.0.6.0.0',
                            'type' => 'theme',
                        ),
                        'value' => 'Fotografie',
                    ),
                ),
                'contactinfo' => array(
                    'address' => array(
                        'physical' => array(
                            'city' => 'Oostende',
                            'country' => 'BE',
                            'gis' => array(
                                'xcoordinate' => 2.849605,
                                'ycoordinate' => 51.197985,
                            ),
                            'housenr' => '636',
                            'street' => 'Nieuwpoortsesteenweg',
                            'zipcode' => 8400
                        ),
                    ),
                    'phone' => array(
                        '@attributes' => array(
                            'type' => 'phone',
                        ),
                        'value' => '0476509373',
                    ),
                ),
                'eventdetails' => array(
                    'eventdetail' => array(
                        '@attributes' => array(
                            'lang' => 'nl',
                        )
                    ),
                    'calendarsummary' => 'do 28 /08/14 van 14:00 tot 16:00',
                    'media' => array(
                        'file' => array(
                            '@attributes' => array(
                                'creationdate' => '16/07/2014 11:41:11',
                                'main' => 'true',
                            ),
                            'copyright' => 'Bezoek tentoonstelling en domein Raversyde',
                            'filename' => '2f83d60f-84c6-41b3-9bbc-d11b6158c999.png',
                        )
                    ),
                ),
                'keywords' => 'Groote Oorlog',
                'location' => array(
                    'address' => array(
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
                    ),
                    'label' => array(
                        '@attributes' => array(
                            'cdbid' => '8587AE0E - DD73 - 6B7B - 305B7FD1D283ABFD',
                        ),
                        'value' => 'Provinciedomein Raversijde',
                    ),
                ),
                'organiser' => array(
                    'label' => 'Viva Paint West - Vlaanderen',
                ),
            ),
        );
    }

    /**
     * @return Event
     */
    public function getEntitiesEventObject()
    {
        $data = $this->getEntitiesEventData();
        $xml = TestHelper::createXMLFromArray($data);

        return Event::createFromXML($xml);
    }
}

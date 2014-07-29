<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Media;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Performer;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Price;
use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class EventDetail
{
    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $calendarSummary;

    /**
     * @var array
     */
    protected $media = array();

    /**
     * @var array
     */
    protected $performers = array();

    /**
     * @var Price
     */
    protected $price;

    /**
     * @var string
     */
    protected $shortDescription;

    /**
     * @var
     */
    protected $longDescription;

    /**
     * @var string
     */
    protected $title;

    /**
     * @param string $calendarSummary
     */
    public function setCalendarSummary($calendarSummary)
    {
        $this->calendarSummary = $calendarSummary;
    }

    /**
     * @return string
     */
    public function getCalendarSummary()
    {
        return $this->calendarSummary;
    }

    /**
     * @param string $lang
     */
    public function setLang($lang)
    {
        $this->lang = $lang;
    }

    /**
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param Media $media
     */
    public function addMedia($media)
    {
        $this->media[] = $media;
    }

    /**
     * @param array $media
     */
    public function setMedia($media)
    {
        $this->media = $media;
    }

    /**
     * @return array
     */
    public function getMedia()
    {
        return $this->media;
    }

    public function addPerformer(Performer $performer)
    {
        $this->performers[] = $performer;
    }

    /**
     * @param array $performers
     */
    public function setPerformers($performers)
    {
        $this->performers = $performers;
    }

    /**
     * @return array
     */
    public function getPerformers()
    {
        return $this->performers;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Price $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\EventDetail\Price
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * @param mixed $longDescription
     */
    public function setLongDescription($longDescription)
    {
        $this->longDescription = $longDescription;
    }

    /**
     * @return mixed
     */
    public function getLongDescription()
    {
        return $this->longDescription;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return EventDetail
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $eventDetail = new EventDetail();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($eventDetail, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                call_user_func(array($eventDetail, $method), $value);
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $value = null;
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                case 'media':
                    if (isset($element->file)) {
                        foreach ($element->file as $file) {
                            $eventDetail->addMedia(
                                Media::createFromXML($file)
                            );
                        }
                    }
                    break;
                case 'performers':
                    if (isset($element->performer)) {
                        foreach ($element->performer as $performer) {
                            $eventDetail->addPerformer(
                                Performer::createFromXML($performer)
                            );
                        }
                    }
                    break;
                case 'price':
                    $value = Price::createFromXML($element);
                    break;
                default:
                    $value = (string) $element;
                    break;
            }

            if (!method_exists($eventDetail, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                if ($value != null) {
                    call_user_func(array($eventDetail, $method), $value);
                }
            }
        }

        return $eventDetail;
    }
}

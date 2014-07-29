<?php

namespace TijsVerkoyen\UitDatabank\Entities;

use TijsVerkoyen\UitDatabank\Entities\Event\Activity;
use TijsVerkoyen\UitDatabank\Entities\Event\Address;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar;
use TijsVerkoyen\UitDatabank\Entities\Event\Category;
use TijsVerkoyen\UitDatabank\Entities\Event\ContactInfo;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetail;
use TijsVerkoyen\UitDatabank\Entities\Event\EventDetails;
use TijsVerkoyen\UitDatabank\Entities\Event\Language;
use TijsVerkoyen\UitDatabank\Entities\Event\Location;
use TijsVerkoyen\UitDatabank\Entities\Event\Organiser;
use TijsVerkoyen\UitDatabank\Entities\Event\Calendar\Period;
use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class Event
{
    /**
     * @var \DateTime
     */
    protected $availableFrom;

    /**
     * @var \DateTime
     */
    protected $availableTo;

    /**
     * @var string
     */
    protected $cdbId;

    /**
     * @var string
     */
    protected $createdBy;

    /**
     * @var \DateTime
     */
    protected $creationDate;

    /**
     * @var string
     */
    protected $externalId;

    /**
     * @var bool
     */
    protected $isParent;

    /**
     * @var \DateTime
     */
    protected $lastUpdated;

    /**
     * @var string
     */
    protected $lastUpdatedBy;

    /**
     * @var int
     */
    protected $percentageComplete;

    /**
     * @var bool
     */
    protected $published;

    /**
     * @var string
     */
    protected $owner;

    /**
     * @var bool
     */
    protected $private;

    /**
     * @var string
     */
    protected $validator;

    /**
     * @var string
     */
    protected $wfStatus;

    /**
     * @var array
     */
    protected $activities = array();

    /**
     * @var Calendar
     */
    protected $calendar;

    /**
     * @var array
     */
    protected $categories = array();

    /**
     * @var string
     */
    protected $comments;

    /**
     * @var ContactInfo
     */
    protected $contactInfo;

    /**
     * @var array
     */
    protected $eventDetails = array();

    /**
     * @var string
     */
    protected $keywords;

    /**
     * @var Location
     */
    protected $location;

    /**
     * @var Organiser
     */
    protected $organiser;

    /**
     * @var int
     */
    protected $ageFrom;

    /**
     * @var array
     */
    protected $languages = array();

    /**
     * @var Period
     */
    protected $bookingPeriod;

    /**
     * @param int $ageFrom
     */
    public function setAgeFrom($ageFrom)
    {
        $this->ageFrom = $ageFrom;
    }

    /**
     * @return int
     */
    public function getAgeFrom()
    {
        return $this->ageFrom;
    }

    /**
     * @param Activity $activity
     */
    public function addActivity(Activity $activity)
    {
        $this->activities[] = $activity;
    }

    /**
     * @param array $activities
     */
    public function setActivities($activities)
    {
        $this->activities = $activities;
    }

    /**
     * @return array
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * @param \DateTime $availableTo
     */
    public function setAvailableTo(\DateTime $availableTo)
    {
        $this->availableTo = $availableTo;
    }

    /**
     * @return \DateTime
     */
    public function getAvailableTo()
    {
        return $this->availableTo;
    }

    /**
     * @param \DateTime $availablefrom
     */
    public function setAvailableFrom(\DateTime $availablefrom)
    {
        $this->availableFrom = $availablefrom;
    }

    /**
     * @return \DateTime
     */
    public function getAvailableFrom()
    {
        return $this->availableFrom;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Period $bookingPeriod
     */
    public function setBookingPeriod($bookingPeriod)
    {
        $this->bookingPeriod = $bookingPeriod;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Period
     */
    public function getBookingPeriod()
    {
        return $this->bookingPeriod;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Calendar $calendar
     */
    public function setCalendar(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
    }

    /**
     * @param array $categories
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return array
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param string $cdbid
     */
    public function setCdbId($cdbid)
    {
        $this->cdbId = $cdbid;
    }

    /**
     * @return string
     */
    public function getCdbId()
    {
        return $this->cdbId;
    }

    /**
     * @param string $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\ContactInfo $contactInfo
     */
    public function setContactInfo($contactInfo)
    {
        $this->contactInfo = $contactInfo;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\ContactInfo
     */
    public function getContactInfo()
    {
        return $this->contactInfo;
    }

    /**
     * @param string $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param \DateTime $creationDate
     */
    public function setCreationDate(\DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param EventDetail $eventDetail
     */
    public function addEventDetail(EventDetail $eventDetail)
    {
        $this->eventDetails[] = $eventDetail;
    }

    /**
     * @param array $eventDetails
     */
    public function setEventDetails($eventDetails)
    {
        $this->eventDetails = $eventDetails;
    }

    /**
     * @return array
     */
    public function getEventDetails()
    {
        return $this->eventDetails;
    }

    /**
     * @param string $externalId
     */
    public function setExternalId($externalId)
    {
        $this->externalId = $externalId;
    }

    /**
     * @return string
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param boolean $isParent
     */
    public function setIsParent($isParent)
    {
        $this->isParent = $isParent;
    }

    /**
     * @return boolean
     */
    public function getIsParent()
    {
        return $this->isParent;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param Language $language
     */
    public function addLanguage(Language $language)
    {
        $this->languages[] = $language;
    }

    /**
     * @param array $languages
     */
    public function setLanguages($languages)
    {
        $this->languages = $languages;
    }

    /**
     * @return array
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param \DateTime $lastUpdated
     */
    public function setLastUpdated(\DateTime $lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;
    }

    /**
     * @return \DateTime
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * @param string $lastUpdatedBy
     */
    public function setLastUpdatedBy($lastUpdatedBy)
    {
        $this->lastUpdatedBy = $lastUpdatedBy;
    }

    /**
     * @return string
     */
    public function getLastUpdatedBy()
    {
        return $this->lastUpdatedBy;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Organiser $organiser
     */
    public function setOrganiser($organiser)
    {
        $this->organiser = $organiser;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Organiser
     */
    public function getOrganiser()
    {
        return $this->organiser;
    }

    /**
     * @param string $owner
     */
    public function setOwner($owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param int $percentageComplete
     */
    public function setPercentageComplete($percentageComplete)
    {
        $this->percentageComplete = $percentageComplete;
    }

    /**
     * @return int
     */
    public function getPercentageComplete()
    {
        return $this->percentageComplete;
    }

    /**
     * @param boolean $private
     */
    public function setPrivate($private)
    {
        $this->private = $private;
    }

    /**
     * @return boolean
     */
    public function getPrivate()
    {
        return $this->private;
    }

    /**
     * @param boolean $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

    /**
     * @return boolean
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param string $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    /**
     * @return string
     */
    public function getValidator()
    {
        return $this->validator;
    }

    /**
     * @param string $wfStatus
     */
    public function setWfStatus($wfStatus)
    {
        $this->wfStatus = $wfStatus;
    }

    /**
     * @return string
     */
    public function getWfStatus()
    {
        return $this->wfStatus;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Event
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $event = new Event();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                case 'availablefrom':
                    $method = 'setAvailableFrom';
                    $value = new \DateTime($value);
                    break;
                case 'availableto':
                    $method = 'setAvailableTo';
                    $value = new \DateTime($value);
                    break;
                case 'creationdate':
                    $method = 'setCreationDate';
                    $value = new \DateTime($value);
                    break;
                case 'lastupdated':
                    $method = 'setLastUpdated';
                    $value = new \DateTime($value);
                    break;
                case 'pctcomplete':
                    $method = 'setPercentageComplete';
                    $value = (int) $value;
                    break;
                case 'isparent':
                    $method = 'setIsParent';
                    $value = ((string) $value == 'true');
                    break;
                case 'published':
                case 'private':
                    $value = ((string) $value == 'true');
                    break;
                default:
                    $value = (string) $value;
            }

            if (!method_exists($event, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                call_user_func(array($event, $method), $value);
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $value = null;
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                case 'calendar':
                    $value = Calendar::createFromXML($element);
                    break;
                case 'categories':
                    if (isset($element->category)) {
                        foreach ($element->category as $category) {
                            $event->addCategory(
                                Category::createFromXML($category)
                            );
                        }
                    }
                    break;
                case 'contactinfo':
                    $value = ContactInfo::createFromXML($element);
                    break;
                case 'eventdetails':
                    if (isset($element->eventdetail)) {
                        foreach ($element->eventdetail as $eventDetail) {
                            $event->addEventDetail(
                                EventDetail::createFromXML($eventDetail)
                            );
                        }
                    }
                    break;
                case 'languages':
                    if (isset($element->language)) {
                        foreach ($element->language as $language) {
                            $event->addLanguage(
                                Language::createFromXML($language)
                            );
                        }
                    }
                    break;
                case 'location':
                    $value = Location::createFromXML($element);
                    break;
                case 'organiser':
                    $value = Organiser::createFromXML($element);
                    break;
                case 'agefrom':
                    $value = (int) $value;
                    break;
                case 'bookingperiod':
                    $value = Period::createFromXML($element);
                    break;
                default:
                    $value = (string) $value;
                    break;
            }

            if (!method_exists($event, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($event, $method), $value);
                }
            }
        }

        return $event;
    }
}

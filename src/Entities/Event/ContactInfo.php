<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event;

use TijsVerkoyen\UitDatabank\Entities\Event\Address;
use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class ContactInfo
{
    /**
     * @var Address
     */
    private $address;

    /**
     * @var Mail
     */
    private $mail;

    /**
     * @var Phone
     */
    private $phone;

    /**
     * @var string
     */
    private $url;

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Address $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Mail $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param \TijsVerkoyen\UitDatabank\Entities\Event\Phone $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return \TijsVerkoyen\UitDatabank\Entities\Event\Phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return ContactInfo
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $contactInfo = new ContactInfo();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                default:
                    $value = (string) $value;
            }

            if (!method_exists($contactInfo, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                call_user_func(array($contactInfo, $method), $value);
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                case 'mail':
                    $value = Phone::createFromXML($element);
                    break;
                case 'address':
                    $value = Address::createFromXML($element);
                    break;
                case 'phone':
                    $value = Phone::createFromXML($element);
                    break;
                default:
                    $value = (string) $element;
                    break;
            }

            if (!method_exists($contactInfo, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                call_user_func(array($contactInfo, $method), $value);
            }
        }

        return $contactInfo;
    }
}

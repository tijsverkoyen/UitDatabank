<?php

namespace TijsVerkoyen\UitDatabank\Entities\Event\EventDetail;

use TijsVerkoyen\UitDatabank\Entities\Common;
use TijsVerkoyen\UitDatabank\Exception;
use TijsVerkoyen\UitDatabank\UitDatabank;

class Media
{
    /**
     * @var \DateTime
     */
    protected $creationDate;

    /**
     * @var string
     */
    protected $copyright;

    /**
     * @var string
     */
    protected $fileName;

    /**
     * @var string
     */
    protected $fileType;

    /**
     * @var string
     */
    protected $hLink;

    /**
     * @var bool
     */
    protected $main;

    /**
     * @var string
     */
    protected $mediaType;

    /**
     * @var string
     */
    protected $plainText;

    /**
     * @param string $copyright
     */
    public function setCopyright($copyright)
    {
        $this->copyright = $copyright;
    }

    /**
     * @return string
     */
    public function getCopyright()
    {
        return $this->copyright;
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
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileType
     */
    public function setFileType($fileType)
    {
        $this->fileType = $fileType;
    }

    /**
     * @return string
     */
    public function getFileType()
    {
        return $this->fileType;
    }

    /**
     * @param string $hlink
     */
    public function setHLink($hlink)
    {
        $this->hLink = $hlink;
    }

    /**
     * @return string
     */
    public function getHLink()
    {
        return $this->hLink;
    }

    /**
     * @param boolean $main
     */
    public function setMain($main)
    {
        $this->main = $main;
    }

    /**
     * @return boolean
     */
    public function getMain()
    {
        return $this->main;
    }

    /**
     * @param string $mediatype
     */
    public function setMediaType($mediatype)
    {
        $this->mediaType = $mediatype;
    }

    /**
     * @return string
     */
    public function getMediaType()
    {
        return $this->mediaType;
    }

    /**
     * @param string $plainText
     */
    public function setPlainText($plainText)
    {
        $this->plainText = $plainText;
    }

    /**
     * @return string
     */
    public function getPlainText()
    {
        return $this->plainText;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Media
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $media = new Media();

        // loop attributes
        foreach ($xml->attributes() as $attributeName => $value) {
            $method = 'set' . ucfirst($attributeName);

            switch ($attributeName) {
                case 'creationdate':
                    $value = Common::convertStringToTimestamp((string) $value);
                    break;
                case 'main':
                    $value = Common::convertStringToBoolean((string) $value);
                    break;
                default:
                    $value = (string) $value;
            }

            if (!method_exists($media, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown attribute: ' . $attributeName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($media, $method), $value);
                }
            }
        }

        // loop elements
        foreach ($xml as $element) {
            $elementName = $element->getName();
            $method = 'set' . ucfirst($element->getName());

            switch ($elementName) {
                default:
                    $value = (string) $element;
                    break;
            }

            if (!method_exists($media, $method)) {
                if (UitDatabank::DEBUG) {
                    throw new Exception('Unknown element: ' . $elementName);
                }
            } else {
                if ($value !== null) {
                    call_user_func(array($media, $method), $value);
                }
            }
        }

        return $media;
    }
}

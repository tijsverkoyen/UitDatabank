<?php

namespace TijsVerkoyen\UitDatabank\Search;

use TijsVerkoyen\UitDatabank\Entities\Event;

class Result
{
    /**
     * @var int
     */
    protected $numResults = 0;

    /**
     * @var array
     */
    protected $events;

    /**
     * Add an event
     *
     * @param Event $event
     */
    public function addEvent(Event $event)
    {
        $this->events[] = $event;
    }

    /**
     * @param array $events
     */
    protected function setEvents($events)
    {
        $this->events = $events;
    }

    /**
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param int $numResults
     */
    public function setNumResults($numResults)
    {
        $this->numResults = $numResults;
    }

    /**
     * @return int
     */
    public function getNumResults()
    {
        return $this->numResults;
    }

    /**
     * Convert the raw XML into an object
     *
     * @param \SimpleXMLElement $xml
     * @return Result
     */
    public static function createFromXML(\SimpleXMLElement $xml)
    {
        $result = new Result();

        if (isset($xml->nofrecords)) {
            $result->setNumResults((int) $xml->nofrecords);
        }
        if (isset($xml->event)) {
            foreach($xml->event as $event) {
                $result->addEvent(
                    Event::createFromXML($event)
                );
            }
        }

        return $result;
    }
}

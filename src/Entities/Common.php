<?php

namespace TijsVerkoyen\UitDatabank\Entities;

use TijsVerkoyen\UitDatabank\Exception;

class Common
{
    /**
     * Convert a string into a boolean
     * true, 1, T are considered true
     *
     * @param $string
     * @return bool
     */
    public static function convertStringToBoolean($string)
    {
        return in_array(strtolower($string), array('true', '1', 'T'));
    }

    /**
     * Converts a string in the format d/m/Y H:i:s into a DateTime-object
     * Will return null if date can't be parsed
     *
     * @param $string
     * @return \DateTime|null
     */
    public static function convertStringToTimestamp($string)
    {
        list($date, $time) = explode(' ', $string);

        if (!isset($date) || !isset($time)) {
            return null;
        }

        $dateChunks = explode('/', $date);
        if (count($dateChunks) != 3) {
            return null;
        }

        $dateTime = new \DateTime();
        $dateTime->setDate(
            (int) $dateChunks[2],
            (int) $dateChunks[1],
            (int) $dateChunks[0]
        );

        $timeChunks = explode(':', $time);
        if (count($timeChunks) == 3) {
            $dateTime->setTime(
                (int) $timeChunks[0],
                (int) $timeChunks[1],
                (int) $timeChunks[2]
            );
        }

        return $dateTime;
    }
}

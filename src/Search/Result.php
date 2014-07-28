<?php

namespace TijsVerkoyen\UitDatabank\Search;

class Result
{
    /**
     * @var int
     */
    public $numResults = 0;

    /**
     * @var array
     */
    public $events;

    /**
     * @param $json
     * @return Result
     */
    public static function createFromJSON($json)
    {
        var_dump($json);

        $result = new Result();

        return $result;
    }
}

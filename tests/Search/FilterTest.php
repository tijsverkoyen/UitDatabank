<?php

use TijsVerkoyen\UitDatabank\Search\Filter;

class FilterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Filter
     */
    private $filter;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->filter = new Filter();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->filter = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->filter->setD(42);
        $this->assertEquals(42, $this->filter->getD());

        $this->filter->setDataType('today');
        $this->assertEquals('today', $this->filter->getDataType());

        $this->filter->setFacetField('category');
        $this->assertEquals('category', $this->filter->getFacetField());

        $this->filter->setFq('city:Gent');
        $this->assertEquals('city:Gent', $this->filter->getFq());

        $this->filter->setGroup('event');
        $this->assertEquals('event', $this->filter->getGroup());

        $this->filter->setPast(true);
        $this->assertEquals(true, $this->filter->getPast());

        $this->filter->setPt(51.036906, 3.720739);
        $this->assertEquals(array('lat' => 51.036906, 'lng' => 3.720739), $this->filter->getPt());

        $this->filter->setQ('concert');
        $this->assertEquals('concert', $this->filter->getQ());

        $this->filter->setRows(42);
        $this->assertEquals(42, $this->filter->getRows());

        $this->filter->setSfield('physical_gis');
        $this->assertEquals('physical_gis', $this->filter->getSfield());

        $this->filter->setSort('city+asc');
        $this->assertEquals('city+asc', $this->filter->getSort());

        $this->filter->setStart(42);
        $this->assertEquals(42, $this->filter->getStart());

        $this->filter->setTransform('list');
        $this->assertEquals('list', $this->filter->getTransform());
    }

    /**
     * Test Filter->buildForRequest
     */
    public function testBuildForRequest()
    {
        $this->filter->setQ('*:*');
        $var = $this->filter->buildForRequest();
        $this->assertArrayHasKey('q', $var);
        $this->assertEquals('*:*', $var['q']);
    }
}

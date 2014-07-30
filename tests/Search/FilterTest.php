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

        $this->filter->setDataType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->filter->getDataType());

        $this->filter->setFacetField("this is just a test string");
        $this->assertEquals("this is just a test string", $this->filter->getFacetField());

        $this->filter->setFq("this is just a test string");
        $this->assertEquals("this is just a test string", $this->filter->getFq());

        $this->filter->setGroup("this is just a test string");
        $this->assertEquals("this is just a test string", $this->filter->getGroup());

        $this->filter->setPast(true);
        $this->assertEquals(true, $this->filter->getPast());

//        $this->filter->setPt(/*array*/);
//        $this->assertEquals(/*array*/, $this->filter->getPt());

        $this->filter->setQ("this is just a test string");
        $this->assertEquals("this is just a test string", $this->filter->getQ());

        $this->filter->setRows(42);
        $this->assertEquals(42, $this->filter->getRows());

        $this->filter->setSfield("this is just a test string");
        $this->assertEquals("this is just a test string", $this->filter->getSfield());

        $this->filter->setSort("this is just a test string");
        $this->assertEquals("this is just a test string", $this->filter->getSort());

        $this->filter->setStart(42);
        $this->assertEquals(42, $this->filter->getStart());

        $this->filter->setTransform("this is just a test string");
        $this->assertEquals("this is just a test string", $this->filter->getTransform());
    }

    /**
     * Test Filter->buildForRequest
     */
    public function testBuildForRequest()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->filter->buildForRequest();
//        $this->assertEquals('...', $var);
    }

}

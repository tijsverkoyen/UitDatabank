<?php

use TijsVerkoyen\UitDatabank\Entities\Event\Category;

class CategoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Category
     */
    private $category;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->category = new Category();
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->category = null;
        parent::tearDown();
    }

    /**
     * Test the getters and setters
     */
    public function testGettersAndSetters()
    {
        $this->category->setCatId("this is just a test string");
        $this->assertEquals("this is just a test string", $this->category->getCatId());

        $this->category->setName("this is just a test string");
        $this->assertEquals("this is just a test string", $this->category->getName());

        $this->category->setType("this is just a test string");
        $this->assertEquals("this is just a test string", $this->category->getType());
    }

    /**
     * Test Category::createFromXML
     */
    public function testCreateFromXML()
    {
        $this->markTestIncomplete('No test written yet.');
//        $var = $this->category::createFromXML();
//        $this->assertEquals('...', $var);
    }

}

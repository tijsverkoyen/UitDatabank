<?php

use TijsVerkoyen\UitDatabank\Tests\TestHelper;
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
        $this->category->setCatId('1.7.4.0.0');
        $this->assertEquals('1.7.4.0.0', $this->category->getCatId());

        $this->category->setName('Drama');
        $this->assertEquals('Drama', $this->category->getName());

        $this->category->setType('theme');
        $this->assertEquals('theme', $this->category->getType());
    }

    /**
     * Test Category::createFromXML
     */
    public function testCreateFromXML()
    {
        $testHelper = new TestHelper();
        $data = $testHelper->getEntitiesEventCategoryData();
        $xml = TestHelper::createXMLFromArray($data);

        $var = Category::createFromXML($xml);
        $this->assertInstanceOf('\TijsVerkoyen\UitDatabank\Entities\Event\Category', $var);
        $this->assertEquals($data['category']['@attributes']['catid'], $var->getCatId());
        $this->assertEquals($data['category']['@attributes']['type'], $var->getType());
        $this->assertEquals($data['category']['value'], $var->getName());
    }
}

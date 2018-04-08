<?php

use PHPUnit\Framework\TestCase;
// Extend from the entity

class AccessoryTest extends TestCase
{
	private $CI;
	public function setUp()
	{
	  // Load CI instance normally
      $this->CI = &get_instance();
	  $this->CI->load->model('accessoriesEntity');
	  $this->item = new AccessoriesEntity();
	  $this->item->itemid = 1;
	}
	
	public function testGetPost()
    {
      $_SERVER['REQUEST_METHOD'] = 'GET';
      $_GET['foo'] = 'bar';
      $this->assertEquals('bar', $this->CI->input->get_post('foo'));
    }	
	
	function testSetup()
	{
		$this->assertEquals(1, $this->item->itemid);
	}
	
	function testValidItemId()
	{
		$valid = 0;
		$this->item->itemid = $valid;
		$this->assertEquals($valid,$this->item->itemid);
		
		$valid = 999;
		$this->item->itemid = $valid;
		$this->assertEquals($valid,$this->item->itemid);
	}
	
	function testInvalidItemId()
	{
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->itemid = $invalid;
		
		$invalid = '123';
		$this->expectException('InvalidArgumentException');
		$this->item->itemid = $invalid;
		
		$invalid = -1;
		$this->expectException('InvalidArgumentException');
		$this->item->itemid = $invalid;
		
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->itemid = $invalid;
	}
	
	function testValidCategoryId()
	{
		$valid = 0;
		$this->item->categoryid = $valid;
		$this->assertEquals($valid,$this->item->categoryid);
		
		$valid = 3;
		$this->item->categoryid = $valid;
		$this->assertEquals($valid,$this->item->categoryid);
	}
	
	function testInvalidCategoryId()
	{
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->categoryid = $invalid;
		
		$invalid = '0';
		$this->expectException('InvalidArgumentException');
		$this->item->categoryid = $invalid;
		
		$invalid = -1;
		$this->expectException('InvalidArgumentException');
		$this->item->categoryid = $invalid;
	}
	
	function testValidFileName()
	{
		$containedValue = '.png';
		
		$valid = "test123.png";
		$this->item->filename = $valid;
		$this->assertContains($containedValue,$this->item->filename);
		
		$valid = "door10.png";
		$this->item->filename = $valid;
		$this->assertContains($containedValue,$this->item->filename);
	}
	
	function testInvalidFileName()
	{
		$containedValue = '.png';
		
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->filename= $invalid;
		
		$invalid = 'lamp2.jpg';
		$this->expectException('InvalidArgumentException');
		$this->item->filename= $invalid;
		
		$invalid = "abcdefghijklmnopqrstuvwxyz.png";
		$this->expectException('InvalidArgumentException');
		$this->item->filename= $invalid;
	}
	
	function testValidItemName()
	{
		$valid = "Ikea markus chair";
		$this->item->itemname = $valid;
		$this->assertEquals($valid, $this->item->itemname);
	}
	
	function testInvalidItemName()
	{
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->itemname= $invalid;
		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->itemname= $invalid;
		
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->itemname= $invalid;
	}
	
	function testValidItemLength()
	{
		$valid = 6;
		$this->item->itemlength = $valid;
		$this->assertEquals($valid,$this->item->itemlength);
	}
	
	function testInvalidItemLength()
	{
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->itemlength= $invalid;
		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->itemlength= $invalid;
		
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->itemlength= $invalid;
	}
	
	function testValidItemWidth()
	{
		$valid = 6;
		$this->item->itemwidth = $valid;
		$this->assertEquals($valid,$this->item->itemwidth);
	}
	
	function testInvalidItemWidth()
	{
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->itemwidth= $invalid;
		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->itemwidth= $invalid;
		
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->itemwidth= $invalid;
	}
	
	function testValidItemHeight()
	{
		$valid = 6;
		$this->item->itemheight = $valid;
		$this->assertEquals($valid,$this->item->itemheight);
	}
	
	function testInvalidItemHeight()
	{
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->itemheight= $invalid;
		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->itemheight= $invalid;
		
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->itemheight= $invalid;
	}
	
	function testValidItemWeight()
	{
		$valid = 6;
		$this->item->itemweight = $valid;
		$this->assertEquals($valid,$this->item->itemweight);
	}
	
	function testInvalidItemWeight()
	{
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->itemweight = $invalid;
		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->itemweight = $invalid;
		
		$invalid = -1000;
		$this->expectException('InvalidArgumentException');
		$this->item->itemweight = $invalid;
		
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->itemweight = $invalid;
	}
	
	function testValidItemPrice()
	{		
		$valid = 100;
		$this->item->itemprice = $valid;
		$this->assertEquals($valid,$this->item->itemprice);
	}
	
	function testInvalidItemPrice()
	{
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->itemprice = $invalid;
		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->itemprice = $invalid;
		
		$invalid = -1000;
		$this->expectException('InvalidArgumentException');
		$this->item->itemprice = $invalid;
		
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->itemprice = $invalid;
		
	}
} // end class
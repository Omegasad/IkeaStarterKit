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
	  $this->item = new Accessories();
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
		$valid = 999;
		$this->item->itemid = $valid;
		$this->assertEquals($valid,$this->item->itemid);
	}
	
	function testInvalidItemId()
	{
		$invalid = -1;
		$this->expectException('InvalidArgumentException');
		$this->item->itemid = $invalid;
	}
	
	function testValidCategoryId()
	{
		$valid = 0;
		$this->item->categoryid = $valid;
		$this->assertEquals($valid,$this->item->categoryid);
	}
	
	function testInvalidCategoryId()
	{
		$invalid = -1;
		$this->expectException('InvalidArgumentException');
		$this->item->categoryid = $invalid;
	}
	
	function testValidFileName()
	{
		$valid = "test123.png";
		$this->item->filename = $valid;
		$this->assertEquals($valid,$this->item->filename);
	}
	
	function testInvalidFileName()
	{
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
	}
	
	function testValidItemLength()
	{
		$valid = 6;
		$this->item->itemlength = $valid;
		$this->assertEquals($valid,$this->item->itemlength);
	}
	
	function testValidItemWidth()
	{
		$valid = 6;
		$this->item->itemwidth = $valid;
		$this->assertEquals($valid,$this->item->itemwidth);
	}
	
	function testValidItemHeight()
	{
		$valid = 6;
		$this->item->itemheight = $valid;
		$this->assertEquals($valid,$this->item->itemheight);
	}
	
	function testValidItemWeight()
	{
		$valid = 6;
		$this->item->itemweight = $valid;
		$this->assertEquals($valid,$this->item->itemweight);
	}
	
	function testValidItemPrice()
	{
		$valid = 6;
		$this->item->itemprice = $valid;
		$this->assertEquals($valid,$this->item->itemprice);
	}
} // end class
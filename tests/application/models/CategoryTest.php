<?php

use PHPUnit\Framework\TestCase;
// Extend from the entity

class CategoryTest extends TestCase
{
	private $CI;
	public function setUp()
	{
	  // Load CI instance normally
      $this->CI = &get_instance();
	  $this->CI->load->model('categoriesentity');
	  $this->item = new CategoriesEntity();
	  $this->item->categoryid = 1;
	}
	
	public function testGetPost()
    {
      $_SERVER['REQUEST_METHOD'] = 'GET';
      $_GET['foo'] = 'bar';
      $this->assertEquals('bar', $this->CI->input->get_post('foo'));
    }
	
	public function testValidCategoryId()
	{
		$valid = 300;
		$this->item->categoryid = $valid;
		$this->assertEquals($valid,$this->item->categoryid);
	}
	
	public function testInvalidCategoryId()
	{
		$invalid = -500;
		$this->expectException('InvalidArgumentException');
		$this->item->categoryid= $invalid;
	}
	
	public function testValidCategoryName() 
	{
		$valid = 'Sofas';
		$this->item->categoryname = $valid;
		$this->assertEquals($valid,$this->item->categoryname);
	}
	
	public function testInvalidCategoryName() 
	{
		$invalid = 'Chairs';
		$this->expectException('InvalidArgumentException');
		$this->item->categoryname = $invalid;
	}
	
	public function testValidDirName()
	{
		$valid = 'lamp';
		$this->item->directoryname = $valid;
		$this->assertEquals($valid,$this->item->directoryname);
	}
} // end class
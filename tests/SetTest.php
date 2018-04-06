<?php

use PHPUnit\Framework\TestCase;
// Extend from the entity

class SetTest extends TestCase
{
	private $CI;
	public function setUp()
	{
	  // Load CI instance normally
      $this->CI = &get_instance();
	  $this->CI->load->model('sets');
	  $this->item = new Sets();
	  $this->item->setid = 1;
	}
	
	public function testGetPost()
    {
      $_SERVER['REQUEST_METHOD'] = 'GET';
      $_GET['foo'] = 'bar';
      $this->assertEquals('bar', $this->CI->input->get_post('foo'));
    }
	
	public function testValidSetId()
	{
		$valid = 999;
		$this->item->setid = $valid;
		$this->assertEquals($valid,$this->item->setid);
	}
	
	public function testInvalidSetId()
	{
		$invalid = -1000;
		$this->expectException('InvalidArgumentException');
		$this->item->itemid = $invalid;
	}
	
	public function testValidSetName()
	{
		$valid = 'set_g';
		$this->item->setname = $valid;
		$this->assertEquals($valid,$this->item->setname);
	}
	
	public function testInvalidSetName()
	{
		$invalid = 'set_gg123';
		$this->expectException('InvalidArgumentException');
		$this->item->setname = $invalid;
	}

	public function testValidSofaId()
	{
		$valid = 999;
		$this->item->sofaid = $valid;
		$this->assertEquals($valid,$this->item->sofaid);
	}
	
	public function testInvalidSofaId()
	{
		$invalid = -1000;
		$this->expectException('InvalidArgumentException');
		$this->item->sofaid = $invalid;
	}
	
	public function testValidTableId()
	{
		$valid = 999;
		$this->item->tableid = $valid;
		$this->assertEquals($valid,$this->item->tableid);
	}
	
	public function testInvalidTableId()
	{
		$invalid = -1000;
		$this->expectException('InvalidArgumentException');
		$this->item->tableid = $invalid;
	}
	
	public function testValidLampId()
	{
		$valid = 999;
		$this->item->lampid = $valid;
		$this->assertEquals($valid,$this->item->lampid);
	}
	
	public function testInvalidLampId()
	{
		$invalid = -1000;
		$this->expectException('InvalidArgumentException');
		$this->item->lampid = $invalid;
	}
	
	public function testValidPaintingId()
	{
		$valid = 999;
		$this->item->paintingid = $valid;
		$this->assertEquals($valid,$this->item->paintingid);
	}
	
	public function testInvalidPaintingId()
	{
		$invalid = -1000;
		$this->expectException('InvalidArgumentException');
		$this->item->paintingid = $invalid;
	}
	
} // end class
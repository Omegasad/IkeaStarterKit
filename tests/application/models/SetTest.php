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
	  $this->CI->load->model('setsentity');
	  $this->item = new SetsEntity();
	  $this->item->setid = 1;
	  $this->item->sofaid = 1;
	}
	
	public function testGetPost()
    {
      $_SERVER['REQUEST_METHOD'] = 'GET';
      $_GET['foo'] = 'bar';
      $this->assertEquals('bar', $this->CI->input->get_post('foo'));
    }
	
	public function testValidSetId()
	{
		
		$valid = 0;
		$this->item->setid = $valid;
		$this->assertEquals($valid,$this->item->setid);
		
		$valid = 13;
		$this->item->setid = $valid;
		$this->assertEquals($valid,$this->item->setid);
		
		$valid = 26;
		$this->item->setid = $valid;
		$this->assertEquals($valid,$this->item->setid);
	}
	
	public function testInvalidSetId()
	{
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->setid = $invalid;
		
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->setname = $invalid;
		
		$invalid = -1000;
		$this->expectException('InvalidArgumentException');
		$this->item->setid = $invalid;
		
		$invalid = 30;
		$this->expectException('InvalidArgumentException');
		$this->item->setid = $invalid;
	}
	
	public function testValidSetName()
	{
		$containedValue = 'Set ';
		
		$valid = 'Set G';
		$this->item->setname = $valid;
		$this->assertContains($containedValue,$this->item->setname);
		
		$valid = 'Set 5';
		$this->item->setname = $valid;
		$this->assertContains($containedValue,$this->item->setname);
	}
	
	public function testInvalidSetName()
	{		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->setname = $invalid;
		
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->setname = $invalid;
		
		$invalid = 'abc';
		$this->expectException('InvalidArgumentException');
		$this->item->setname = $invalid;
		
		$invalid = 'Set GG123';
		$this->expectException('InvalidArgumentException');
		$this->item->setname = $invalid;
	}

	public function testValidSofaId()
	{		
		$valid = 0;
		$this->item->sofaid = $valid;
		$this->assertEquals($valid,$this->item->sofaid);
		
		$valid = 13;
		$this->item->sofaid = $valid;
		$this->assertEquals($valid,$this->item->sofaid);
		
		$valid = 26;
		$this->item->sofaid = $valid;
		$this->assertEquals($valid,$this->item->sofaid);
	}
	
	public function testInvalidSofaId()
	{
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->sofaid = $invalid;
		
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->sofaid = $invalid;
		
		$invalid = 9999;
		$this->expectException('InvalidArgumentException');
		$this->item->sofaid = $invalid;
		
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
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->tableid = $invalid;
		
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->tableid = $invalid;
		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->tableid = $invalid;
		
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
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->lampid = $invalid;
		
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->lampid = $invalid;
		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->lampid = $invalid;
		
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
		$invalid = 'a';
		$this->expectException('InvalidArgumentException');
		$this->item->paintingid = $invalid;
		
		$invalid = null;
		$this->expectException('InvalidArgumentException');
		$this->item->paintingid = $invalid;
		
		$invalid = 0;
		$this->expectException('InvalidArgumentException');
		$this->item->paintingid = $invalid;
		
		$invalid = -1000;
		$this->expectException('InvalidArgumentException');
		$this->item->paintingid = $invalid;
	}	
} // end class
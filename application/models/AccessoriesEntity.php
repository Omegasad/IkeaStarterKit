<?php

/**
 * Task entity class, with setter methods for each property.
 */
class AccessoriesEntity extends Entity {
	
	protected $itemid; // -1
	protected $categoryid; // -1
	protected $filename; // empty
	protected $itemname; // empty
	protected $itemlength; // -1
	protected $itemwidth;  // 0
	protected $itemheight; // 0
	protected $itemweight; // 0
	protected $itemprice; // 0 
	
	function setItemId($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value <= -1) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->itemid = $value;
		return $this;
	}

	function setCategoryId($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->categoryid = $value;
		return $this;
	}
	
	function setFileName($value) {		
		if(strlen($value) > 20)
			throw new InvalidArgumentException('Task is more than 20 characters');
		if (empty($value))
			throw new InvalidArgumentException('Task cannot be empty');
		$this->filename = $value;
		return $this;
	}	
	
	function setItemName($value) {		
		if (empty($value))
			throw new InvalidArgumentException('Task cannot be empty');
		$this->itemname = $value;
		return $this;
	}
	
	function setItemLength($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->itemlength = $value;
		return $this;
	}

	function setItemWidth($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->itemwidth = $value;
		return $this;
	}
	
	function setItemHeight($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->itemheight = $value;
		return $this;
	}

	function setItemWeight($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->itemweight = $value;
		return $this;
	}
	
	function setItemOrice($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->itemprice = $value;
		return $this;
	}	
}
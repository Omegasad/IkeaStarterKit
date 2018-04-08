<?php

/**
 * Task entity class, with setter methods for each property.
 */
class AccessoriesEntity extends Entity {
	
	protected $itemid; 
	protected $categoryid;
	protected $filename; 
	protected $itemname; 
	protected $itemlength; 
	protected $itemwidth;  
	protected $itemheight; 
	protected $itemweight;
	protected $itemprice;
	
	function setItemId($value) {
		if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->itemid = $value;
		return $this;
	}

	function setCategoryId($value) {
		if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->categoryid = $value;
		return $this;
	}
	
	function setFileName($value) {	
		$containedWord = '.png';
		
		if (is_null($value))
			throw new InvalidArgumentException('value cannot be null');
		else if (strlen($value) > 20)
			throw new InvalidArgumentException('File name is more than 20 characters');
		else if (strpos($value, $containedWord) === FALSE) 
			throw new InvalidArgumentException('Word does not have the contained value: .png');
		else if (empty($value))
			throw new InvalidArgumentException('Task cannot be empty');
		$this->filename = $value;
		return $this;
	}	
	
	function setItemName($value) {		
		if (is_null($value))
			throw new InvalidArgumentException('value cannot be null');
		else if (empty($value))
			throw new InvalidArgumentException('Task cannot be empty');
		$this->itemname = $value;
		return $this;
	}
	
	function setItemLength($value) {
		
		if (is_null($value))
			throw new InvalidArgumentException('value cannot be null');
		else if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if ($value <= 0) 
			throw new InvalidArgumentException('Item length must be greater than 0');
		$this->itemlength = $value;
		return $this;
	}

	function setItemWidth($value) {
		
		if (is_null($value))
			throw new InvalidArgumentException('value cannot be null');
		else if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if ($value <= 0) 
			throw new InvalidArgumentException('Item width must be greater than 0');
		
		$this->itemwidth = $value;
		return $this;
	}
	
	function setItemHeight($value) {
		if (is_null($value))
			throw new InvalidArgumentException('value cannot be null');
		else if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if ($value <= 0) 
			throw new InvalidArgumentException('Item height must be greater than 0');
		
		$this->itemheight = $value;
		return $this;
	}

	function setItemWeight($value) {
		if (is_null($value))
			throw new InvalidArgumentException('value cannot be null');
		else if ($value == 0)
			throw new InvalidArgumentException('weight cannot be weightless');
		else if ($value < 0) 
			throw new InvalidArgumentException('Weight cannot be negative');
		else if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		
		$this->itemweight = $value;
		return $this;
	}
	
	function setItemPrice($value) {
		if (is_null($value))
			throw new InvalidArgumentException('value cannot be null');
		else if ($value == 0)
			throw new InvalidArgumentException('Item cannot be free');
		else if ($value < 0) 
			throw new InvalidArgumentException('You cannot pay your customer the item they bought');
		else if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		
		$this->itemprice = $value;
		return $this;
	}	
}
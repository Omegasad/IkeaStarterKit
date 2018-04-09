<?php

/**
 * Task entity class, with setter methods for each property.
 */
class SetsEntity extends Entity {
	
	protected $setid;
	protected $setname;
	protected $sofaid;
	protected $tableid;
	protected $lampid;
	protected $paintingid;
	
	function setSetId($value) {
		if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		else if ($value > 26)
			throw new InvalidArgumentException('Value must be lower than 26');
		$this->setid = $value;
		return $this;
	}
	
	function setSetName($value) {
		$containedWord = 'Set';
		
		if (empty($value))
			throw new InvalidArgumentException('Set name cannot be empty');
		else if (strpos($value, $containedWord) === FALSE) 
			throw new InvalidArgumentException('Word does not have the contained value: Set');
		else if(strlen($value) > 5)
			throw new InvalidArgumentException('Please enter a set name that contains the word set with 5 characters long');
		
		$this->setname = $value;
	}
	
	function setSofaId($value) {
		
		if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		else if ($value > 26)
			throw new InvalidArgumentException('Value must be lower than 26');
		
		$this->sofaid = $value;
		return $this;
	}
	
	function setTableId($value) {
		
		if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if (empty($value))
			throw new InvalidArgumentException('TableID must contain a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->tableid = $value;
		return $this;
	}
	
	function setLampId($value) {
		if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if (empty($value))
			throw new InvalidArgumentException('LampID must contain a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->lampid = $value;
		return $this;
	}
	
	function setPaintingId($value) {
		if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if (empty($value))
			throw new InvalidArgumentException('PaintingID must contain a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->paintingid = $value;
		return $this;
	}
}
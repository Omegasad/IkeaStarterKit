<?php

/**
 * Task entity class, with setter methods for each property.
 */
class Setsentity extends Entity {
	
	protected $setid;
	protected $setname;
	protected $sofaid;
	protected $tableid;
	protected $lampid;
	protected $paintingid;
	
	function setSetId($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->setid = $value;
		return $this;
	}
	
	function setSetName($value) {
		if(strlen($value) > 6)
			throw new InvalidArgumentException('Task is more than 20 characters');
		if (empty($value))
			throw new InvalidArgumentException('Task cannot be empty');
		$this->setname = $value;
		return $this;
	}
	
	function setSofaId($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->sofaid = $value;
		return $this;
	}
	
	function setTableId($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->tableid = $value;
		return $this;
	}
	
	function setLampId($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->lampid = $value;
		return $this;
	}
	
	function setPaintingId($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must be greater than 0');
		$this->paintingid = $value;
		return $this;
	}
}
<?php

/**
 * Task entity class, with setter methods for each property.
 */
class Categoriesentity extends Entity {
	
	protected $categoryid;
	protected $categoryname;
	protected $directoryname;
	
	function setCategoryId($value) {
		if (empty($value))
			throw new InvalidArgumentException('An Id must have a value');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must 0 or higher');
		$this->categoryid = $value;
		return $this;		
	}
	
	function setCategoryName($value) {
		$allowed = ['Sofas','Coffee Tables','Floor Lamps','Wall Paintings'];
		if (!in_array($value, $allowed))
			throw new InvalidArgumentException('Invalid group selection');
		$this->categoryname = $value;
		return $this;
	}
	
	function setDirName($value) {
		$allowed = ['sofa','table','lamp','painting'];
		if (!in_array($value, $allowed))
			throw new InvalidArgumentException('Invalid group selection');
		$this->directoryname = $value;
		return $this;
	}
}
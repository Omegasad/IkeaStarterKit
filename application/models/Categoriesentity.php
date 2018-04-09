<?php

/**
 * Task entity class, with setter methods for each property.
 */
class CategoriesEntity extends Entity {
	
	protected $categoryid;
	protected $categoryname;
	protected $directoryname;
	
	// Category ID starts from 0
	function setCategoryId($value) {
		if (!is_numeric($value))
			throw new InvalidArgumentException('Value must be in numbers');
		else if ($value < 0) 
			throw new InvalidArgumentException('Value must 0 or higher');
		else if ($value > 3)
			throw new InvalidArgumentException('Value must be lower than 3'); 
		$this->categoryid = $value;
		return $this;		
	}
	
	function setCategoryName($value) {
		$allowed = ['Sofas','Coffee Tables','Floor Lamps','Wall Paintings'];
		if (!in_array($value, $allowed))
			throw new InvalidArgumentException('Select between Sofas, Coffee Tables. Floor Lamps and Wall paintings');
		$this->categoryname = $value;
		return $this;
	}
	
	function setDirectoryName($value) {
		$allowed = ['sofa','table','lamp','painting'];
		if (!in_array($value, $allowed))
			throw new InvalidArgumentException('Select between sofa, table, lamp and painting');
		$this->directoryname = $value;
		return $this;
	}
}
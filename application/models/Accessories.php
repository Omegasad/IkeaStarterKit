<?php

/**
 * Accessories.
 */
class Accessories extends CSV_Model
{
    private $CI; // use this to reference the CI instance
    // Constructor
    public function __construct()
    {
        parent::__construct('../data/accessory.csv', 'itemid');
        $this->CI = &get_instance(); // retrieve the CI instance
        // Add derrived attributes to model
        $everything = parent::all();
        for ($i = 0; $i < sizeof($everything); ++$i)
        {
            $everything[$i]->filepath = '/assets/img/'
                . $this->CI->categories->get($everything[$i]->categoryid)->dirname
                . '/' . $everything[$i]->filename;

            $everything[$i]->itemvolume = $everything[$i]->itemlength
                * $everything[$i]->itemwidth
                * $everything[$i]->itemheight;

            $everything[$i]->itemcategory = $this->CI->categories->get($everything[$i]->categoryid)->categoryname;
        }
    }

    /**
     * Get accessory item by name.
     */
    public function getByName($name)
    {
        $everything = parent::all();
        for ($i = 0; $i < sizeof($everything); ++$i)
        {
            if ($everything[$i]->filename == $name)
            {
                return $everything[$i];
            }
        }
        return null;
    }
    
    public function getCategoryMembers($cat)
    {
        $list = array();
        $everything = parent::all();
        for ($i = 0; $i < sizeof($everything); ++$i)
        {
            if ($everything[$i]->categoryid == $cat)
            {
                $list[] = $everything[$i];
            }
        }
        return $list; 
    }
	
}
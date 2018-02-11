<?php

/**
 * Accessories.
 */
class Accessories extends CSV_Model
{
    // Constructor
    public function __construct()
    {
        parent::__construct('../data/accessory.csv', 'itemid');

        // Add derrived attributes to model
        $everything = parent::all();
        for ($i = 0; $i < sizeof($everything); ++$i)
        {
            $everything[$i]->filepath = '/assets/img/'
                . $this->categories->get($everything[$i]->categoryid)->dirname
                . '/' . $everything[$i]->filename;

            $everything[$i]->itemvolume = $everything[$i]->itemlength
                * $everything[$i]->itemwidth
                * $everything[$i]->itemheight;

            $everything[$i]->itemcategory = $this->categories->get($everything[$i]->categoryid)->categoryname;
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
	
}
<?php

/**
 * Sets of accessories.
 */
class Sets extends CSV_Model
{
    // Constructor
    public function __construct()
    {
        parent::__construct('../data/set.csv', 'setid');
    }

    /**
     * Get set by name.
     */
    public function getByName($name)
    {
        $everything = parent::all();
        for ($i = 0; $i < sizeof($everything); ++$i)
        {
            if ($everything[$i]->setname == $name)
            {
                return $everything[$i];
            }
        }
        return null;
    }
    
}
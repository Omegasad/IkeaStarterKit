<?php

/**
 * Category of accessories.
 */
class Categories extends CSV_Model
{
    // Constructor
    public function __construct()
    {
        parent::__construct('../data/category.csv', 'categoryid');
    }

    /**
     * Get record by name, or return null.
     */
    public function getByName($name)
    {
        $everything = $this->all();
        for ($i = 0; $i < sizeof($everything); ++$i)
        {
            if ($everything[$i]->dirname == $name)
            {
                return $everything[$i];
            }
        }
        return null;
    }
}
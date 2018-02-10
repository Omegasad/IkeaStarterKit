<?php

/**
 * Category of accessories.
 */
class Categories extends CSV_Model
{
    // Constructor
    public function __construct()
    {
        parent::__construct('../data/categories.csv', 'categoryid');
    }
}
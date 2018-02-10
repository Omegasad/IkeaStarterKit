<?php

class Testcategories extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->model('categories');

        echo "<br><br>first();<br>";
        print_r($this->categories->first());

        echo "<br><br>get(1);<br>";
        print_r($this->categories->get(1));

        echo "<br><br>all;<br>";
        print_r($this->categories->all());
    }
}
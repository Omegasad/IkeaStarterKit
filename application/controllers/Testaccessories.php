<?php

class Testaccessories extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // $this->load->model('accessories');

        echo "<br><br>first();<br>";
        print_r($this->accessories->first());

        echo "<br><br>getByName('sofa1.png');<br>";
        print_r($this->accessories->getByName("sofa1.png"));

        echo "<br><br>getByName('sofa1.png')->itemname;<br>";
        print_r($this->accessories->getByName("sofa1.png")->itemname);

        echo "<br><br>get(1);<br>";
        print_r($this->accessories->get(1));

        echo "<br><br>all();<br>";
        print_r($this->accessories->all());
    }
}
<?php

class Testsets extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "<br><br>first();<br>";
        print_r($this->sets->first());

        echo "<br><br>getByName('Set A');<br>";
        print_r($this->sets->getByName("Set A"));

        echo "<br><br>getByName('Set A')->sofaid;<br>";
        print_r($this->sets->getByName("Set A")->sofaid);

        echo "<br><br>get(1);<br>";
        print_r($this->sets->get(1));

        echo "<br><br>all();<br>";
        print_r($this->sets->all());
    }
}
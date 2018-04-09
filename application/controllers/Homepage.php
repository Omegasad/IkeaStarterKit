<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends Application
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/
     * 	- or -
     * 		http://example.com/welcome/index
     *
     * So any other public methods not prefixed with an underscore will
     * map to /welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->has_permissions_or_exit(ROLE_GUEST);

        $id = $this->input->post('selectset');
        $this->data['pagebody'] = 'arranged';
        $this->data['chooseset'] = $this->sets->all();
        $this->data['bgfile'] = '/assets/img/background.png';

        if($id == null) {
            $setmetadata = $this->sets->get(0); 
        } else {
            $setmetadata = $this->sets->get($id);
        }
        $this->data = array_merge($this->data, (array) $setmetadata);
            $this->data['setdata'] = array(        
            $this->accessories->get($setmetadata->sofaid),
            $this->accessories->get($setmetadata->tableid),
            $this->accessories->get($setmetadata->lampid),
            $this->accessories->get($setmetadata->paintingid)
        );
        
        for ($i = 0; $i < 4; $i++) {
            $key = 'category' . $i;
            $this->data[$key] = $this->categories->get($i)->categoryname;
        }

        $this->data['sofafile'] 
                = $this->accessories->get($setmetadata->sofaid)
                ->filepath;
        $this->data['tablefile'] 
                = $this->accessories->get($setmetadata->tableid)
                ->filepath;

        $this->data['lampfile'] 
                = $this->accessories->get($setmetadata->lampid)
                ->filepath;

        $this->data['paintingfile'] 
                = $this->accessories->get($setmetadata->paintingid)
                ->filepath;                

        $this->data['totalvolume'] = 0.0;
        $this->data['totalweight'] = 0.0;
        $this->data['totalcost'] = 0.0;
        
        foreach ($this->data['setdata'] as $accessoryitem)
        {
            $this->data['totalvolume'] += $accessoryitem->itemvolume;
            $this->data['totalweight'] += $accessoryitem->itemweight;
            $this->data['totalcost'] += $accessoryitem->itemprice;
        }
        
        $this->data['selectedid'] = $id;
        
        for ($i = 0; $i < sizeof($this->data['chooseset']); ++$i)
        {
            $this->data['chooseset'][$i]->default =
                ($this->data['chooseset'][$i]->setid == $id)
                    ? "selected"
                    : "";
        }
                
        $this->render();
    }

}
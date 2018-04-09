<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Create
 *
 * @author E
 */
class Create extends Application {
    
    public function index()
    {
            $this->has_permissions_or_exit(ROLE_USER);

            $this->data['pagebody'] = 'create';
            $this->data['chooseset'] = $this->sets->all();
            $this->data['bgfile'] = '/assets/img/background.png';
            $this->data['datasets'] = $this->accessories->all();
            
            for ($i = 0; $i < 4; $i++) {
                $key = 'category' . $i;
                $this->data[$key] = $this->categories->get($i)->categoryname;
            }
            //Get all accessories from each category
            $this->data['sofas'] = $this->accessories->getCategoryMembers(0);
            $this->data['tables'] = $this->accessories->getCategoryMembers(1);
            $this->data['lamps'] = $this->accessories->getCategoryMembers(2);
            $this->data['paintings'] = $this->accessories->getCategoryMembers(3);
            
            $this->data['paintingvisible'] = 'hidden';
            $this->data['tablevisible'] = 'hidden';
            $this->data['lampvisible'] = 'hidden';
            $this->data['sofavisible'] = 'hidden';

        $this->render();
    }
    
    //stores the new set to the database
    public function createset()
    {
        $this->has_permissions_or_exit(ROLE_USER);

        $this->data['pagebody'] = 'setcreated';
        $data = $this->input->post();
        if($data){
            $set = $this->sets->create();
            $set->setid = $this->sets->highest() + 1;
            $set->setname = $data['submitname'];
            $set->sofaid = ($data['submitsofa'] != '{outputsofa}' ? $data['submitsofa'] : '');
            $set->tableid = ($data['submittable'] != '{outputtable}' ? $data['submittable'] : '');
            $set->lampid = ($data['submitlamp'] != '{outputlamp}' ? $data['submitlamp'] : '');
            $set->paintingid = ($data['submitpainting']!= '{outputpainting}' ? $data['submitpainting'] : '');
            $this->sets->add($set);  
        }
        $this->render();
    }
    
    //applies the user's applied additions, then reloads page
    public function selection()
    {
        $this->has_permissions_or_exit(ROLE_USER);

        $this->data['pagebody'] = 'create';
        $data = $this->input->post();
                
        $this->data['chooseset'] = $this->sets->all();
        $this->data['bgfile'] = '/assets/img/background.png';
        $this->data['datasets'] = $this->accessories->all();
        
        for ($i = 0; $i < 4; $i++) {
                $key = 'category' . $i;
                $this->data[$key] = $this->categories->get($i)->categoryname;
            }

        $this->data['sofas'] = $this->accessories->getCategoryMembers(0);
        $this->data['tables'] = $this->accessories->getCategoryMembers(1);
        $this->data['lamps'] = $this->accessories->getCategoryMembers(2);
        $this->data['paintings'] = $this->accessories->getCategoryMembers(3);
        
        //check when user has added something in the set
        //if so, that item is displayed in the view
        if($data) {
            if($data['selectsofa'] != null) {
                $this->data['outputsofa'] = $data['selectsofa'];
                $this->data['sofafile'] = $this->accessories->get($data['selectsofa'])
                    ->filepath;
                $this->data['sofavisible'] = '';
                
                for ($i = 0; $i < sizeof($this->data['sofas']); ++$i)
                {
                    $this->data['sofas'][$i]->default =
                        ($this->data['sofas'][$i]->itemid == $data['selectsofa'])
                            ? "selected"
                            : "";
                }
            } else {
                $this->data['sofavisible'] = 'hidden';
            }
            
            if($data['selecttable'] != null) {
                $this->data['outputtable'] = $data['selecttable'];
                $this->data['tablefile'] = $this->accessories->get($data['selecttable'])
                    ->filepath;
                $this->data['tablevisible'] = '';
                
                //save selection
                for ($i = 0; $i < sizeof($this->data['tables']); ++$i)
                {
                    $this->data['tables'][$i]->default =
                        ($this->data['tables'][$i]->itemid == $data['selecttable'])
                            ? "selected"
                            : "";
                }                
            } else {
                $this->data['tablevisible'] = 'hidden';
            }
            
            if($data['selectlamp'] != null) {
                $this->data['outputlamp'] = $data['selectlamp'];
                $this->data['lampfile'] = $this->accessories->get($data['selectlamp'])
                    ->filepath;
                $this->data['lampvisible'] = '';
                
                //save selection
                for ($i = 0; $i < sizeof($this->data['lamps']); ++$i)
                {
                    $this->data['lamps'][$i]->default =
                        ($this->data['lamps'][$i]->itemid == $data['selectlamp'])
                            ? "selected"
                            : "";
                }                
            } else {
                $this->data['lampvisible'] = 'hidden';
            }
            
            if($data['selectpainting'] != null) {
                $this->data['outputpainting'] = $data['selectpainting'];
                $this->data['paintingfile'] = $this->accessories->get($data['selectpainting'])
                    ->filepath;
                $this->data['paintingvisible'] = '';
                
                //save selection
                for ($i = 0; $i < sizeof($this->data['paintings']); ++$i)
                {
                    $this->data['paintings'][$i]->default =
                        ($this->data['paintings'][$i]->itemid == $data['selectpainting'])
                            ? "selected"
                            : "";
                }                
            } else {
                $this->data['paintingvisible'] = 'hidden';
            }
        }

        $this->render();
    }

}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modifyaccessory extends Application
{
    private $isUpdated = false;
    private $selecteditem;
    
    public function index()
    {
        $this->has_permissions_or_exit(ROLE_ADMIN);
        
        $catid = ($this->selecteditem) 
                ? $this->selecteditem->categoryid
                : $this->input->post('selectcategory');
        
        $accid = ($this->selecteditem)
                ? $this->selecteditem->itemid
                : $this->input->post('selectaccessory');
        
        $this->data['pagebody'] = 'modifyaccessory';
        $this->data['bgfile'] = '/assets/img/background.png';
        $this->data['choosecategory'] = $this->categories->all();
        
        if($catid == null) {
            $selectedcategory = $this->categories->get(0);
            $selectedaccessory = $this->accessories->getCategoryMembers(0);
        } else {
            $selectedcategory = $this->categories->get($catid);
            $selectedaccessory = $this->accessories->getCategoryMembers($catid);
            $tempid = $this->accessories->get($selectedaccessory[0]->itemid)->itemid;
        }
        $this->data['chooseaccessory'] = $selectedaccessory;
        $this->data = array_merge($this->data, (array) $selectedcategory);
        
        if($accid == null) {
            $accessorymetadata = $this->accessories->get($selectedaccessory[0]->itemid); 
        } else {
            if ($accid == $tempid)
                $accessorymetadata = $this->accessories->get($tempid);
            else
                $accessorymetadata = $this->accessories->get($accid);
        }
        $this->data = array_merge($this->data, (array) $accessorymetadata);
        
        $this->data['itemfilepath'] 
            = $this->accessories->get($accessorymetadata->itemid)->filepath;

        for ($i = 0; $i < sizeof($this->data['choosecategory']); ++$i)
        {
            $this->data['choosecategory'][$i]->default =
                ($this->data['choosecategory'][$i]->categoryid == $catid)
                    ? "selected"
                    : "";
        }
        
        for ($i = 0; $i < sizeof($this->data['chooseaccessory']); ++$i)
        {
            $this->data['chooseaccessory'][$i]->default =
                ($this->data['chooseaccessory'][$i]->itemid == $accid)
                    ? "selected"
                    : "";
        }
        
        $this->data['updatestatus'] =
            ($this->isUpdated) ? $accessorymetadata->itemname . " has been updated!" : "";
        $this->isUpdated = false;
       
        $this->render();
    }
    
    public function modify()
    {
        $this->has_permissions_or_exit(ROLE_ADMIN);
        
        $data = $this->input->post();
        if($data){
            // Get data for selected accessory
            $this->selecteditem = $this->accessories->get($data['itemid']);
            
            // Update accessory data
            $item = $this->accessories->create();
            $item->itemid = $this->selecteditem->itemid;
            $item->categoryid = $this->selecteditem->categoryid;
            $item->filename = $this->selecteditem->filename;            
            $item->itemname = $data['submitname'];
            $item->itemlength = $data['submitlength'];
            $item->itemwidth = $data['submitwidth'];
            $item->itemheight = $data['submitheight'];
            $item->itemweight = $data['submitweight'];
            $item->itemprice = $data['submitprice'];
            
            // Trigger update
            $this->accessories->update($item);
            $this->isUpdated = true;
        }
        $this->index();
    }
}
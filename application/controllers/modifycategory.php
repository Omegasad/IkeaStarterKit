<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Modifycategory extends Application
{
    private $isUpdated = false;
    private $selectedcategory;
    
    public function index()
    {
        $this->has_permissions_or_exit(ROLE_USER);
        
        $id = ($this->selectedcategory) 
                ? $this->selectedcategory->categoryid
                : $this->input->post('selectcategory');
        $this->data['pagebody'] = 'modifycategory';
        $this->data['choosecategory'] = $this->categories->all();
        if($id == null) {
            $selectedcategory = $this->categories->get(0); 
        } else {
            $selectedcategory = $this->categories->get($id);
        }
        $this->data = array_merge($this->data, (array) $selectedcategory);
        
        for ($i = 0; $i < sizeof($this->data['choosecategory']); ++$i)
        {
            $this->data['choosecategory'][$i]->default =
                ($this->data['choosecategory'][$i]->categoryid == $id)
                    ? "selected"
                    : "";
        }
        
        $this->data['updatestatus'] =
            ($this->isUpdated) ? "Category name has been updated!" : "";
        $this->isUpdated = false;
       
        $this->render();
    }
    
    public function modify()
    {
        $this->has_permissions_or_exit(ROLE_USER);
        
        $data = $this->input->post();
        if($data){
            // Get data for selected category
            $this->selectedcategory = $this->categories->get($data['submitid']); 
            
            // Update category data
            $category = $this->categories->create();
            $category->categoryid = $this->selectedcategory->categoryid;
            $category->categoryname = $data['submitname'];
            $category->dirname = $this->selectedcategory->dirname;
            
            // Trigger update
            $this->categories->update($category);
            $this->isUpdated = true;
        }
        $this->index();
    }
}
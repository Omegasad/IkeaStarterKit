<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Allows admin user to change category name
 */
class Modifycategory extends Application
{
    private $isUpdated = false;
    private $updateFailed = false;
    private $selectedcategory;
    
    /**
     * Index page for this controller
     */
    public function index()
    {
        $this->has_permissions_or_exit(ROLE_ADMIN);
        
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
        
        if ($this->updateFailed) {
            $this->data['updatestatus'] = "Update failed! Invalid data.";
        } else {
            $this->data['updatestatus'] =
                ($this->isUpdated) ? "Category name has been updated!" : "";
            $this->isUpdated = false;
        }
       
        $this->render();
    }
    
    /**
     * Modify accessory item
     */
    public function modify()
    {
        $this->has_permissions_or_exit(ROLE_ADMIN);
        
        $data = $this->input->post();
        if($data){
            // Get data for selected category
            $this->selectedcategory = $this->categories->get($data['submitid']); 
            
            // Update category data
            $category = $this->categories->create();
            $category->categoryid = $this->selectedcategory->categoryid;
            $category->categoryname = $data['submitname'];
            $category->dirname = $this->selectedcategory->dirname;
            
            // Validate data
            if ($this->nameIsValid($category->categoryname)) {
                // Trigger update
                $this->categories->update($category);
                $this->isUpdated = true;
            } else {
                $this->updateFailed = true;
            }
        }
        $this->index();
    }
    
    /**
     * Function to validate item name
     * @param type $name
     * @return boolean
     */
    private function nameIsValid($name)
    {
        if (is_null($name))
            return false;
        else if (empty($name))
            return false;
        return true;
    }
}
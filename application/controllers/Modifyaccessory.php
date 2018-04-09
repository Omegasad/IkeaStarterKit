<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Allows admin user to customize accessory name and attributes
 */
class Modifyaccessory extends Application
{
    private $isUpdated = false;
    private $updateFailed = false;
    private $selecteditem;
    
    /**
     * Index page for this controller
     */
    public function index()
    {
        $this->has_permissions_or_exit(ROLE_ADMIN);
        
        // Get form selection status from the view
        $catid = ($this->selecteditem) 
                ? $this->selecteditem->categoryid
                : $this->input->post('selectcategory');
        
        $catIsChanged = filter_var($this->input->post('catIsChanged'), FILTER_VALIDATE_BOOLEAN);
        
        $accid = ($this->selecteditem)
                ? $this->selecteditem->itemid
                : $this->input->post('selectaccessory');
        
        $this->data['pagebody'] = 'modifyaccessory';
        $this->data['bgfile'] = '/assets/img/background.png';
        $this->data['choosecategory'] = $this->categories->all();
        
        // Get category and accessory collection data depending on selection
        if($catid == null) {
            $selectedcategory = $this->categories->get(0);
            $selectedaccessory = $this->accessories->getCategoryMembers(0);
        } else {
            $selectedcategory = $this->categories->get($catid);
            $selectedaccessory = $this->accessories->getCategoryMembers($catid);
            // Reset accessory to first item in category when category has changed
            if ($catIsChanged)
                $accid = $this->accessories->get($selectedaccessory[0]->itemid)->itemid;
        }
        $this->data['chooseaccessory'] = $selectedaccessory;
        $this->data = array_merge($this->data, (array) $selectedcategory);
        
        // Get accessory item metadata depending on selection
        if($accid == null) {
            $accessorymetadata = $this->accessories->get($selectedaccessory[0]->itemid); 
        } else {
            $accessorymetadata = $this->accessories->get($accid);
        }
        $this->data = array_merge($this->data, (array) $accessorymetadata);
        
        $this->data['itemfilepath']
            = $this->accessories->get($accessorymetadata->itemid)->filepath;

        // Mark the selected form fields;
        // prevents selection does not reset when calling controller
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
        
        if ($this->updateFailed) {
            $this->data['updatestatus'] = "Update failed! Invalid data.";
        } else {
            $this->data['updatestatus'] =
                ($this->isUpdated) ? $accessorymetadata->itemname . " has been updated!" : "";
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
            
            
            // Validate data
            if ($this->nameIsValid($item->itemname)
                    && $this->lengthIsValid($item->itemlength)
                    && $this->widthIsValid($item->itemwidth)
                    && $this->heightIsValid($item->itemheight)
                    && $this->weightIsValid($item->itemweight)
                    && $this->priceIsValid($item->itemprice)) {

                // Trigger update
                $this->accessories->update($item);
                $this->accessories->update2($item);
                $this->isUpdated = true;
                
                // Update derived data
                $item->filepath = $this->selecteditem->filepath;
                $item->itemvolume = $item->itemlength 
                                    * $item->itemwidth 
                                    * $item->itemheight;
                $item->itemcategory = $this->selecteditem->itemcategory;
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
    
    /**
     * Function to validate item length
     * @param type $length
     * @return boolean
     */
    private function lengthIsValid($length)
    {
        if (is_null($length))
            return false;
        else if (!is_numeric($length))
            return false;
        else if ($length < 0) 
             return false;
        return true;
    }
    
    /**
     * Function to validate item width
     * @param type $width
     * @return boolean
     */
    private function widthIsValid($width)
    {
        if (is_null($width))
            return false;
        else if (!is_numeric($width))
            return false;
        else if ($width < 0) 
            return false;
        return true;
    }
    
    /**
     * Function to validate item height
     * @param type $height
     * @return boolean
     */
    private function heightIsValid($height)
    {
        if (is_null($height))
            return false;
        else if (!is_numeric($height))
            return false;
        else if ($height < 0) 
            return false;
        return true;
    }
    
    /**
     * Function to validate item weight
     * @param type $weight
     * @return boolean
     */
    private function weightIsValid($weight)
    {
        if (is_null($weight))
            return false;
        else if (!is_numeric($weight))
            return false;
        else if ($weight < 0) 
            return false;
        return true;
    }
    
    /**
     * Function to validate item price
     * @param type $price
     * @return boolean
     */
    private function priceIsValid($price)
    {
        if (is_null($price))
            return false;
        else if (!is_numeric($price))
            return false;
        else if ($price < 0) 
            return false;
        return true;
    }
}
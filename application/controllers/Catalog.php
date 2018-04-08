<?php

/**
 * Catalog controller.
 */
class Catalog extends Application
{
	/**
	 * Index page for controller.
	 */
	public function index()
	{
	    $role = $this->session->userdata('userrole');

	    if ($role == NULL)
	    	redirect("./roles/actor/Guest");

	    $this->data['userrole'] = $role;
		$this->data['pagebody'] = 'catalog';
		$this->data['datasets'] = $this->accessories->all();
                
            for ($i = 0; $i < 4; $i++) {
                $key = 'category' . $i;
                $this->data[$key] = $this->categories->get($i)->categoryname;
            }
                
            $this->data['sofas'] = $this->accessories->getCategoryMembers(0);
            $this->data['tables'] = $this->accessories->getCategoryMembers(1);
            $this->data['lamps'] = $this->accessories->getCategoryMembers(2);
            $this->data['paintings'] = $this->accessories->getCategoryMembers(3);
                
		$this->render();
	}
        
        public function edititem() {
            
            
        }
}
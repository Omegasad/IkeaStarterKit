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
		$this->render();
	}
        
        public function edititem() {
            
            
        }
}
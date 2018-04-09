<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * @author		JLP
 * @copyright           2010-2016, James L. Parry
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller
{

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */
	function __construct()
	{
		parent::__construct();

		//  Set basic view parameters
		$this->data = array ();
		$this->data['pagetitle'] = 'Ikea Starter Kit';
		$this->data['ci_version'] = (ENVIRONMENT === 'development') ? 'CodeIgniter Version <strong>'.CI_VERSION.'</strong>' : '';

		$this->roles_permission = array(
			ROLE_GUEST => array(ROLE_GUEST),
			ROLE_USER  => array(ROLE_GUEST, ROLE_USER),
			ROLE_ADMIN => array(ROLE_GUEST, ROLE_USER, ROLE_ADMIN)
		);

        if ($this->session->userdata('userrole') == NULL)
		$this->session->set_userdata('userrole', ROLE_GUEST);

        $this->data['userrole'] = $this->session->userdata('userrole');
	}

    public function set_role($role)
    {
        $this->session->set_userdata('userrole', $role);
    }

    public function get_role()
    {
        return $this->session->userdata('userrole');
    }

	public function has_permissions_or_exit($role)
	{
		if (!$this->has_permissions_of($role))
			redirect('/');
			// exit("Insufficient permissions.");
	}

    public function has_permissions_of($role)
    {
        return in_array($role, $this->roles_permission[$this->get_role()]);
	}

	/**
	 * Render this page
	 */
	function render($template = 'template')
	{
		$this->data['usermenu'] = ($this->has_permissions_of(ROLE_USER))
			? $this->parser->parse('usermenu', $this->data, true)
			: "";
		
		$this->data['adminmenu'] = ($this->has_permissions_of(ROLE_ADMIN))
			? $this->parser->parse('adminmenu', $this->data, true)
			: "";

		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);

		$this->parser->parse('template', $this->data);
	}

}

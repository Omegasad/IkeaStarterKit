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
		$this->data['pagebody'] = 'homepage';
		$this->data['datasets'] = $this->sets->all();
		$this->render();
	}

	/**
	 * View a specific set.
	 */
	public function selectset($setid)
	{
		$this->data['pagebody'] = 'viewset';

		// set meta data
		$setmetadata = $this->sets->get($setid);
		$this->data = array_merge($this->data, (array) $setmetadata);

		// get accessory item data per category
		$this->data['setdata'] = array(
			$this->accessories->get($setmetadata->sofaid),
			$this->accessories->get($setmetadata->tableid),
			$this->accessories->get($setmetadata->lampid),
			$this->accessories->get($setmetadata->paintingid)
			);

		// calculate overall attributes
		$this->data['totalvolume'] = 0.0;
		$this->data['totalweight'] = 0.0;
		$this->data['totalcost'] = 0.0;
		foreach ($this->data['setdata'] as $accessoryitem)
		{
			$this->data['totalvolume'] += $accessoryitem->itemvolume;
			$this->data['totalweight'] += $accessoryitem->itemweight;
			$this->data['totalcost'] += $accessoryitem->itemprice;
		}

		// render view
		$this->render();
	}
}

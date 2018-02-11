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
		$this->data['pagebody'] = 'catalog';
		$this->data['datasets'] = $this->accessories->all();
		$this->render();
	}
}
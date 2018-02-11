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

/**
    itemid: {itemid}<br />z
    itemname: {itemname}<br />
    categoryid: {categoryid}<br />
    itemcategory: {itemcategory}<br />
    itemlength: {itemlength}<br />
    itemwidth: {itemwidth}<br />
    itemheight: {itemheight}<br />
    itemweight: {itemweight}<br />
    itemprice: {itemprice}<br />
    itemvolume: {itemvolume}<br />
    filename: {filename}<br />
    filepath: {filepath}<br /><br /><br />
*/
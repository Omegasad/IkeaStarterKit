<?php

class Catalog extends Application
{
	public function index()
	{
		$this->data['pagebody'] = 'catalog';
		$this->data['datasets'] = $this->sets->all();
		$this->render();
	}

public function selectset($setid)
	{
		$setmetadata = $this->sets->get($setid);
		$this->data = array_merge($this->data, (array) $setmetadata);

		$this->data['pagebody'] = 'viewset';
		$this->data['setdata'] = array(
			$this->accessories->get($setmetadata->sofaid),
			$this->accessories->get($setmetadata->tableid),
			$this->accessories->get($setmetadata->lampid),
			$this->accessories->get($setmetadata->paintingid)
			);

		$this->data['totalvolume'] = 0.0;
		$this->data['totalweight'] = 0.0;
		$this->data['totalcost'] = 0.0;
		foreach ($this->data['setdata'] as $accessoryitem)
		{
			$this->data['totalvolume'] += $accessoryitem->itemvolume;
			$this->data['totalweight'] += $accessoryitem->itemweight;
			$this->data['totalcost'] += $accessoryitem->itemprice;
		}

		$this->render();
	}	
}
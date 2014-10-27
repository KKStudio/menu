<?php namespace Kkstudio\Menu;

class Menu extends \App\Module {

	protected $menu;
	protected $repo;
	protected $data = [];

	public function __construct() 
	{
		$this->repo = new Repositories\MenuRepository;
		$this->menu = $this->repo->all();
		$this->data = $this->intoArray($this->menu);
	}

	public function get() 
	{
		return $this->menu;		
	}

	public function __call($func, $args) 
	{
		if(isset($this->data[$func])) {
			return $this->data[$func]
		}

		return null;
	}

	private function intoArray($data) {

		$table = [];

		foreach($data as $item) {

			$table[$item->slug] = $item;

		}

		return $table;

	}

}
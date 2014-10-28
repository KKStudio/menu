<?php namespace Kkstudio\Menu;

class Menu extends \App\Module {

	protected $menu;
	protected $repo;
	protected $data = [];

	public function __construct() 
	{
		$this->repo = new Repositories\MenuRepository;
		$this->menu = $this->prepareUrl($this->repo->all());
		$this->data = $this->intoArray($this->menu);
	}

	public function get() 
	{
		return $this->menu;		
	}

	private function intoArray($data) 
	{

		$table = [];

		foreach($data as $item) {

			$table[$item->id] = $item;

		}

		return $table;

	}

	private function prepareUrl($menu)
	{
		foreach($menu as $key => $item) {

			$url = $item->route;
			$params = json_decode($item->params, true);

			foreach($params as $param => $value) {

				$url = str_replace('{$'. $param . '}', $value, $url);

			}

			$menu[$key]->url = $url;

		}

		return $menu;
	}

}
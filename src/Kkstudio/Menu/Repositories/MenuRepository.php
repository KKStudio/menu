<?php namespace Kkstudio\Menu\Repositories;

use Kkstudio\Menu\Models\Menu as Model;

class MenuRepository {

	public function all() 
	{
		return Model::where('enabled', 1)->orderBy('position', 'asc')->get();
	}

	public function get($id) 
	{
		return Model::findOrFail($id);
	}

	public function max() {

		$position = 0;

		$max = Model::orderBy('position', 'desc')->first();
		if($max) $position = $max->position;

		return $position;

	}	

	public function create($display_name, $route, $params, $slug, $position) 
	{
		return Model::create([

			'display_name' => $display_name,
			'route' => $route,
			'params' => $params,
			'slug' => $slug,
			'position' => $position,
			'enabled' => 1

		]);
	}

}
<?php namespace Kkstudio\Menu\Repositories;

use Kkstudio\Menu\Models\Menu as Model;

class MenuRepository {

	public function all() 
	{
		return Model::where('enabled', 1)->orderBy('lp', 'asc')->get();
	}

	public function max() {

		$lp = 0;

		$max = Model::orderBy('lp', 'desc')->first();
		if($max) $lp = $max->lp;

		return $lp;

	}	

	public function create($route, $params, $slug, $lp) 
	{
		return Model::create([

			'route' => $route,
			'params' => $params,
			'slug' => $slug,
			'lp' => $lp,
			'enabled' => 1

		]);
	}

}
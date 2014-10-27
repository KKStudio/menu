<?php namespace Kkstudio\Menu\Controllers;

use Illuminate\Routing\Controller;
use Kkstudio\Menu\Models\Menu;
use Kkstudio\Menu\Repositories\MenuRepository;

class MenuController extends Controller {
	
	public function admin(MenuRepository $repo)
	{		
		$menu = $repo->all();

		return \View::make('menu::admin')->with('menu', $repo);
	}

	public function postAdd(MenuRepository $repo) 
	{

		$enabled = 1;

		$display_name = \Request::get('display_name');

		$slug = \Request::get('slug');
		$route = \Request::get('route');
		$params = \Request::get('params');

		$lp = $repo->max() + 1;
		$this->repo->create($route, $params, $slug, $lp);

		\Flash::success('Menu item has been created.');

		return \Redirect::back();

	}

}
<?php namespace Kkstudio\Menu\Controllers;

use Illuminate\Routing\Controller;
use Kkstudio\Menu\Models\Menu;
use Kkstudio\Menu\Repositories\MenuRepository;

class MenuController extends Controller {
	
	public function admin(MenuRepository $repo)
	{		
		$menu = $repo->all();

		return \View::make('menu::admin')->with('menu', $menu);
	}

	public function postAdd(MenuRepository $repo) 
	{

		$enabled = 1;

		$display_name = \Request::get('display_name');

		$slug = \Request::get('slug');
		$route = \Request::get('route');
		$params = \Request::get('params');

		$lp = $repo->max() + 1;
		$repo->create($display_name, $route, $params, $slug, $lp);

		\Flash::success('Menu item has been created.');

		return \Redirect::to('admin/menu');

	}

	public function edit($id, MenuRepository $menu) 
	{
		$item = $menu->get($id);

		return \View::make('menu::edit')->with('menu', $item);
	}

	public function postEdit($id, MenuRepository $menu) 
	{
		$item = $menu->get($id);

		if(! \Request::get('display_name')) {

			\Flash::error('Please provide a name.');

			return \Redirect::back()->withInput();

		}

		if(! \Request::get('route')) {

			\Flash::error('Please provide a route.');

			return \Redirect::back()->withInput();

		}

		$display_name = \Request::get('display_name');
		$route = \Request::get('route');
		$params = \Request::get('params');

		$item->display_name = $display_name;
		$item->route = $route;
		$item->params = $params;	

		$item->save();	

		\Flash::success('Menu item edited successfully.');

		return \Redirect::back();

	}

	public function delete($id, MenuRepository $menu) 
	{
		$item = $menu->get($id);

		return \View::make('menu::delete')->with('menu', $item);
	}

	public function postDelete($id, MenuRepository $menu) 
	{
		$item = $menu->get($id);
		$item->delete();

		\Flash::success('Menu item deleted.');

		return \Redirect::to('admin/menu/');
	}

	public function swap(MenuRepository $menu) {

		$id1 = \Request::get('id1');
		$id2 = \Request::get('id2');

		$first = $menu->get($id1);
		$second = $menu->get($id2);

		$first->moveAfter($second);

		\Flash::success('Sorted.');

		return \Redirect::back();

	}

}
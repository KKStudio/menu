<?php namespace Kkstudio\Menu\Controllers;

use Illuminate\Routing\Controller;
use Kkstudio\Menu\Models\Menu;
use Kkstudio\Menu\Repositories\MenuRepository;

class MenuController extends Controller {

	protected $repo;

	public function __construct(MenuRepository $repo)
	{
		$this->repo = $repo;
	}
	
	public function admin()
	{		
		$menu = $this->repo->all();

		return \View::make('menu::admin')->with('menu', $menu);
	}

	public function postAdd() 
	{

		$enabled = 1;

		$display_name = \Request::get('display_name');

		$slug = \Request::get('slug');
		$route = \Request::get('route');
		$params = \Request::get('params');

		$lp = $this->repo->max() + 1;
		$this->repo->create($display_name, $route, $params, $slug, $lp);

		\Flash::success('Wpis w menu został utworzony.');

		return \Redirect::to('admin/menu');

	}

	public function edit($id) 
	{
		$item = $menu->get($id);

		return \View::make('menu::edit')->with('menu', $item);
	}

	public function postEdit($id) 
	{
		$item = $this->repo->get($id);

		if(! \Request::get('display_name')) {

			\Flash::error('Musisz podać nazwę.');

			return \Redirect::back()->withInput();

		}

		if(! \Request::get('route')) {

			\Flash::error('Musisz podać ścieżkę');

			return \Redirect::back()->withInput();

		}

		$display_name = \Request::get('display_name');
		$route = \Request::get('route');
		$params = \Request::get('params');

		$item->display_name = $display_name;
		$item->route = $route;
		$item->params = $params;	

		$item->save();	

		\Flash::success('Wpis z menu edytowany pomyślnie.');

		return \Redirect::back();

	}

	public function delete($id) 
	{
		$item = $this->repo->get($id);

		return \View::make('menu::delete')->with('menu', $item);
	}

	public function postDelete($id) 
	{
		$item = $this->repo->get($id);
		$item->delete();

		\Flash::success('Wpis z menu usunięty.');

		return \Redirect::to('admin/menu/');
	}

	public function swap() {

		$id1 = \Request::get('id1');
		$id2 = \Request::get('id2');

		$first = $this->repo->get($id1);
		$second = $this->repo->get($id2);

		$first->moveAfter($second);

		\Flash::success('Posortowano.');

		return \Redirect::back();

	}

}
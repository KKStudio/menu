<?php namespace Kkstudio\Menu;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('kkstudio/menu');

		\Route::group([ 'prefix' => 'admin', 'middleware' => 'admin'], function() {

			\Route::get('menu', '\Kkstudio\Menu\Controllers\MenuController@admin');
			\Route::post('menu/create', '\Kkstudio\Menu\Controllers\MenuController@postAdd');

			\Route::get('menu/{id}/edit', '\Kkstudio\Menu\Controllers\MenuController@edit');
			\Route::post('menu/{id}/edit', '\Kkstudio\Menu\Controllers\MenuController@postEdit');

			\Route::get('menu/{id}/delete', '\Kkstudio\Menu\Controllers\MenuController@delete');
			\Route::post('menu/{id}/delete', '\Kkstudio\Menu\Controllers\MenuController@postDelete');
			
			\Route::post('menu/swap', '\Kkstudio\Menu\Controllers\MenuController@swap');

		});
		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}

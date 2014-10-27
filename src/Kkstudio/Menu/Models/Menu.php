<?php namespace Kkstudio\Menu\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Menu extends Eloquent {

	protected $table = 'kkstudio_menu_menu';

	protected $guarded = [ 'id' ];

}
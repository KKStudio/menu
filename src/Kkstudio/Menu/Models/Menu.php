<?php namespace Kkstudio\Menu\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use App\Http\Traits\Sortable as SortableTrait;

class Menu extends Eloquent {

	use SortableTrait;
	
	protected $table = 'kkstudio_menu_menu';

	protected $guarded = [ 'id' ];

}
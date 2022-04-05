<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesByFilmCategory
 * 
 * @property int $category
 * @property int $total_sales
 *
 * @package App\Models
 */
class SalesByFilmCategory extends Model
{
	protected $table = 'sales_by_film_category';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'category' => 'int',
		'total_sales' => 'int'
	];

	protected $fillable = [
		'category',
		'total_sales'
	];
}

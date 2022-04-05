<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesByStore
 * 
 * @property int $store
 * @property int $manager
 * @property int $total_sales
 *
 * @package App\Models
 */
class SalesByStore extends Model
{
	protected $table = 'sales_by_store';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'store' => 'int',
		'manager' => 'int',
		'total_sales' => 'int'
	];

	protected $fillable = [
		'store',
		'manager',
		'total_sales'
	];
}

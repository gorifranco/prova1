<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerList
 * 
 * @property int $ID
 * @property int $name
 * @property int $address
 * @property int $zip code
 * @property int $phone
 * @property int $city
 * @property int $country
 * @property int $notes
 * @property int $SID
 *
 * @package App\Models
 */
class CustomerList extends Model
{
	protected $table = 'customer_list';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'ID' => 'int',
		'name' => 'int',
		'address' => 'int',
		'zip code' => 'int',
		'phone' => 'int',
		'city' => 'int',
		'country' => 'int',
		'notes' => 'int',
		'SID' => 'int'
	];

	protected $fillable = [
		'ID',
		'name',
		'address',
		'zip code',
		'phone',
		'city',
		'country',
		'notes',
		'SID'
	];
}

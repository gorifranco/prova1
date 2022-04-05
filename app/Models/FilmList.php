<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class FilmList
 * 
 * @property int $FID
 * @property int $title
 * @property int $description
 * @property int $category
 * @property int $price
 * @property int $length
 * @property int $rating
 * @property int $actors
 *
 * @package App\Models
 */
class FilmList extends Model
{
	protected $table = 'film_list';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'FID' => 'int',
		'title' => 'int',
		'description' => 'int',
		'category' => 'int',
		'price' => 'int',
		'length' => 'int',
		'rating' => 'int',
		'actors' => 'int'
	];

	protected $fillable = [
		'FID',
		'title',
		'description',
		'category',
		'price',
		'length',
		'rating',
		'actors'
	];
}

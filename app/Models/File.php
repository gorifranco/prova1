<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class File extends Model
{
    use HasFactory;
    protected $primaryKey = 'film_id';
    protected $fillable = [
        'name',
        'file_path'
    ];
}
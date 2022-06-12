<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Door extends Model
{
	use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var string[]
	 */
	protected $fillable = [
		'user_id',
		'name',
		'is_locked',
		'password',
	];

	public static function getDoorById($id)
	{
		return self::where('id', $id)
			->first();
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_id', 'id');
	}
}

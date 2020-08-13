<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'name',
    ];

	public function passwords()
	{
		return $this->belongsToMany('App\Password', 'environment_passwords');
	}
}

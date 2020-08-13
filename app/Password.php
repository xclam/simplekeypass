<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class Password extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'login', 'password', 'create_by', 'create_at', 'update_by', 'update_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
	
	public function environments()
    {
        return $this->belongsToMany('App\Environment', 'environment_passwords');
    }
	
	public function authorized_password()
	{
		return $this->where('create_by', Auth::id())->get();
	}
	
	public function owner()
	{
		return $this->belongsTo('App\User', 'create_by', 'id');
	}
	
	public function is_owner()
	{
		return $this->create_by == Auth::id();
	}
	
	public function shared()
	{
		return $this->belongsToMany('App\User', 'shared_with');
	}
	
	public function uncrypt_password()
	{
		return decrypt($this->password);
	}
	
	public function scopeAuthorizedPassword(\Illuminate\Database\Eloquent\Builder $query, User $user)
	{
		// DB::enableQueryLog();
		// $p = $query->whereHas('shared', function ($q) use ($user) {
							// $q->where('id', $user->id);
						// })->get();
		// dd($p);				
		return $query->where('create_by',$user->id)->orWhereHas('shared', function ($q) use ($user) {
							$q->where('id', $user->id);
						})->get();
	}
}

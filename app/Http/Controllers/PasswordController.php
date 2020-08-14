<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
// use Illuminate\Support\Facades\DB;
use App\Password;

class PasswordController extends Controller
{

    public function index(Request $request)
	{
		$user_id = Auth::id();
		$pass = new Password();
		$passwords = $pass->where('create_by',$user_id)
							->orWhereHas('shared', function ($q) use ($user_id) {
								$q->where('id', $user_id);
							})->get();
		
		$view = $request->query('v', 'card');
		return view('password.index', ['passwords' => $passwords, 'view' => $view]);
	}
	
	public function add(Request $request)
	{
		$password = Password::create([
			"name" => $request->input('name'),
			"login" => $request->input('login'), 
			"password" => Crypt::encryptString($request->input('password')),
			"notes" => $request->input('note'), 
			"url" => $request->input('url'), 
			"create_by" => Auth::id(),
		]);
		
        return redirect()->route('passwords')->withSuccess(__('Password created'));
	}
	
	public function view(Password $password)
	{
		$users = \App\User::all();
		$users = $users->diff(\App\User::whereIn('id', [Auth::id()])->get());
		return view('password.view', ['password' => $password, 'users' => $users]);
	}
	
	public function save(Request $request, Password $password)
	{
		if($password->create_by != Auth::id())
			return redirect()->route('password.view', ['password' => $password])->withError(__('You don\'t have the right to update this password'));
		
		$password->name = $request->input('name');
		$password->login = $request->input('login');
		$password->password = Crypt::encryptString($request->input('password'));
		$password->save();
		
		$password->shared()->sync($request->input('users'));
		
		return redirect()->route('password.view', ['password' => $password])->withSuccess(__('Password updated'));
		// return view('password.view', ['password' => $password]);
	}
	
	public function delete(Password $password)
	{
		$password->delete();
		$password->environments()->delete();
		$password->shared()->delete();
		return redirect()->route('passwords');
	}
}

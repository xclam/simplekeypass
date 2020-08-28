<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function index()
	{
		return view('user.index', ['users' => User::all()]);
	}
	
	public function create()
	{
		return view('user.create');
	}
	
	public function store(Request $request)
	{
		$user = User::create([
			"name" => $request->input('name'),
			"code" => $request->input('code'),
			"email" => $request->input('email'),
			"password" => Hash::make($request->input('password')),
		]);
		return redirect()->route('user.show', ["user" => $user]);
	}
	
	public function show(User $user)
	{
		return view('user.show', ["user" => $user]);
	}
	
	public function update(Request $request, User $user)
	{
		$user->name = $request->input('name');
		$user->code = $request->input('code');
		$user->email = $request->input('email');
		
		if( $request->has('password') )
			$user->password = Hash::make($request->input('password'));
		
		$user->save();
		
		return redirect()->route('user.show', ["user" => $user]);
	}
}

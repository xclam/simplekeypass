<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
		
		return redirect()->route('user.show', [$user]);
	}
	
	public function show(User $user)
	{
		return view('user.show', [$user]);
	}
}

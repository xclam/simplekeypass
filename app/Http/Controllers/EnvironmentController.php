<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Environment;
use App\Password;

class EnvironmentController extends Controller
{
     public function index()
	{
		$env = new Environment();
		return view('environment.index', ['environments' => $env->all()]);
	}
	
	public function add()
	{
		$env = new Environment();
		$pass = new Password();
		$user = Auth::user();
		return view('environment.view', ['environment' => $env, 'form_action' => '/environment/save', 'passwords' => $pass->authorizedPassword($user),]);
	}
	
	public function view(Environment $environment)
	{
		$pass = new Password();
		$user = Auth::user();

		return view('environment.view', [
			'environment' => $environment, 
			'form_action' => '/environment/'.$environment->id.'/save', 
			'passwords' => $pass->authorizedPassword($user),
		]);
	}
	
	public function save(Request $request, Environment $environment = null)
	{
		if(!is_null($environment)){
			$environment->update($request->only(['name', 'type']));
			$environment->passwords()->sync($request->input('passwords'));
			$success = 'environment.updated';
		}else{
			$environment = Environment::create($request->only(['name', 'type']));
			$environment->passwords()->sync($request->input('passwords'));
			$success = 'environment.created';
		}
        return redirect()->route('environment.view', ['environment' => $environment])
			->withSuccess(__($success));
	}
	
	public function delete(Environment $environment)
	{
		$environment->passwords()->delete();
		$environment->delete();
		return redirect()->route('environment.list');
	}
}

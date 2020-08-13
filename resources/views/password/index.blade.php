@extends('layouts.app')

@section('content')
<div class="container">

	<ul class="nav nav-pills justify-content-end">
		<li class="nav-item ml-2">
			<a class="nav-link border {{ ($view == 'list') ? 'active':''}}" href="{{ route('passwords', ['v'=>'list']) }}">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
				</svg>
				 List
			</a>
		<li>
		<li class="nav-item ml-2">
			<a class="nav-link border {{ ($view == 'card') ? 'active':''}}" href="{{ route('passwords', ['v'=>'card']) }}">
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-heading" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
					<path fill-rule="evenodd" d="M3 8.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
					<path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-1z"/>
				</svg>
				 Grid
			</a>
		</li>
	</ul>
	
	<div class="passlist row mt-2">
		@switch($view)
			@case('list')
				@include('password.list-view')
				@break
			@case('card')
				@include('password.card-view')
				@break
		@endswitch
			
		

		
	</div>
	
	<div class="password-add row mt-2">
		<div class="col-12">
			<div class="card">
				<div class="card-header">Ajouter un mot de passe</div>
				<div class="card-body">
					<form class="inline-form" method="post" action="/password/add">
						@csrf
						<label for="new-name">Name</label>
						<input type="text" id="new-name" name="name" class=""/>
						
						<label for="new-login">Login</label>
						<input type="text" id="new-login" name="login" class=""/>
						
						<label for="new-pass">Password</label>
						<input type="text" id="new-pass" name="password" class="" />
						
						<button class="btn btn-primary">Ajouter</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
	<div class="header-body"><h1>{{__('Users')}}</h1></div>
	
	<nav class="navbar">
		<a href="/user" class="btn btn-primary">Ajouter</a>
	</nav>
	
	<table class="table table-sm table-hover table-light">
	
		<thead><tr><th>Nom</th><th>Nom</th><th>Email</th><th>Droits</th></tr></thead>
	
		<?php foreach($users as $user): ?>
		
			<tr class="clickable" data-href="/user/{{$user->id}}">
				<td>{{$user->name}}</td>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->name}}</td>
			</tr>
		
		<?php endforeach; ?>
		
	</table>
	
</div>
@endsection
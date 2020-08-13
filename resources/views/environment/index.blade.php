@extends('layouts.app')

@section('content')
<div class="container">

	<nav class="navbar">
		<a href="/environment/add" class="btn btn-primary">Ajouter</a>
	</nav>
	
	<table class="table table-sm table-hover table-light">
	
		<thead><tr><th>Nom</th><th>Type</th></tr></thead>
	
		<?php foreach($environments as $env): ?>
		
			<tr class="clickable" data-href="/environment/{{$env->id}}"><td>{{$env->name}}</td><td>{{$env->type}}</td></tr>
		
		<?php endforeach; ?>
		
	</table>
	
</div>
@endsection
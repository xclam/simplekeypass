@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
	<div class="header-body"><h1>{{__('Add environment')}}</h1></div>
	
	<form class="inline-form" action="{{route('environment.save')}}" method="post">
		@csrf
		
		<div class="form-row">
		
			<div class="form-group col">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" class="form-control" />
			</div>
			
			<div class="form-group col">
				<label for="type">Type</label>
				<select id="type" name="type" class="form-control">
					<option value="app">Application</option>
					<option value="bdd">Base de données</option>
					<option value="srv">Serveur</option>
					<option value="pc">Computer</option>
					<option value="others">Autres</option>
				</select>
			</div>
			
		</div>
		
		<div class="form-row">
			<h3>Mots de passes associés</h3>
			<table class="table table-sm">
			<?php foreach($passwords as $pass): ?>
				<tr>
					<td>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="passwords[]" id="pass-{{$pass->id}}" value="{{$pass->id}}"/>
							<label for="pass-{{$pass->id}}" class="custom-control-label">{{$pass->name}}</label>
						</div>
					</td>
					<td><code>{{$pass->login}}</code></td>
					<td><code>{{Illuminate\Support\Facades\Crypt::decryptString($pass->password)}}</code></td>
				</tr>
			<?php endforeach; ?>
			</table>
		
		</div>
		<button class="btn btn-primary">Enregistrer</button>
	</form>

</div>
@endsection
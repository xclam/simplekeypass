@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
	<div class="header-body"><h1>{{__('Modify environment')}}</h1></div>
	
	<form action="{{route('environment.save', $environment)}}" method="post">
		@csrf
		@method('PATCH')
		
		<div class="form-row">
		
			<div class="form-group col">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" class="form-control" value="{{$environment->name}}"/>
			</div>
			
			<div class="form-group col">
				<label for="type">Type</label>
				<select id="type" name="type" class="form-control">
					<option value="app" <?= ($environment->type == "app") ? "selected":"" ?>>Application</option>
					<option value="bdd" <?= ($environment->type == "bdd") ? "selected":"" ?>>Base de données</option>
					<option value="srv" <?= ($environment->type == "srv") ? "selected":"" ?>>Serveur</option>
					<option value="pc" <?= ($environment->type == "pc") ? "selected":"" ?>>Computer</option>
					<option value="others" <?= ($environment->type == "others") ? "selected":"" ?>>Autres</option>
				</select>
			</div>
			
		</div>
		
		<div>
			<h3>Mots de passes associés</h3>
			<table class="table table-sm">
			<?php foreach($passwords as $pass): ?>
				<tr class="<?= $environment->passwords->contains($pass->id) ? "table-light":"table-dark" ?>">
					<td>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="passwords[]" id="pass-{{$pass->id}}" value="{{$pass->id}}" <?= $environment->passwords->contains($pass->id) ? "checked":"" ?>/>
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
	
	<p>
		<form class="inline-form" action="/environment/{{$environment->id}}" method="post">
			@csrf
			@method('DELETE')
			<button class="btn btn-danger btn-delete">Supprimer</button>
		</form>
	</p>
</div>
@endsection
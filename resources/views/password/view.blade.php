@extends('layouts.app')

@section('content')
<div class="container">
    
	Owner : {{$password->owner->gaia}} - {{$password->owner->name}}
	<form class="inline-form" method="post" action="/password/{{$password->id}}/save">
		@csrf
		@method('PATCH')
		
		<label for="name">Name :</label>
		<input type="text" id="name" name="name" class="" value="{{$password->name}}" <?= (!$password->is_owner()) ? "disabled":"" ?> />
		
		<label for="login">Login :</label>
		<input type="text" id="login" name="login" class="" value="{{$password->login}}" <?= (!$password->is_owner()) ? "disabled":"" ?>/>
		
		<label for="password">Password :</label>
		<input type="text" id="password" name="password" class="" value="{{Illuminate\Support\Facades\Crypt::decryptString($password->password)}}" <?= (!$password->is_owner()) ? "disabled":"" ?>/>

		<?php if($password->is_owner()): ?>
		<div>
			<h3>Partager avec :</h3>
			<label id="share-with-all">Tout cocher</label> / <label id="share-with-nobody">Tout décocher</label>
			<table class="table table-sm" id="share-with">
			<?php foreach($users as $user): ?>
				<tr class="<?= $password->shared->contains($user->id) ? "table-light":"table-dark" ?>">
					<td>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="users[]" id="user-{{$user->id}}" value="{{$user->id}}" <?= $password->shared->contains($user->id) ? "checked":"" ?>/>
							<label for="user-{{$user->id}}" class="custom-control-label">{{$user->gaia}} {{$user->name}}</label>
						</div>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
				
		<button class="btn btn-primary">Enregistrer</button>
		<?php endif; ?>
	</form>
	
	<p>
	<form class="inline-form" action="/password/{{$password->id}}" method="post">
		@csrf
		@method('DELETE')
		<button class="btn btn-danger btn-delete">Supprimer</button>
	</form>
	</p>
	
</div>
@endsection


		
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    
	<div class="header-body"><h1>{{__('Modify password')}}</h1></div>
	
	<form class="form" method="post" action="{{route('password.save', $password->id)}}">
		@csrf
		@method('PATCH')
		
		<div class="form-row">
			<div class="form-group col">
				<b>Owner</b> 
				<span class="ml-1">{{$password->owner->code}} - {{$password->owner->name}}</span>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" class="form-control" value="{{$password->name}}" <?= (!$password->is_owner()) ? "disabled":"" ?> />
			</div>
			
			<div class="form-group col">
				<label for="login">Login</label>
				<input type="text" id="login" name="login" class="form-control" value="{{$password->login}}" <?= (!$password->is_owner()) ? "disabled":"" ?>/>
			</div>
			
			<div class="form-group col">
				<label for="password">Password</label>
				<input type="text" id="password" name="password" class="form-control" value="{{Illuminate\Support\Facades\Crypt::decryptString($password->password)}}" <?= (!$password->is_owner()) ? "disabled":"" ?>/>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="notes">{{__('Notes')}}</label>
				<input type="text" id="notes" name="notes" class="form-control" value="{{$password->notes}}" <?= (!$password->is_owner()) ? "disabled":"" ?> />
			</div>
			
			<div class="form-group col">
				<label for="url">{{__('URL')}}</label>
				<input type="text" id="url" name="url" class="form-control" value="{{$password->url}}" <?= (!$password->is_owner()) ? "disabled":"" ?>/>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="tags">{{__('Tags')}}</label>
				<input type="text" id="tags" name="tags" class="form-control" value="{{$password->tags}}" <?= (!$password->is_owner()) ? "disabled":"" ?> />
			</div>
		</div>
		
		<?php if($password->is_owner()): ?>
		<div class="mt-3">
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


		
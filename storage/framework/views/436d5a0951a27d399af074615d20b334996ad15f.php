<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
	<div class="header-body"><h1><?php echo e(__('Modify password')); ?></h1></div>
	
	<form class="form" method="post" action="<?php echo e(route('password.save', $password->id)); ?>">
		<?php echo csrf_field(); ?>
		<?php echo method_field('PATCH'); ?>
		
		<div class="form-row">
			<div class="form-group col">
				<b>Owner</b> 
				<span class="ml-1"><?php echo e($password->owner->code); ?> - <?php echo e($password->owner->name); ?></span>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="name">Name</label>
				<input type="text" id="name" name="name" class="form-control" value="<?php echo e($password->name); ?>" <?= (!$password->is_owner()) ? "disabled":"" ?> />
			</div>
			
			<div class="form-group col">
				<label for="login">Login</label>
				<input type="text" id="login" name="login" class="form-control" value="<?php echo e($password->login); ?>" <?= (!$password->is_owner()) ? "disabled":"" ?>/>
			</div>
			
			<div class="form-group col">
				<label for="password">Password</label>
				<input type="text" id="password" name="password" class="form-control" value="<?php echo e(Illuminate\Support\Facades\Crypt::decryptString($password->password)); ?>" <?= (!$password->is_owner()) ? "disabled":"" ?>/>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="notes"><?php echo e(__('Notes')); ?></label>
				<input type="text" id="notes" name="notes" class="form-control" value="<?php echo e($password->notes); ?>" <?= (!$password->is_owner()) ? "disabled":"" ?> />
			</div>
			
			<div class="form-group col">
				<label for="url"><?php echo e(__('URL')); ?></label>
				<input type="text" id="url" name="url" class="form-control" value="<?php echo e($password->url); ?>" <?= (!$password->is_owner()) ? "disabled":"" ?>/>
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="tags"><?php echo e(__('Tags')); ?></label>
				<input type="text" id="tags" name="tags" class="form-control" value="<?php echo e($password->tags); ?>" <?= (!$password->is_owner()) ? "disabled":"" ?> />
			</div>
		</div>
		
		<?php if($password->is_owner()): ?>
		<div class="mt-3">
			<h3><?php echo e(__('Share with')); ?> :</h3>
			
			<div class="row">
			
				<div class="col-6">
					<h5><?php echo e(__('Users')); ?></h5>
					<label id="share-with-all">Tout cocher</label> / <label id="share-with-nobody">Tout décocher</label>
					<table class="table table-sm" id="share-with">
					<?php foreach($users as $user): ?>
						<tr class="<?= $password->shared->contains($user->id) ? "table-light":"table-dark" ?>">
							<td>
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" name="users[]" id="user-<?php echo e($user->id); ?>" value="<?php echo e($user->id); ?>" <?= $password->shared->contains($user->id) ? "checked":"" ?>/>
									<label for="user-<?php echo e($user->id); ?>" class="custom-control-label"><?php echo e($user->code); ?> (<?php echo e($user->name); ?>)</label>
								</div>
							</td>
						</tr>
					<?php endforeach; ?>
					</table>
				</div>
				
			</div>
			
		</div>
				
		<button class="btn btn-primary">Enregistrer</button>
		<?php endif; ?>
	</form>
	
	<p>
	<form class="inline-form" action="/password/<?php echo e($password->id); ?>" method="post">
		<?php echo csrf_field(); ?>
		<?php echo method_field('DELETE'); ?>
		<button class="btn btn-danger btn-delete">Supprimer</button>
	</form>
	</p>
	
</div>
<?php $__env->stopSection(); ?>


		
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/workspace/simplekeypass/resources/views/password/view.blade.php ENDPATH**/ ?>
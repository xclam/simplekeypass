<?php $__env->startSection('content'); ?>
<div class="container">
    
	Owner : <?php echo e($password->owner->gaia); ?> - <?php echo e($password->owner->name); ?>

	<form class="inline-form" method="post" action="/password/<?php echo e($password->id); ?>/save">
		<?php echo csrf_field(); ?>
		<?php echo method_field('PATCH'); ?>
		
		<label for="name">Name :</label>
		<input type="text" id="name" name="name" class="" value="<?php echo e($password->name); ?>" <?= (!$password->is_owner()) ? "disabled":"" ?> />
		
		<label for="login">Login :</label>
		<input type="text" id="login" name="login" class="" value="<?php echo e($password->login); ?>" <?= (!$password->is_owner()) ? "disabled":"" ?>/>
		
		<label for="password">Password :</label>
		<input type="text" id="password" name="password" class="" value="<?php echo e(Illuminate\Support\Facades\Crypt::decryptString($password->password)); ?>" <?= (!$password->is_owner()) ? "disabled":"" ?>/>

		<?php if($password->is_owner()): ?>
		<div>
			<h3>Partager avec :</h3>
			<label id="share-with-all">Tout cocher</label> / <label id="share-with-nobody">Tout décocher</label>
			<table class="table table-sm" id="share-with">
			<?php foreach($users as $user): ?>
				<tr class="<?= $password->shared->contains($user->id) ? "table-light":"table-dark" ?>">
					<td>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="users[]" id="user-<?php echo e($user->id); ?>" value="<?php echo e($user->id); ?>" <?= $password->shared->contains($user->id) ? "checked":"" ?>/>
							<label for="user-<?php echo e($user->id); ?>" class="custom-control-label"><?php echo e($user->gaia); ?> <?php echo e($user->name); ?></label>
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
	<form class="inline-form" action="/password/<?php echo e($password->id); ?>" method="post">
		<?php echo csrf_field(); ?>
		<?php echo method_field('DELETE'); ?>
		<button class="btn btn-danger btn-delete">Supprimer</button>
	</form>
	</p>
	
</div>
<?php $__env->stopSection(); ?>


		
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\sites\passwordvault\resources\views/password/view.blade.php ENDPATH**/ ?>
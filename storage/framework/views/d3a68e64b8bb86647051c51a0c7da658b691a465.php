<?php $__env->startSection('content'); ?>
<div class="container">
    
	<form class="inline-form" action="<?php echo e($form_action); ?>" method="post">
		<?php echo csrf_field(); ?>
		
		<?php if(isset($environment->id)): ?>
			<?php echo method_field('PATCH'); ?>
		<?php endif; ?>
		
		<label for="name">Name</label>
		<input type="text" id="name" name="name" class="" value="<?php echo e($environment->name); ?>"/>
	
		<label for="type">Type</label>
		<select id="type" name="type" class="">
			<option value="app" <?= ($environment->type == "app") ? "selected":"" ?>>Application</option>
			<option value="bdd" <?= ($environment->type == "bdd") ? "selected":"" ?>>Base de données</option>
			<option value="srv" <?= ($environment->type == "srv") ? "selected":"" ?>>Serveur</option>
			<option value="others" <?= ($environment->type == "others") ? "selected":"" ?>>Autres</option>
		</select>

		
		<div>
			<h3>Mots de passes associés</h3>
			<table class="table table-sm">
			<?php foreach($passwords as $pass): ?>
				<tr class="<?= $environment->passwords->contains($pass->id) ? "table-light":"table-dark" ?>">
					<td>
						<div class="custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" name="passwords[]" id="pass-<?php echo e($pass->id); ?>" value="<?php echo e($pass->id); ?>" <?= $environment->passwords->contains($pass->id) ? "checked":"" ?>/>
							<label for="pass-<?php echo e($pass->id); ?>" class="custom-control-label"><?php echo e($pass->name); ?></label>
						</div>
					</td>
				
					
					<td><code><?php echo e($pass->login); ?></code></td>
					<td><code><?php echo e(Illuminate\Support\Facades\Crypt::decryptString($pass->password)); ?></code></td>
				</tr>
			<?php endforeach; ?>
			</table>
		
		</div>
		<button class="btn btn-primary">Enregistrer</button>
	</form>
	
	<p>
	<form class="inline-form" action="/environment/<?php echo e($environment->id); ?>" method="post">
		<?php echo csrf_field(); ?>
		<?php echo method_field('DELETE'); ?>
		<button class="btn btn-danger btn-delete">Supprimer</button>
	</form>
	</p>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\sites\passwordvault\resources\views/environment/view.blade.php ENDPATH**/ ?>
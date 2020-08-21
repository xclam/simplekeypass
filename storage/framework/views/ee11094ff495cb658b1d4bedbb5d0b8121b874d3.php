<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
	<div class="header-body"><h1><?php echo e(__('Add environment')); ?></h1></div>
	
	<form class="inline-form" action="<?php echo e(route('environment.save')); ?>" method="post">
		<?php echo csrf_field(); ?>
		
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
							<input type="checkbox" class="custom-control-input" name="passwords[]" id="pass-<?php echo e($pass->id); ?>" value="<?php echo e($pass->id); ?>"/>
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

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/workspace/simplekeypass/resources/views/environment/create.blade.php ENDPATH**/ ?>
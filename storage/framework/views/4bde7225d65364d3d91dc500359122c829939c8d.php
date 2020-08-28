

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
	<div class="header-body"><h1><?php echo e(__('Create user')); ?></h1></div>
	
	<form class="form" method="post" action="<?php echo e(route('user.store')); ?>">
		<?php echo csrf_field(); ?>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="name"><?php echo e(__('Name')); ?></label>
				<input type="text" id="name" name="name" class="form-control" />
			</div>
			
			<div class="form-group col">
				<label for="code"><?php echo e(__('Code')); ?></label>
				<input type="text" id="code" name="code" class="form-control" />
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="email"><?php echo e(__('Email')); ?></label>
				<input type="text" id="email" name="email" class="form-control" />
			</div>
		</div>
		
		<div class="form-row">
			<div class="form-group col">
				<label for="password"><?php echo e(__('Password')); ?></label>
				<input type="text" id="password" name="password" class="form-control" />
			</div>
		</div>

		<button class="btn btn-primary"><?php echo e(__('Save')); ?></button>
	</form>
	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/workspace/simplekeypass/resources/views/user/create.blade.php ENDPATH**/ ?>
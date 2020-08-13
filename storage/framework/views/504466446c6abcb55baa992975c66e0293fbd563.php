

<?php $__env->startSection('content'); ?>
<div class="container">

	<div class="d-flex ">
		
		<div class="flex-grow-1"><?php echo $__env->make('password.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
		
		<div class="align-bottom"><?php echo $__env->make('password.pills', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></div>
		
	</div>
	
	
	
	<div class="passlist row mt-2">
		<?php switch($view):
			case ('list'): ?>
				<?php echo $__env->make('password.list-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php break; ?>
			<?php case ('card'): ?>
				<?php echo $__env->make('password.card-view', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php break; ?>
		<?php endswitch; ?>

	</div>
	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/workspace/simplekeypass/resources/views/password/index.blade.php ENDPATH**/ ?>
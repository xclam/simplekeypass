<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
	<div class="header-body"><h1><?php echo e(__('Environments')); ?></h1></div>
	
	<nav class="navbar">
		<a href="/environment" class="btn btn-primary">Ajouter</a>
	</nav>
	
	<table class="table table-sm table-hover table-light">
	
		<thead><tr><th>Nom</th><th>Type</th></tr></thead>
	
		<?php foreach($environments as $env): ?>
		
			<tr class="clickable" data-href="/environment/<?php echo e($env->id); ?>"><td><?php echo e($env->name); ?></td><td><?php echo e($env->type); ?></td></tr>
		
		<?php endforeach; ?>
		
	</table>
	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/workspace/simplekeypass/resources/views/environment/index.blade.php ENDPATH**/ ?>


<?php $__env->startSection('content'); ?>
<div class="container">

	<nav class="navbar">
		<a href="/environment/add" class="btn btn-primary">Ajouter</a>
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
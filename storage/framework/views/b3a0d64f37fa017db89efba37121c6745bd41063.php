<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    
	<div class="header-body"><h1><?php echo e(__('Users')); ?></h1></div>
	
	<nav class="navbar">
		<a href="/user" class="btn btn-primary">Ajouter</a>
	</nav>
	
	<table class="table table-sm table-hover table-light">
	
		<thead><tr><th>Nom</th><th>Nom</th><th>Email</th><th>Droits</th></tr></thead>
	
		<?php foreach($users as $user): ?>
		
			<tr class="clickable" data-href="/user/<?php echo e($user->id); ?>">
				<td><?php echo e($user->name); ?></td>
				<td><?php echo e($user->name); ?></td>
				<td><?php echo e($user->email); ?></td>
				<td><?php echo e($user->name); ?></td>
			</tr>
		
		<?php endforeach; ?>
		
	</table>
	
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/workspace/simplekeypass/resources/views/user/index.blade.php ENDPATH**/ ?>
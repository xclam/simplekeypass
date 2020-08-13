
<div class="title h5"><?php echo e(__('Add password')); ?></div>

<form class="form" method="post" action="/password/add">
	<?php echo csrf_field(); ?>
	
	<div class="form-row">
		<div class="form-group mr-sm-2 col-3">
			<label for="new-name" class="sr-only"><?php echo e(__('Name')); ?></label>
			<input type="text" id="new-name" name="name" class="form-control" placeholder="<?php echo e(__('Name')); ?>"/>
		</div>
	
		<div class="form-group mr-sm-2 col-3">
			<label for="new-login" class="sr-only"><?php echo e(__('Login')); ?></label>
			<input type="text" id="new-login" name="login" class="form-control" placeholder="<?php echo e(__('Login')); ?>"/>
		</div>
		
		<div class="form-group mr-sm-2 col-3">
			<label for="new-pass" class="sr-only"><?php echo e(__('Password')); ?></label>
			<input type="text" id="new-pass" name="password" class="form-control" placeholder="<?php echo e(__('Password')); ?>" />
		</div>
		
		<div class="col">
			<button class="btn btn-primary"><?php echo e(__('Add')); ?></button>
		</div>
	</div>
	
	<div class="form-row">
		<div class="col">
			<span type="button" data-toggle="collapse" data-target="#options" aria-expanded="false" aria-controls="options">
				<?php echo e(__('Advanced options')); ?>

				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
				</svg>
			</span>
		</div>
	</div>
	
	<div class="collapse" id="options">
		
		<div class="form-row">
		
			<div class="form-group mr-sm-2 col">
				<label for="new-note" class="sr-only"><?php echo e(__('Note')); ?></label>
				<input type="text" id="new-note" name="note" class="form-control" placeholder="<?php echo e(__('Note')); ?>"/>
			</div>
			
			<div class="form-group mr-sm-2 col">
				<label for="new-url" class="sr-only"><?php echo e(__('URL')); ?></label>
				<input type="text" id="new-url" name="url" class="form-control" placeholder="<?php echo e(__('URL')); ?>"/>
			</div>
			
		</div>
		
		<div class="form-row">
			<div class="form-group mr-sm-2 col">
				<label for="new-tags" class="sr-only"><?php echo e(__('Tags')); ?></label>
				<input type="text" id="new-tags" name="tags" class="form-control" placeholder="<?php echo e(__('Tags')); ?>"/>
			</div>
		</div>
		
	</div>
		
</form>
<?php /**PATH /var/workspace/simplekeypass/resources/views/password/form.blade.php ENDPATH**/ ?>
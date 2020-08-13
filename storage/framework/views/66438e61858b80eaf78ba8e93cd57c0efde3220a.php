<table class="table table-bordered table-hover table-sm">
	<thead class="table-primary">
		<tr>
			<th><?php echo e(__('Name')); ?></th>
			<th><?php echo e(__('Login')); ?></th>
			<th><?php echo e(__('Password')); ?></th>
			<th><?php echo e(__('')); ?></th>
		</tr>
	</thead>
<?php foreach($passwords as $pass): ?>
	<tr>
		<td class="align-middle"><?php echo e($pass->name); ?></td>
		<td class="align-middle"><?php echo e($pass->login); ?></td>
		<td>
			<div class="input-group">
				<span type="text" id="copy-<?php echo e($pass->id); ?>" class="form-control" value="<?php echo e(Illuminate\Support\Facades\Crypt::decryptString($pass->password)); ?>" style="transition: background-color ease-in 1s;">
					<?php echo e(Illuminate\Support\Facades\Crypt::decryptString($pass->password)); ?>

				</span>
				<div class="input-group-append">
					<button class="btn btn-outline-secondary copy" data-copy="copy-<?php echo e($pass->id); ?>" type="button">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
							<path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
						</svg>
					</button>
				</div>
			</div>
		</td>
		<td>
			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots-vertical" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
			</svg>
			<?php if($pass->is_owner()): ?>
				<a href="/password/<?php echo e($pass->id); ?>">Modifier</a>
			<?php endif; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php /**PATH /var/workspace/simplekeypass/resources/views/password/list-view.blade.php ENDPATH**/ ?>
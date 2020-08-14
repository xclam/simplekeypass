<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Password Vault</title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="row flex-xl-nowrap">
			
			<div class="col-md-3 col-xl-2 bd-sidebar">
				
				<nav class="collapse bd-links">
					
					<a class="navbar-brand" href="<?php echo e(url('/')); ?>">Password Vault</a>
						
					<div class="bd-toc-item">
						<a class="bd-toc-link" href="<?php echo e(url('/')); ?>"><?php echo e(__('Passwords')); ?></a>
					</div>
					
					<div class="bd-toc-item active">
						<a class="bd-toc-link" href="#"><?php echo e(__('Settings')); ?></a>
						<ul class="nav bd-sidenav">
							<li><a href="<?php echo e(route('environments')); ?>"><?php echo e(__('Environments')); ?></a></li>
							<li><a href="<?php echo e(route('groups')); ?>"><?php echo e(__('Groups')); ?></a></li>
							<li><a href="<?php echo e(route('users')); ?>"><?php echo e(__('Users')); ?></a></li>
						</ul>
					</div>

					<div class="bd-toc-item">
						<a class="bd-toc-link" href="<?php echo e(url('/')); ?>"><?php echo e(Auth::user()->name); ?></a>
					</div>
					
				</nav>
				
			</div>
			
			<main class="col-md-9 col-xl-10 py-md-3 pl-md-5 bd-content">
				<?php echo $__env->yieldContent('content'); ?>
			</main>
			
		</div>
    </div>
</body>
</html>
<?php /**PATH /var/workspace/simplekeypass/resources/views/layouts/app.blade.php ENDPATH**/ ?>
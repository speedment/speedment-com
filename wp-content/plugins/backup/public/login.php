<?php
require_once(dirname(__FILE__).'/boot.php');
require_once(SG_PUBLIC_INCLUDE_PATH.'header-new.php');
?>
<div class="bg-content bg-content-full-width bg-content-dark">
	<div class="bg-login-container">
		<p class="bg-text-center">
			<img width="180px" src="<?php echo SG_PUBLIC_URL; ?>img/logo-horizontal.png">
		</p>
		<div class="bg-login-content">
			<h1>Login to your account</h1>
			<p id="bg-login-error" class="bg-text-danger">Invalid login info. Please try again.</p>
			<p><input id="email" class="bg-form-control" type="text" placeholder="Email" autofocus></p>
			<p><input id="password" class="bg-form-control" type="password" placeholder="Password"></p>
			<p class="bg-pull-left">
				<span class="bg-tooltip">
					How do I get this?
					<span class="bg-tooltiptext">
						The credentials were sent to your email.
						In case if you didn't receive them, please contact us.
					</span>
				</span>
			</p>
			<p class="bg-pull-right">
				<button id="bg-login-btn" class="bg-btn bg-btn-success">Login</button>
			</p>
		</div>
	</div>
</div>
<?php
require_once(SG_PUBLIC_INCLUDE_PATH.'footer-new.php');
?>

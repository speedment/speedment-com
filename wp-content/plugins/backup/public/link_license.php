<?php
require_once(dirname(__FILE__).'/boot.php');
require_once(SG_LIB_PATH.'SGAuthClient.php');
require_once(SG_PUBLIC_INCLUDE_PATH.'header-new.php');

$auth = SGAuthClient::getInstance();
$products = $auth->getAllUserProducts();
?>
<div class="bg-content bg-content-full-width bg-content-dark">
	<div class="bg-license-container">
		<p class="bg-text-center">
			<img width="180px" src="<?php echo SG_PUBLIC_URL; ?>img/logo-horizontal.png">
		</p>
		<div class="bg-license-content">
			<h1>Invalid or unassigned license</h1>

			<?php if ($auth->isAnyLicenseAvailable($products)): ?>
				<p>
					Your license could not be validated. Maybe you forgot to link a license to this domain. If that is the case, please link one license below:
				</p>
				<p>
					<select id="product" class="bg-form-control">
						<option value="0">Choose a license</option>
						<?php foreach ($products as $product): ?>
						<?php $availableLicenses = $product['licenses']?$product['licenses']-$product['used_licenses']:'Unlimited'; ?>
						<option data-licenses="<?php echo $availableLicenses; ?>" value="<?php echo $product['id']; ?>">
							<?php echo $product['display_name'].' - '.$availableLicenses; ?> license(s) available
						</option>
						<?php endforeach; ?>
					</select>
				</p>
				<p>
					<button id="link-btn" class="bg-btn bg-btn-primary">Link this domain now</button>
				</p>
			<?php else: ?>
				<p>
					Your license could not be validated. It seems that you have already assigned all of your licenses.
				</p>
				<p>
					Please login to your dashboard to manage your website urls and release a license to be able to use it.
				</p>
				<p>
					<a href="<?php echo SG_BACKUP_ADMIN_LOGIN_URL; ?>" target="_blank" class="bg-btn bg-btn-primary">Login to dashboard</a>
				</p>
				<p>
					<a href="javascript:void(0)" onclick="location.reload()">Click here to try again</a>
				</p>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php
require_once(SG_PUBLIC_INCLUDE_PATH.'footer-new.php');
?>

<h2>
	PHP EXECUTION TIMEOUT ERROR
</h2>
<p>
	Your hosting has an execution time limit of <?php echo SGBoot::$executionTimeLimit?> seconds for PHP scripts, which is not enough for performing a full backup/restore of your website. A full website backup/restore is a complex process which may take a couple of minutes depending on many circumstances. The needed execution time varies depending on the backup options and your server performance, that's why we cannot tell exactly how much execution time is needed. But, almost all hosting providers give users the ability to increase the execution time limit or they increase it themselves, upon user request. Please ask your hosting provider if they are able to increase your execution time limit. If this isn't an option for you, then try to activate the "Reloads enabled" option in the settings (to compress your data chunk by chunk). Then disable any security plugin which could prevent nopriv ajax calls and try again to create a new backup. If you still see this error, please contact us and we'll do our best to help you figure it out ASAP.
</p>

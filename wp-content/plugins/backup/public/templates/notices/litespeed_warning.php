Your website is running on a LiteSpeed server. If you are experiencing problems while backing up or restoring, try to add the following code to your .htaccess file:
<p>
	&lt;IfModule Litespeed&gt;<br>
	RewriteEngine On<br>
	RewriteRule .* - [E=noabort:1]<br>
	&lt;/IfModule&gt;
</p>

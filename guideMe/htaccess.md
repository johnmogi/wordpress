sudo nano /etc/httpd/conf/sites.d/wordpress.conf


sudo find /srv/http/wordpress/ -type d -exec chmod -v 775 {} \;
sudo find /srv/www/htdocs/dev/ -type d -exec chmod -v 775 {} \;

(not working as expacted)


<IfModule mod_rewrite.c>
RewriteEngine On
RewriteBase /dev/
RewriteRule ^index\.php$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /dev/index.php [L]
</IfModule>




https://forums.opensuse.org/showthread.php/403218


<Directory "/srv/www/htdocs">
	# Possible values for the Options directive are "None", "All",
	# or any combination of:
	#   Indexes Includes FollowSymLinks SymLinksifOwnerMatch ExecCGI MultiViews
	#
	# Note that "MultiViews" must be named *explicitly* --- "Options All"
	# doesn't give it to you.
	#
	# The Options directive is both complicated and important.  Please see
	# https://httpd.apache.org/docs/2.4/mod/core.html#options
	# for more information.
	# NOTE: For directories where RewriteRule is used, FollowSymLinks
	# or SymLinksIfOwnerMatch needs to be set in Options directive.
	Options None
	# AllowOverride controls what directives may be placed in .htaccess files.
	# It can be "All", "None", or any combination of the keywords:
	#   Options FileInfo AuthConfig Limit
	AllowOverride None
	# Controls who can get stuff from this server.
    
	<IfModule !mod_access_compat.c>
  AllowOverride All
	</IfModule>
	<IfModule mod_access_compat.c>
  AllowOverride All
	</IfModule>
</Directory>
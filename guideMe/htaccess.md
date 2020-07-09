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


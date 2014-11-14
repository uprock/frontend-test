#!/bin/bash

# mkdir /var/www/
# chown -R www-data:www-data /var/www/
# chown -R mysql:mysql /var/lib/mysql

# mkdir /var/log/php5/
# touch /var/log/php5/cli.log /var/log/php5/cgi.log
# chown www-data:www-data /var/log/php5/cli.log
# chown www-data:www-data /var/log/php5/cgi.log

# php /var/www/apps/admin/yiic.php migrate --interactive=0


sleep 10 && /usr/bin/php /var/www/apps/admin/yiic.php migrate up --interactive=0 &
/usr/bin/supervisord -c /etc/supervisor/supervisord.conf

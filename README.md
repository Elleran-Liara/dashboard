Requirements:
sudo apt-get install php7.4-curl php-yaml php apache2 </br>
cd /var/www/html </br>
git clone https://github.com/hannajohnsona/dashboard.git </br>
sudo visudo // go to the bottom of the page</br>
www-data ALL = NOPASSWD: /bin/systemctl</br>
navigate to http://{yourip}/dashboard</br>

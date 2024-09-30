# Install notes

 apt update
 apt upgrade -y
 apt install apache2 php php-xml php-mysql libapache2-mod-authnz-pam sqlite3 php-sqlite3 composer -y
 sudo usermod -aG shadow www-data
 sudo touch /etc/pam.d/apache
 sudo echo "# PAM configuration for Apache" >> /etc/pam.d/apache
 sudo echo "auth required pam_unix.so" >> /etc/pam.d/apache
 sudo echo "account required pam_unix.so" >> /etc/pam.d/apache


 a2enmod rewrite
 a2enmod authnz_pam
 systemctl restart apache2
 
 cd /var/www/ui
 composer install
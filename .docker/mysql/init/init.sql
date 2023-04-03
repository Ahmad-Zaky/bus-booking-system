# create databases
CREATE DATABASE IF NOT EXISTS `booking_test`;

# create root user and grant rights
GRANT ALL PRIVILEGES ON *.* TO 'root'@'%';
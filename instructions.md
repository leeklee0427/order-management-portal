# Deployment on Oracle Cloud
This document serves as a comprehensive guide to deploying a MySQL database service on the Oracle Cloud platform. The deployment includes setting up an interactive web interface using Apache/HTTPd and PHP designed to facilitate essential database operations, such as INSERT, DELETE, UPDATE, and SELECT.  

Sample scripts in this document comes from [Order Management Portal](https://github.com/leeklee0427/order-management-portal).

You can interact with the database using the following link: [http://150.136.153.174/order-management-portal/index.html](http://150.136.153.174/order-management-portal/index.html).


## Prerequisites
1. An [Oracle Cloud Infrastructure Free Tier](https://www.oracle.com/cloud/free/#xd_co_f=NzQ0ZDNkYWEtMGRmMS00MjlkLTkwZTgtZjY5ZmRhZmVmNmQ5~) account or similar;

2. A MacOS, Linux, or Windows computer with ```ssh``` support installed.


## Environment
The operating system (image) deployed in the Oracle Cloud environment is CentOS-7-2022.04.26-0.


## Outlines
1. [Apache/HTTPd](#apache/httpd)
2. [MySQL Database](#mysql-database)
    1. [Download MySQL](#download-mysql)
    2. [Login](#login)
    3. [User](#user)
    4. [Error Handling](#error-handling)
3. [PHP](#php)
    1. [Download PHP](#download-php)
    2. [Install MySQLi](#install-mysqli)
    2. [Troubleshooting](#troubleshooting)


## Apache/HTTPd

1. Install Apache/HTTPd service:
   ```
   $ yum install httpd
   ```

2. Start web service:
   ```
   $ sudo systemctl start httpd
   ```

3. Check internet connections:
   ```
   $ netstat -lntp
   ```

```/var/www/html``` is the typical/default location for web server files in Linux distributions.


### References
- [Install Apache and PHP on an Oracle Linux Instance](https://luna.oracle.com/lab/d4dcb77b-833c-4978-8821-a5e79c749325/steps)



## MySQL Database
MySQL is not pre-installed in the default CentOS 7 repositories.

### Download MySQL
1. Enable the MySQL 5.7 repository:
   ```bash
   $ sudo yum localinstall https://dev.mysql.com/get/mysql57-community-release-el7-11.noarch.rpm
   ```

   If ```"No package mysql-community-server available"``` pops up, try:
   ```bash
   $ sudo rpm --import https://repo.mysql.com/RPM-GPG-KEY-mysql-2022
   ```

2. Install MySQL 5.7 package with yum:
   ```bash
   $ sudo yum install mysql-community-server
   ```

3. Start MySQL
   ```
   $ sudo systemctl start mysqld
   ```

4. Locate temporary password
   ```
   $ sudo grep 'temporary password' /var/log/mysqld.log
   ```
   ```
   2024-01-08T02:43:21.036079Z 6 [Note] [MY-010454] [Server] A temporary password is generated for root@localhost: %7Fp2N9/bOrT
   ```

5. Run the security script and set up new password for root user
   ```
   $ sudo mysql_secure_installation
   ```
   Note: You should answer ```"y" (yes)``` to all questions.


### Login
* To login into the MySQL server as the root user:
  ```
  $ mysql -u root -p
  ```


### User
Login as root user:
* Create user:
  ```
  mysql> CREATE USER 'username'@'localhost' IDENTIFIED BY 'password';
  ```
* Grant privileges:
  ```
  mysql> GRANT ALL PRIVILEGES ON database_name.* TO 'username'@'localhost';
  ```


### Error Handling
If ```Authentication plugin 'caching_sha2_password' cannot be loaded``` pops up, try:
```
mysql> ALTER USER 'username'@'localhost' IDENTIFIED WITH mysql_native_password BY 'password';
```


### References
- [MySQL Database Installation and Configuration for Advanced Management Console](https://docs.oracle.com/en/java/java-components/advanced-management-console/2.28/install-guide/mysql-database-installation-and-configuration-advanced-management-console.html#GUID-12323233-07E3-45C2-B77A-F35B3BBA6592)

- [How To Install MySQL on CentOS 7](https://hbayraktar.medium.com/how-to-install-mysql-on-centos-7-2c2dc0207fc1)

- [Unable to install MySQL on CENTOS7](https://stackoverflow.com/questions/70993613/unable-to-install-mysql-on-centos7)

- [Authentication plugin 'caching_sha2_password'](https://stackoverflow.com/questions/49963383/authentication-plugin-caching-sha2-password)




## PHP

### Download PHP
1. Configure the Oracle Linux package repos to use PHP 7:
   ```
   $ sudo yum install -y oracle-php-release-el7
   ```
2. Install PHP 7:
   ```
   $ sudo yum install -y php
   ```
3. Restart Apache:
   ```
   $ sudo systemctl restart httpd
   ```
4. Verify installation:
   ```
   $ php -v
   ```

   Add a PHP test file:
   ```
   $ sudo vi /var/www/html/info.php
   ```
   Input the following text and ```wq```:
   ```
    <?php
    phpinfo();
    ?>
   ```

   Connect to ```http://<your-public-ip-address>/info.php```, which will produce a listing of PHP configuration on your instance.


### Install MySQLi
1. Install MySQLi using yum:
   ```
   $ sudo yum install php-mysqli
   ```
2. Restart Apache:
   ```
   $ sudo systemctl restart httpd
   ```


### Troubleshooting
Add the following lines at the beginning of your PHP script to display errors, which might help identify any issues:
```PHP
ini_set('display_errors', 1);
error_reporting(E_ALL);
```


### References
- [Install Apache and PHP on an Oracle Linux Instance](https://luna.oracle.com/lab/d4dcb77b-833c-4978-8821-a5e79c749325/steps)
- [How to solve "Fatal error: Class 'MySQLi' not found"?](https://stackoverflow.com/questions/666811/how-to-solve-fatal-error-class-mysqli-not-found)



---

[leeklee0427](https://github.com/leeklee0427)  
Last Edited on: 01/08/2024  
[Go to Top](#top)

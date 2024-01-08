# Database

## Source of Data
Our database primarily utilizes datasets from the Online Retail collection available at the UCI Machine Learning Repository. The original dataset was provided by Dr. Daqing Chen, Director of the Public Analytics group at the London South Bank University, London, UK. This foundational dataset has been significantly augmented and customized to align with the specific requirements of our project.

[UCI - Online Retail Dataset](https://archive.ics.uci.edu/dataset/352/online+retail)  
[UCI - Online Retail II Dataset](https://archive.ics.uci.edu/dataset/502/online+retail+ii)


## Database Structure
Post the Boyce-Codd Normal Form (BCNF) normalization process, our database includes the following 9 tables:

- **CUSTOMER**: Contains detailed information about customers.
- **ORDER_INFO**: Manages individual order details.
- **ORDER_STATUS**: Tracks the status of each order.
- **CATEGORY**: Organizes products into various categories.
- **PRODUCT_CATEGORY**: Associates products with their respective categories.
- **PRODUCT_INFO**: Stores detailed information about each product.
- **EMPLOYEE_TITLE**: Lists the titles and roles of employees.
- **EMPLOYEE_INFO**: Provides comprehensive information about employees.
- **INCLUDES**: Represents the relationship between orders and the products they contain.

The database schema is set up and populated through two SQL scripts: ```create.sql``` and ```load.sql```.  

## Environment
The operating system (image) deployed in the Oracle Cloud environment is CentOS-7-2022.04.26-0.

## Deploy and populate MySQL database on Oracle Cloud
To deploy the database on the Oracle Cloud Virtural Machine, follow these steps:

1. Connect to the server using SSH

2. Upload the ```create.sql``` and ```load.sql``` files to ```/var/www/html/order-management-portal``` as an example

3. Log in to MySQL using your credentials and enter password:
   ```mysql -u root -p```

4. In MySQL, create the database:
   ```
   mysql> CREATE DATABASE order_management_portal;
   ```
   ```
   mysql> USE DATABASE order_management_portal;
   ```

5. Execute the ```create.sql``` script in MySQL to create the database tables:
   ```
   mysql> source /var/www/html/order-management-portal/db/create.sql
   ```
6. Finally, run the ```load.sql``` script to populate the tables with data:
   ```
   mysql> source /var/www/html/order-management-portal/db/load.sql
   ```
   "ERROR 3948 (42000): Loading local data is disabled; this must be enabled on both the client and server sides" might pop up, try:
   ```
   mysql> show global variables like 'local_infile';
   ```
   ```
   mysql> set global local_infile=true;
   ```
   ```
   mysql> exit
   ```
   Then, connect/login with local_infile:
   ```
   mysql> mysql --local_infile=1 -u root -p
   ```
   Run ```load.sql``` again:
   ```
   mysql> source /var/www/html/order-management-portal/db/load.sql
   ```

   Done.

These steps will establish the database with the necessary structure and data, ready for use in the Online Order Management Portal.


---

[leeklee0427](https://github.com/leeklee0427)  
Last Edited on: 01/07/2024
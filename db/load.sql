-- Disable foreign key checks temporarily
SET FOREIGN_KEY_CHECKS = 0;

-- Load data into CUSTOMER table
LOAD DATA LOCAL INFILE '/var/www/html/order-management-portal/db/data/CUSTOMER.csv' INTO TABLE CUSTOMER
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (User_ID, Email_Address, Username, Zip_Code, Address);

-- Load data into EMPLOYEE_INFO table
LOAD DATA LOCAL INFILE '/var/www/html/order-management-portal/db/data/EMPLOYEE_INFO.csv' INTO TABLE EMPLOYEE_INFO
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (Employee_ID, Employee_Name, Home_Address);

-- Load data into EMPLOYEE_TITLE_INFO table
LOAD DATA LOCAL INFILE '/var/www/html/order-management-portal/db/data/EMPLOYEE_TITLE_INFO.csv' INTO TABLE EMPLOYEE_TITLE_INFO
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (Employee_Name, Home_Address, Job_Title);

-- Load data into PRODUCT_INFO table
LOAD DATA LOCAL INFILE '/var/www/html/order-management-portal/db/data/PRODUCT_INFO.csv' INTO TABLE PRODUCT_INFO
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (Product_ID, Product_Name, Supply, Price);

-- Load data into PRODUCT_CATEGORY_INFO table
LOAD DATA LOCAL INFILE '/var/www/html/order-management-portal/db/data/PRODUCT_CATEGORY_INFO.csv' INTO TABLE PRODUCT_CATEGORY_INFO
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (Product_Name, Product_Category_Name);

-- Load data into CATEGORY table
LOAD DATA LOCAL INFILE '/var/www/html/order-management-portal/db/data/CATEGORY.csv' INTO TABLE CATEGORY
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (Category_Name, Mgr_Employee_ID);

-- Load data into ORDER_INFO table
LOAD DATA LOCAL INFILE '/var/www/html/order-management-portal/db/data/ORDER_INFO.csv' INTO TABLE ORDER_INFO
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (Order_ID, Order_User_ID, Order_Employee_ID, Order_Time, Delivery_Zip_Code, Delivery_Address, Last_Four_Digits);

-- Load data into ORDER_STATUS_INFO table
LOAD DATA LOCAL INFILE '/var/www/html/order-management-portal/db/data/ORDER_STATUS_INFO.csv' INTO TABLE ORDER_STATUS_INFO
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (Order_Time, Delivery_Address, Delivery_Zip_Code, Order_Status, Total_Amount);

-- Load data into INCLUDES table
LOAD DATA LOCAL INFILE '/var/www/html/order-management-portal/db/data/INCLUDES.csv' INTO TABLE INCLUDES
  FIELDS TERMINATED BY ','
  LINES TERMINATED BY '\n'
  IGNORE 1 LINES
  (includes_Order_ID, includes_Product_ID, Quantity);

-- Re-enable foreign key checks
SET FOREIGN_KEY_CHECKS = 1;

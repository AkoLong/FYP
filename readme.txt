FYP 
Food Ordering System
-------------------------------------
Team members :
1. Chiew Gin Xiang 1151200941
2. Goh Jie Jing 1151200840
3. Lee Hau Chon 1151201111
-------------------------------------
Requirement:
PHP Version 7.0 - 7.1
XAMPP Version 7.1.12

Things to do before executing SQL Codes:
1. Create a new directory named "FYP2" in xampp/htdocs/
2. Move project file into xampp/htdocs/FYP2/
3. Make sure to Start Apache and MySQL Services
4. Open web browser and type url: localhost/phpmyadmin
5. Proceed executing SQL codes, should be able to Drag and Drop SQL files. 
(Run Create DB SQL first, then navigate to food_ordering_system DB to continue run Create Table and Insert Into SQL)

Remarks:
This is a website that built using Codeigniter PHP Framework, a W3School HTML template and also some self-defined design.
Codeigniter is a MVC, Model-View-Controller framework. 
Things that are provided by the template is located at the folder named "Original".

To access our website, please execute the SQL code to insert the dummy data follow the sequence below.
1. create_database.sql
2. create_table_... .sql
3. insert_into_... .sql

After the SQL code has been executed, please go to this url to access our website.
"localhost/FYP2/FYP/page/index"

To login as admin, please use the following URL.
"localhost/FYP2/FYP/page/login2"

To take a deeper look into the code, please go to the several url :
1. FYP2/FYP/application/controller/page.php ----> Controller, where the logic and linking between view file and model file is done.
2. FYP2/FYP/application/config/config.php ----> base url configuration
3. FYP2/FYP/application/config/database.php ----> database connection configuration
4. FYP2/FYP/application/model/..._mod.php ----> Model, where the SQL code is built to retrieve or manipulate the data.
5. FYP2/FYP/application/view/content/.... .php ----> View, where each page of our website is listed.
6. FYP2/FYP/application/view/template/.... .php ----> Template View, where the footer, header, linking between script and css is located.
7. FYP2/FYP/application/config/config.php -> line 382 ----> Session Expired Time. 7200 seconds, which is equal to 2 hours.

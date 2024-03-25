<h1>Laravelle e-commerce Development Project</h1>

<h2>Accounts</h2>
- SapnaKarsan = 220090438 Sapna Karsan<br>
- Shecklock = 220036506 Ho Yin Siu<br>
- Bashayer81 = 220036584 Bashayer Aljassim<br>
- ZA3N = 220180979 Zaen Hussain<br>
- MattBrian22 = 220330231 Matthew Tahir<br>
- umar-ahmad-astonuni = 220189606 umar ahmad<br>
- RickyNandhra = 220076203 Ricky Nandhra<br>
- Uzzy-A633 = 210140437 Usmaan Amar<br>

<h2>Environment used</h2>
- VS code<br>
- Laravelle<br>
- MyphpAdmin<br>
- virtualmin<br>

<h2>Description</h2>
This is the website/software development project in group 38 during the study in Aston university, this is a website developed during the module "team project" during the academic year 2023-2024.

This is a e-commerce website called "Sportify Pro Max"

![Spotify Pro Max](https://github.com/Shecklock/Team-38/assets/148438898/91812326-5bae-4a0f-841c-2fe11010bf7b)

<h2>Website Account type</h2>

<h3>User type</h3>
Admin and Normal User

- Admin accounts are able to do the followings:
  1. Manage all the products and orders through the admin dashboard,
  2. Sign up for the first time and use the website as a customer, with password change functionality after first login.
  3. Change their password for future security
  4. Process an order, by checking customers transactions and processing shipments
  5. View, add, delete and update customers’ details
  6. Effectively operate the inventory management system
  7. To search, filter and view the status of selected products and orders
  8. To add, edit or remove products to/from the inventory through the website.
  9. Initiate and process an incoming order in a friendly way. Following this entry, the stock level will be automatically updated.
      
- Customer accounts are able to do the followings:
  1. sign up for the first time and use teh website as a customer, with password change functionality after first login
  2. change their password for future security.
  3. search and filter products by names of categories and/or by price range.
  4. place an order, which submits their basket and registers it as an order in the database, along with the total price(dummy order)
  5. return a product which they have already purchased in previous orders
  6. add, update, or remove items to/from their basket.
  7. view, add, delete and update their personal information
  8. check the status of their past orders
  9. rate and review individual products and the overall service provided by the website.

<h2>How to run</h2>
 When running the code, a database is needed, some of the migration are not fully functioning and our team decided in order to let things work, we modify th database directly in phpmyadmin. The sql of the database is included in the file u_220036506_ecommerce

 After database was made, you may need to modify the .env file as while for database connection, .env file of this project is under Team-38/Backend/
 Modify the following part so that it matches your database:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=u_220036506_ecommerce
DB_USERNAME= "your user name"
DB_PASSWORD= "Your password"

after connection of the database, the applciation shoulkd work fine

<h2>Website Development record</h2>

30/11/23<br>
The webiste is still in development, admin dashboard prototype was done, admin can manage product details such as its description, quantity, name of product and catergory.<br>
Detail page has to be added so that it admin can view the product deatils before editing.<br>
Edit page has to be modify also so admin don't need to re-enter field if the details has not been changed.<br>
Database is not yet finsh as only product table was fine tuned.

05/12/2023
Futher development, category tag can be create now. When creating any product, a tag must be include. tag can be changed after the creating the product.
Product create function was destoryed during the development but got fixed. 
Now the function is working perfect and fine.

07/12/2023
Futher developmet was made, html files from front end was converted to lade templates for the laravel framework. Home page is linked to the database so that it show any products uploaded by the admin.

For more development record please visit the trello board: https://trello.com/b/WHEj4KB6

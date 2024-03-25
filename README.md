<h1>Laravelle e-commerce Development Project</h1>

<h2>Students participating in this project</h2>
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
 
<h2>Application usage</h2>

Welcome to our comprehensive application walkthrough, designed to provide you with a detailed overview of the user journey, from exploring products to placing an order, and the administrative functionalities that keep our platform running smoothly.

<h4>Navigating the Platform</h4>
Upon landing on our home page, you'll be greeted with a curated selection of products, showcasing five items from each of our main categories, providing a glimpse into the variety we offer. The navigation bar at the top is your gateway to the broader product range, equipped with filters for names and categories, ensuring you find exactly what you're looking for with ease.

<h4>Discovering Products</h4>
When you venture into the product page, a wealth of options unfolds. Here, an additional filter bar allows you to refine your search further by price range, category, or product name. Each product is represented by an image that, when clicked, along with the "Buy Now" button, takes you to a detailed product page. This page is where the magic happens: you can select sizes, check stock availability, read reviews from other customers, and contribute your own insights and ratings.

<h4>Making a Purchase</h4>
Your shopping journey continues as you add items to your basket, where quantities can be adjusted simply by entering your desired number and updating it. Ready to finalize your purchase? The "Proceed to Checkout" button will lead you to the order confirmation page. Here, you can review your order and choose to "Pay Now" or "Pay Later," keeping in mind that all transactions are simulated for a smooth experience.

<h4>Account Management</h4>
Creating an account is a gateway to additional functionalities. Once registered, you can update your personal details, such as your address and phone number. For security reasons, email changes are reserved for admin intervention.

<h4>Tracking and Managing Orders</h4>
After placing an order, you can monitor its progress and, if necessary, opt to "Pay Now" for any orders designated for later payment directly from the order details page. This ease of management extends to order cancellation and returns, with limitations based on the shipping status to ensure a seamless process.

<h4>Admin Capabilities</h4>
Administrators have a bird's-eye view of the platform through the admin dashboard, displaying the latest orders and inventory statuses. Managing orders is straightforward, with the ability to update order statuses affecting inventory levels automatically. The product management system in the backend serves as the control center for inventory, allowing admins to adjust stock levels and handle returns efficiently.

<h4>Invitation Codes and User Management</h4>
Admins can generate time-sensitive invitation codes for new admin registrations, adding a layer of exclusivity and security. The customer details section offers comprehensive filters for managing user accounts, from viewing detailed profiles to editing information as needed.

This walkthrough encapsulates the seamless integration of front-end usability with back-end management, ensuring both our users and administrators have a smooth, efficient experience on our platform.

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

<h2>Note that</h2>
<br>Some of our migrations are failing to run, we made this issue clear throughout the lab sessions with one of the helpers (Jas), but everything we have tried has failed.

Website was hosted and be linked on: https://220036506.cs2410-web01pvm.aston.ac.uk/Team-38/Backend/public/
# Online Bookstore Demonstration - Laravel 5

----------

**A simple Demonstration Project for Laravel 5 Online Bookstore Application**

A Simple Online Book Shop Deomostration that using Laravel 5, including the following functions -
* Membership      - Login / Logout / Forgot Password / Captcha Registration
* Administration  - Check the current order and mark a processed status
* Browsing        - Browsing the products and categories based on user preferences
* Review          - User can write an single review once if they have purchased the item
* Payment process - Check the Credit card number regular expression pattern, ordering fulfillment , receiver name and address
* Rating          - User can note an rating out of 5 once they write an review, and the average score will be calculated
* Searching       - Simple database PDO query by using Laravel Eloquent class
* MVC Structure   - Implemented an MVC Structure followed the Laravel standard
* 
* Here is the video showing project functions https://www.youtube.com/watch?v=reBPwXh5J7E

**Free for distribution and education use**


### Used Libraries
----------
* fzaninotto/Faker     - Database Seeder
* mewebstudio/captcha  - Captcha
* illuminate/html      - Form Builder & CSRF Builder ( Prevent Cross Site Scripting)
* Eshopper Template    - Responsive Layout

### How to install
---------
```php
//Download it, Setup the Apache Location
//Edit the .env file to make sure the database settings is correct
//Check the permission for the files , should be 755 or 644 for www-data:www-data ( owner : your-server)
//Execute the follow command in your site directory
composer install
php artisan migrate
php artisan db:seed
php artisan up
//You are done!
```

### Others
----------
admin is the only user that can read all of the orders and mark them as "handled".

The login and password of the admin is **admin** and **admin**

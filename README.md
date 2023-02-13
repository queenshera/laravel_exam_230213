## Routing
### Task 1 - index page shows welcome message "Welcome to Laravel"

### Task 2 - aboutus page shows 404 NOT FOUND error

## Authentication
### Task 3 - create new user with name, email, mobile and password and verify homepage

### Task 4 - profile view page shown to authenticated users only
- create profile route in web.php and protect with auth middleware
- verify if user is not logged in, then redirected to login page
- verify if user is logged in, then profile page is visible 

### Task 5 - update name of user from profile page
- create new post url /profile/update
- create form on profile page to update name
- when user clicks update button name of user is changed

## Table migrations
### Task 6 - add data to blogs table
- create blogs table with columns blogTitle, blogDetails, blogAuthor and blogDate
- add new blog to blogs table
- verify that newly added data is shown on blog.index route

### Task 7 - factory and seeder
- create BlogFactory and BlogSeeder for blogs table
- add 40 records to blogs

### Task 8 - update blogs table
- update any blog and set blogTitle as **this is blog is used for testing**

### Task 9 - delete record from blogs table
- delete any single blog from blogs table

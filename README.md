**Build a simplified RESTful API for managing e-commerce system task**

this task contain 3 main endpoint:- 
-
`GET /products
` list all the product with paginated data and depend on cache. we can searching with product names, price.
-
`POST /orders
` submit product , this api for registered user only , it accept customer name, email, phone number and list of product 
this api place the order and send email for the register user
-
`GET /orders/{id}` (to retrieve order details) for registered user

we have two api for login and register new user.
-
`POST /login
` accept email and password and return token

-
`POST /register
` accept email and password, name, phone and return token

we have 4 api for manging product ( create , update , show , delete )

---------------------------------

to list product and searching we depend on laravel pipeline so we make each filter as a pipe, then 
laravel pipeline take this pipes and applying one by one.

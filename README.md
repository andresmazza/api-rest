# API-REST for Silex
A Tiny Silex REST for a CRUD operations on SQLite database for Products and ProductsList entities.


####Install and Running
    cd api-rest
    composer install 
    

 change the permission
    
    chmod 774 ./var/logs
    chmod 774 ./var/app.db
    
  
####Runnig on php 5.4+**
    
    php -S 0:8000 -t public/
    
  
####Basic HTTP authentication
   
    user: demo    password:demo
   
  
  
#### Registers the following routes:
    
    GET  /api/v1/products
    POST /api/v1/product
    GET /api/v1/product
    PUT /api/v1/product/{id}
    DELETE /api/v1/product/{id}
    
    GET /api/v1/productList
    GET /api/v1/productList/{name}
   

for example you can use a application REST or try with curl:
	
	GET get all products
	curl http://<user>:<pass>@<host>:<port>/api/v1/products -H 'Content-Type: application/json' -w "\n"

	POST insert a new product 
	curl -X POST http://<user>:<pass>@<host>:<port>/api/v1/product -d '{"product":{ "title":"This is a title","description":"this is a description" }}' -H 'Content-Type: application/json' -w "\n"







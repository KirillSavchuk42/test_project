Start

php artisan migrate
php artisan db:seed


Authorization request:

http://project.loc/api/auth?email=admin@admin.com&password=password


Authorization header:

"Authorization": "Bearer <token>"


Request examples:

POST  http://project.loc/api/products?name=Test Product 1&description=Description test test&user=Admin&category=Fisher LLC&country=San Marino&status=approved

POST  http://project.loc/api/products?name=Test Product 2&description=Description 2 test test&user=Admin&category=Herzog-Konopelski&country=France&status=approved

POST  http://project.loc/api/products?name=Test Product 3&description=Description 2 test test&user=Admin&category=Herzog-Konopelski&country=France&status=declined


GET  http://project.loc/api/products

GET  http://project.loc/api/products/2
GET  http://project.loc/api/products/3

GET  http://project.loc/api/products/dropdown

PUT  http://project.loc/api/products/3?description=Description 3


Test of validation
PUT  http://project.loc/api/products/2?name=1
PUT  http://project.loc/api/products/2?name=Test 1

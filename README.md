 # Sensory Evaluation Application
 1. Go to www then coppy .env.example to .env
 2. Back to root directory, Open terminal and run command<br/>
 	`docker-compose build`<br/>
 	`docker-compose exec webserver composer update`<br/>
	`docker-compose up`
 3. If docker ran correctly you can vitsit system at<br/>
	`http://localhost:8081/` => Web page<br/>
	`http://localhost:8080/` => phpMyadmin
 4. Access to page `migrate/index.php` to migrate database<br/>
	`http://localhost:8081/migrate/index.php`
 5. Project is ready!

# MyBlog
BLOG website built on Laravel. This was my first Laravel project developed in about 30 days while learning this new framework. 

Features:

	CRUD with delete confirmation
	Search/Filter algorithm
	Help Modal
	Authentication and
	login/logout redirection
	Dynamic drop-down menu
	Laravel Pagination
	FontAwesome Icons

Build Resources:

	Linux Mint v.19
	Laravel 5.7
	Bootstrap v.3.3.6 (blade)
	Bootstrap v.4.0.0
	MySql V.14.14 Distrib 5.7.22
	FontAwesome v.5.7.1
	php v.7.1.3	
	jquery v.3.2
	vue v.2.5.17

Credits:

	Stackoverflow.com
	AppDividen.com
	Medium.com
	LaravelDocs
	itsolutionstuff.com
	ministackoverflow.com
	laravel-news.com
	easylaravelbook.com
	auth0.com
	snipe.net
	codexworld.com
	tutorialspoint.com
	incoder.com
	laravelcode.com

Build (basic) Steps:

	$ cd /var/www/hmtl
	$ su
	$ mkdir Laravel
	$ chmod 777 Laravel
	$ cd Laravel
	$ composer create-project --prefer-dist laravel/laravel MyBlog
	$ cd MyBlog
	$ chmod 777 -R storage/
	update .env 

	create auth:
 	php artisan make:auth
	
	create model (MVC):
	$ php artisan make:model blog --migration
	
	Update <timestamp>create_blogs_table.php file. (note: model is singular and table is plural):
	$ php artisan migrate
	
	create controller (MVC):
	$ php artisan make:controller BlogController --resource

	add controller to route file (routes/web.php):
	
	Create the Views and insert coding:

	Inside resources >> views folder, create one folder called blogs.
	Inside that folder, create the following three files.
		create.blade.php
		edit.blade.php
		index.blade.php
	Inside views folder, we also need to create a layout file. So create one file
	inside the views folder called layout.blade.php.
	
	Apply code changes to controller:
	
	code the index() function inside BlogController.php file
	code the edit() function inside  BlogController.php file
	code the update function inside BlogController.php file
	code the delete function inside BlogController.php file
	
	Apply AUTH code changes:
	
	alter LoginController.php
	protected $redirectTo = '/blogs'; (so we get redirected when successful login)

	alter app.blade.php to validate auth
 	@if(Auth::guest())
      		<script>window.location = "/login";</script>
    	@endif
	
	add css styling in public/css folder
	
	hosting: PHP ARTISAN SERVE 
	(optionally) create virtual host
	

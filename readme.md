## Laravel blog ##

### Installation ###

* type `git clone https://github.com/Aveesh52/Laravel-blog.git projectname` to clone the repository 
* type `cd Laravel`
* type `composer install`
* type `composer update`
* copy *.env.example* to *.env*
* type `php artisan key:generate`to generate secure key in *.env* file
* log into phpmyadmin and create a database 
* if you use MySQL in *.env* file :
   * set DB_CONNECTION
   * set DB_DATABASE
   * set DB_USERNAME
   * set DB_PASSWORD
* type `php artisan vendor:publish --provider="Bestmomo\LaravelEmailConfirmation\ServiceProvider" --tag="confirmation:migrations"` to publish email confirmation migration
* type `php artisan migrate --seed` to create and populate tables
* edit *.env* for emails configuration

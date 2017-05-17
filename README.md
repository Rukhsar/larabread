# LaraBread

A simple package for adding breadcrumbs to your application. Its use collections to make the breadcrumb tree.

## Installation

Install using composer 

```
composer require rukhsar/larabread
```

Then add 

```php
Rukhsar\LaraBread\LaraBreadServiceProvider::class,
```
into your `config/app.php`   providers section and 

```php
'LaraBread' => Rukhsar\LaraBread\Facades\LaraBreadFacade::class,
'LaraBreadFactory' => Rukhsar\LaraBread\Facades\LaraBreadFactoryFacade::class,
```

into aliases section. 

If you want to customize the default breadcrumb template then you can publish the breadcrumb views using below command.

```
php artisan vendor:publish
```

this will place the template file in `vendor/larabread`.


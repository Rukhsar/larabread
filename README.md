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
php artisan vendor:publish --provider="Rukhsar\LaraBread\LaraBreadServiceProvider"
```

this will place the template file in `vendor/larabread`.

## Usage

You can use this package to create breadcrumbs using following.

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rukhsar\LaraBread\Contracts\LaraBreadContract;
use Rukhsar\LaraBread\LaraBreadItem;

class PageController extends Controller
{
    public function index(LaraBreadContract $breadcrumbs)
    {
        $breadcrumbs->addBread([
            new LaraBreadItem('Home', '/'),
        ]);

        return view('welcome');
    }

    public function page1(LaraBreadContract $breadcrumbs)
    {
        $breadcrumbs->addBread([
            new LaraBreadItem('Home', '/'),
            new LaraBreadItem('Page1','/page1'),
        ]);
        return view('page1');
    }
}
```

To display breadcrumbs use below in your blade template.

```php
{!! LaraBread::render() !!}
```



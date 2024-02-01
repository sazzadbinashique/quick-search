# Quick Search Laravel Package

[![License](https://img.shields.io/badge/License-MIT-blue.svg)](https://opensource.org/licenses/MIT)
[![Latest Version](https://img.shields.io/github/v/release/sazzadbinashique/quick-search)](https://github.com/sazzadbinashique/quick-search/releases)

A Laravel package that provides quick search functionality for your application.

## Installation

Install the package via Composer:

```bash
composer require sazzadbinashique/quick-search
```
# Laravel Version Compatibility
- For Laravel 8.x, use version 1.x of this package.

## Usage

### 1. Configuration

After installing the package, run the following command to publish the configuration file:

```bash
php artisan vendor:publish --tag=quick-search-config
```

This will publish the configuration file to ` config/quick-search.php `. Adjust the configuration according to your needs.

###2. Service Provider and Alias

The service provider and facade alias are automatically registered, but you can also manually add them to your ` config/app.php ` file:

```php
'providers' => [
    SazzadBinAshique\QuickSearch\QuickSearchServiceProvider::class,
  
],

'aliases' => [
    'QuickSearch' => SazzadBinAshique\QuickSearch\Facades\QuickSearch::class,
]
```    


###3.  Basic Usage

```php
YourModel::search('John', ['name' => 'like', 'age' => 'equals'])
    ->multipleSelect(['status' => [1, 2, 3], 'category' => [4, 5, 6]])
    ->dateRange('created_at', '01/01/2022', '31/01/2022')
    ->sort('created_at', 'desc')
    ->get();
```

# Product Scraper

> A short and rigid URL scraper for products on "https://www.stadiumgoods.com/adidas"

## Requirements

```php
# Requires PHP 7.0+ / Goutte PHP Scraper / Guzzle 6+
```

## Installation

```php
# Install composer dependencies
# From the <project-dir> run:
composer install 
```

## Examples

```php
# Example 1 (returns data directly to stdout):
php plp.php -u "https://www.stadiumgoods.com/adidas"

# Example 2 (pipes data into a csv file):
php plp.php -u "https://www.stadiumgoods.com/adidas" > data.csv
```
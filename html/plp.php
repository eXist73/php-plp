<?php

// Include autoload dependencies
include_once './vendor/autoload.php';

// Get options
$options = getopt("u:f:");

// Check if we have a url, if not throw error
$url = $options['u'] ?? null;
if(!$url)
    exit("Url -u must be defined\n  Usage: php " . $argv[0] . " -u \"https://your-url-here.com\"\n");

// Init web scraper
use Goutte\Client;
$client = new Client();

// Get data from url
$crawler = $client->request('GET', $url);

// Get product info / price
$data = [];
$crawler->filter('ul.products-grid div.product-info')->each(function ($node) use (&$data) {

    // Get product name
    $temp['name'] = trim($node->filter('div.product-name a')->first()->text());

    // Get product price
    $temp['price'] = $node->filter('div.price-box span.price')->first()->text();

    // Append to list
    $data[] = $temp;
});

// Setup CSV data as response
$out = fopen('php://output', 'w');
fputcsv($out, ["Product Name","Price"]);
foreach($data as $line)
    fputcsv($out, $line);
fclose($out);
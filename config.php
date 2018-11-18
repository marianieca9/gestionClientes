<?php
//Database details
define ('DB_HOST', 'localhost');
//Username
define ('DB_USERNAME', 'root');
//Pass
define ('DB_PASS', '');
//Database Name
define ('DB_NAME', 'appindra');
//Base URL
define ('BASE_URL', 'http://appindra.localhost.com');

define ('SITE_NAME', 'Prueba');

//Table clients
define ('TABLE_CLIENTS', 'clients');
define ('CLIENTS_COLUMN_NAME', 'name');
define ('CLIENTS_COLUMN_SURNAME', 'surname');
define ('CLIENTS_COLUMN_DNI', 'dni');
define ('CLIENTS_COLUMN_ADDRESS', 'address');
define ('CLIENTS_COLUMN_PHONE', 'phone');
define ('CLIENTS_COLUMN_EMAIL', 'email');

//Table products
define ('TABLE_PRODUCTS', 'products');
define ('PRODUCTS_COLUMN_NAME', 'name');
define ('PRODUCTS_COLUMN_CODE', 'code');
define ('PRODUCTS_COLUMN_DESCRIPTION', 'description');

//Table relation clients/products
define ('TABLE_REL_CLIENTS_PRODUCTS', 'rel_clients_products');
define ('REL_CP_COLUMN_DNI', 'dni_client');
define ('REL_CP_COLUMN_CODE', 'code_product');

$_SERVER["DOCUMENT_ROOT"] = dirname(__FILE__);

?>

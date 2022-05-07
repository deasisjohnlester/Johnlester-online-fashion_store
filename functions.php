<?php

// db config
$host = 'localhost';
$user = 'root';
$pwd = '';
$dbname = 'fashion_store';

function connect()
{
    global $host, $user, $pwd, $dbname;

    $dsn = "mysql:host=$host;dbname=$dbname";


    try {
        $pdo = new PDO($dsn, $user, $pwd, [PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION]);

        if ($pdo) {
            return $pdo;
        }
    } catch (PDOException $ex) {
        die($ex->getMessage());
    }
}


// add new products 
function add_new_product($params)
{
    $stmt =   connect()->prepare("INSERT INTO products (name, description, price, photo) VALUES (:name, :description, :price, :photo)");

    return $stmt->execute($params);
}



//  delete product
function remove_product($params)
{
    $stmt = connect()->prepare("DELETE FROM products WHERE id = :id");
    return $stmt->execute($params);
}



// update product
function update_product_info($params)
{
    $stmt = connect()->prepare("UPDATE products SET name = :name, description = :description, price = :price, photo = :photo WHERE id = :id");

    return $stmt->execute($params);
}


// retrive products
function get_products()
{
    return connect()->query("SELECT * FROM products ORDER BY id DESC");
}


// get producy by id
function get_product_by_id($params)
{
    $stmt = connect()->prepare("SELECT * FROM products WHERE id = :id");
    $stmt->execute($params);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



//  ......helper functions


// redirect to new location
function go_to_location($location)
{
    header("Location: $location");
    exit;
}

// check all empty inputs and set an error mesage
function check_empty_input($post, $inputs, $errors)
{

    foreach ($post as $name =>  $value) {
        if (isset($name) && !empty($value)) {
            $inputs[$name] = $value;
        } else {
            $errors[$name] = 'This field is required!';
        }
    }
}



// upload files
function upload_file(array $file, $dir = null)
{
    $file_name = $file['name'];

    $extention =
        pathinfo($file_name, PATHINFO_EXTENSION); // get file extension

    // add random string name
    $hash_name = uniqid('FASHION_', true) . ".$extention";

    $tmp_name = $file['tmp_name'];

    if (move_uploaded_file($tmp_name, $dir . "/$hash_name")) {
        return $hash_name;
    }
}



// .. cjeck errors
function no_errors($errors)
{
    return count($errors) === 0 ? true : false;
}


function on_cart($item, $cart)
{
    return in_array($item, $cart);
}




function show_cartItems($params)
{
    $paramLeng = count($params) - 1;
    $placeholder = str_repeat('?,', $paramLeng) . '?';
    $statement =  connect()->prepare("SELECT * FROM products WHERE id IN ($placeholder) ORDER BY id DESC");
    $statement->execute($params);

    if ($statement->rowCount() > 0) {
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    return false;
}

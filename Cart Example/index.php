<?php
session_start();
require_once 'Cart.php';
require_once 'Simple.php';
require_once 'ClassDemo.php';
//require_once 'User.php';


try {

//    // Class 範例
//    $classDemo = new ClassDemo([
//        'key' => 'AAA',
//        'secret' => 'aaaaaaaaaa'
//    ]);
//
//    $classDemo->getKey();
//    echo ClassDemo::getSecret();


    // 購物車範例
    $_SESSION['myCart'] = [];
    $cart = new Cart($_SESSION['myCart']);

    $cart->add([
        'id' => 1,
        'title' => 'A',
        'price' => 100,
    ]);
    $cart->add([
        'id' => 2,
        'title' => 'B',
        'price' => 580,
    ]);
    $cart->add([
        'id' => 3,
        'title' => 'C',
        'price' => 200,
    ]);

    $deleteItem = $cart->delete(2);
    // print_r($deleteItem);die;

    $order = $cart->getOrder();
//    print_r($order); die;

    $total = $cart->getTotal();
//    print_r($total); die;
}
catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

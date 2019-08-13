<?php

// 變數與 Function
    $name = 'Cary';
    $age = 18;

    function profile($name, $age){
        return  "Profile：" . "{$name}，{$age}歲";
    }

    $profile = profile($name, $age);

// Passing by Reference
    function product(&$price){
        $price *= 0.8;
        return "產品價格：{$price}";
    }

    $price = 100;
    $product = product($price);
//    echo $product;
//    echo $price; // 80

// Passing by Reference 2
    function process(&$price){
        $newPrice = &$price;
        $newPrice *= 0.5;
    }

    $productPrice = 100;
    process($productPrice );

    // 陣列參數傳遞搭配預設參數
    function setting($options){
        $options += [
            'key' => 'defaultKey'
        ];

        return $options;
    }

    $setting = setting([
        'name' => 'CDE'
    ]);

//    print_r($setting);

# PHP 陣列

# 大綱
- 印出陣列 (print_r)
- 常用陣列方法
- Index 索引陣列 (以索引為依據)
- Associated 關聯式陣列 (以鍵值為依據)
- MultiDimensional 多維陣列

# 印出陣列
- echo 無法印出陣列 (echo 期望值為 String)
- 使用 print_r 印出陣列內容
- print_r 之前不可有 echo
```php
  $arr = [1, 2, 3];
  echo $arr; // 噴錯 Notice: Array to string conversion

  // 輸出陣列內容
  print_r($arr)."<br>";
  // 結果: Array ( [0] => 1 [1] => 2 [2] => 3 ) 
```

# 常用陣列方法 (待擴充)
- push  新增元素加在陣列最末
- pop   取出陣列最後的元素
- merge 合併兩個陣列
- count 計算陣列元素數量
```php
  $arr1 = [1, 2, 3];
  $arr2 = [5, 6];
  // 修改陣列值
  $arr1[0] = 9;

  // 新增元素進入陣列之末
  array_push($arr1, 4);
  $arr1[] = 4 // 效力相同

  // 取出陣列最末的元素
  $lastItem = array_pop($arr1);
  // 合併兩個陣列
  $arrMerge = array_merge($arr1, $arr2);
  // 計算陣列元素數量
  count($arr1);

  echo $lastItem; // 4 
  // Array ( [0] => 9 [1] => 2 [2] => 3 [3] => 5 [4] => 6 )
  print_r($arrMerge); 
```

# Index 索引陣列
- 利用索引檢索的陣列
```php
  $peopleOne = ['Mark', 'Tom', 'Tim'];
  $peopleTwo = array('Mark', 'Tom', 'Tim'); // 效力同上
  echo $peopleOne[1]; // 取得 Tom

  echo 'PrintOut Array:  ';
  print_r($peopleOne)."<br>";
```

# Associated 關聯性陣列
- 利用鍵值檢索的陣列
```php
  // Associative arrays 關聯性陣列 (以鍵值取代Index)
  $AsArrayOne = ['Mark'=> 26,'Tim'=> 30];
  // echo $AsArrayOne['DC']; // 以鍵值取代Index

  // 新增陣列元素 設定未使用的鍵值
  $AsArrayOne['Mary'] = 48;
  // 改變陣列元素 指定該鍵值
  $AsArrayOne['Tim'] = 100;

  echo "<br>";
  echo 'Associative Array:  ';
  print_r($AsArrayOne)."<br>";
  echo "<br>";
```

# MultiDimensional 多維陣列
- 通常會採用 關聯性陣列 作為內部陣列
```php
  $blogs = [
    ['title'=>'titleA','author'=>'Tim','content'=>'lorem1','pages'=>30],
    ['title'=>'titleB','author'=>'Mark','content'=>'lorem2','pages'=>50],
    ['title'=>'titleC','author'=>'Mary','content'=>'lorem3','pages'=>78],
    ['title'=>'titleD','author'=>'Tim','content'=>'lorem4','pages'=>46],
  ];

  // 取得 blogs 中第一個陣列
  print_r($blogs[0]);
  // 取得第一個陣列中的作者
  print_r($blogs[0]['author']);

  // 新增元素
  array_push($blogs, [
    'title'=>'titleD',
    'author'=>'Tim',
    'content'=>'lorem4',
    'pages'=>46
  ]);
  print_r($blogs);
```
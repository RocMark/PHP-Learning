# PHP 邏輯流程

# 大綱
- If Else
- 使用迴圈注意事項
- ForLoop & ForEach
- While Loop
- 迴圈產生 HTML 架構 (重要!!!)

# If Else
```php
  if(){

  }
```

# 使用迴圈注意事項
- 執行 for 迴圈前，先將最大迴圈次數暫存，避免每次迴圈都重新計算
- 盡量用 foreach 代替 while 和 for 迴圈
- 避免在迴圈內宣告大的變數，占有過多資源
- 多維陣列，應避免迴圈巢狀賦值

# ForLoop / ForEach
```php
  $arr = [
    ['name' => 'Mark', 'bank' => 20],
    ['name' => 'Tom', 'bank' => 46],
    ['name' => 'Tim', 'bank' => 45],
  ];

  $maxNum = count($arr)
  for ($index = 0; $index < $maxNum; $index++) {
    print_r($arr[$index]);
    echo "<br>";
  }

  foreach ($arr as $person) {
    echo $person['name'] . ' Has ' . $person['bank'] . ' in Bank '."<br>";
  }
```

# While Loop
```php
  $arr = [1, 2, 3];

  $index = 0; // 必須宣告於 WhileLoop 外面
  // while() 括號內每跑一次都會檢測一次條件
  while ($index < count($arr)) {
    echo $arr[$index];
    $index ++ ;
  }
```


# 迴圈產生 HTML 架構
```html
  <?php foreach($arr as $item){ ?>
    <h3><?php echo $item['name']?></h3>
    <p>$<?php echo $item['bank']?></p>
  <?php }?>
```
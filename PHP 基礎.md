# PHP 基礎

# Colonize 逗號插件
Shift+Enter 該行末插入;
Alt+Enter 該行末插入; 換至下一行

# 大綱
- 變數宣告 & 命名
- 單雙引號差異
- 雙等號、三等號差異
- String 基礎
- Number 基礎
- Boolean 基礎

# 變數宣告 & 命名
- 瀏覽器將 PHP echo 內容 Render 成 HTML 作呈現
- PHP 必須有 Semi
- 變數有大小寫之分
- 變數可使用下底線，但不可用特殊字元
- Const 變數 避免重複宣告 (define)
```php
  $name = 'Mark'; // string
  $age  = 30; // integer
  // $name = 'NewName'; // 覆蓋前面的 name
  echo $name;

  // Const 變數 通常使用全大寫表示
  define('FIXNUM', 123);
  // define('FIXNUM', 456); // 重複宣告會噴錯
  // Const 不需要加$
  echo FIXNUM;
```

# 單雙引號差異
- 單引號 將字串直接輸出，不會解析內容 (純字串一律使用此)
- 雙引號 會解析變數、內容 (速度較慢)
```php
  $NameSingle = 'My name is' . $name;
  $NameDouble = "My name is $name";
  
  // BackSlash 跳脫字元 亦可用 單雙引號夾雜
  echo "Test\"123\""; // 結果: Test"123"
  echo 'Test"456"'; // 結果: Test"456"
```

# 雙等號、三等號差異
- 雙等號 "不會" 檢查型別是否相等
- 三等號會檢查型別是否相等
- !== 為 === 的反義
- 大小寫不同不相等
```php
  $valA = '1';
  $valB = 1;
  // 雙等號 "不會" 檢查型別是否相等
  if($valA == $valB) {
    echo "$valA 相等於 $valB (雙等號)"; // 印出此
  }
  // 三等號會檢查型別是否相等
  if($valA === $valB) {
    echo "$valA 相等於 $valB (三等號)"; // 不顯示
  }

  // 大小寫不相等
  echo 'tim' == 'tim'; // 1 true
  echo 'tim' == 'Tim'; // 無輸出 false
```

# String 基礎
- 字串合併使用 . 作為連接
- strlen 取得字串長度
- strtoupper 轉換大小寫
- str_replace 字串取代
```php
  $stringOne     = 'email:';
  $stringTwo     = 'test@gmail.com';
  $combineString = $stringOne . $stringTwo;

  // String Function
  echo $name[0] // 取得首字 M
  echo 'String Length:   ' . strlen($name) . "<br>";
  echo strtoupper($name); // 轉換成大寫
  echo strtolower($name); // 轉換成小寫

  // str_replace(被取代者,取代者,目標字串);
  echo 'String Replace:  ' . str_replace('Mar', 'O', $name) . "<br>"; // 結果: OK
```

# Number 基礎
- 多使用 i+=1 縮寫，效率更高
```php
  // Number *,/,+,-,**(次方)
  $testNum = 5;
  $radius  = 25; // Integer
  $pi      = 3.14; // float,double
  // echo $testNum ** 2; // 5的2次方 = 25

  // 數學運算順序
  // B(Bracket括號) I(次分) D(除) M(乘) A(加) S(減)
  // echo 2 * (4 + 9) / 3;

  // increment & decrement operator
  // echo $radius++; // 先顯示 radius 才做 ++ 動作
  // echo $radius; // 在此才會為 26
  $testNum *= 10; // 等同 $testNum = $testNum * 10

  // Number Function 進位等 Function
  // echo floor($pi); // 無條件捨棄
  // echo ceil($pi); // 無條件進位
  // echo round($pi); // 四捨五入
  // echo pi(); // 取得程式內建的 pi 值
```

# Boolean 基礎 (待補充 falsy & 型別轉換)
- True, False 不分大小寫
- echo Boolean 值時，true 輸出 1，false 則無輸出結果
- 待補充 falsy & 型別轉換
```php
  // 為何會輸出如下，因為 echo 會將值轉換成字串，在進行輸出
  echo true;  // 輸出 "1"
  echo false;  // 無輸出 ""
  echo true == '1';
  echo false == '';

  // 5 < 10 結果: 1 (表示true)
  echo '5 < 10 結果:'.(5 < 10)."<br>"; 

  // 字串比較 (依英文字母順序，越後面的越大)
  echo 'aaa' < 'bbb' // 1 (true)
  // 大小寫比較 (小寫會大於大寫)
  echo 'aaa' > 'AAA' // 1 (true)

  // 大小寫不相等
  echo 'tim' == 'tim'; // 1 true
  echo 'tim' == 'Tim'; // 無輸出 false
```
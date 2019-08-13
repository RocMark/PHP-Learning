# PHP 資料型態

# 數值
- String  字串
- Integer 整數
- Boolean 布林
- Float 或 Double 浮點數

# 複合型別
- Object 物件
- Array  陣列

# 特殊型別
- Resource 資源 ????
- NULL 空值

# 虛擬型別
- mixed    混合 
- number   數字
- callback 回呼

# 型別判斷
- gettype() 取得型別
- is_xxx() 來判斷是否為該型別
```php
  $num = 1.45;
  echo gettype($num);

```
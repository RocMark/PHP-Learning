<?php
$_SESSION['myCart'] = [];
$myCart = new Cart($_SESSION['myCart']);

$myCart->add([
  'id' => 1,
  'title' => 'A',
  'price' => 500,
]);
$myCart->add([
  'id' => 2,
  'title' => 'B',
  'price' => 700,
]);
$myCart->add([
  'id' => 3,
  'title' => 'C',
  'price' => 800,
]);
// print_r($myCart);

print_r($myCart->updateItem([
  'id' => 2,
  'title' => 'B',
  'price' => 1700,
]));

// ! 待測
print_r($myCart->delItem(2));

print_r($myCart->getOrder());

// ! 待測
// print_r($myCart->getTotal()); // 原始2000 更新後 3000

class Cart
{
  //* 類似 this.name
  protected $_items;

  //? 傳參考 / 依賴注入重理一次
  public function __construct(array &$myCart)
  {
    //* 類似 傳入物件當作 this.name = obj.name
    $this->items =& $myCart;
  }

  public function add(array $item)
  {
    $this->addItem([
      'id' => $item['id'] ?? null,
      'title' => $item['title'] ?? null,
      'price' => $item['price'] ?? null,
    ]);
    return true;
  }

  public function addItem(array $item): bool
  {

    if (empty($item['id'])) {
      throw new Exception("請輸入參數 id");
    } elseif (empty($item['title'])) {
      throw new Exception("請輸入參數 title");
    } elseif (empty($item['price'])) {
      throw new Exception("請輸入參數 price");
    }
    array_push($this->items, $item);
    return true;
  }

  // 目標 用id找到目標，回傳刪除的項目
  public function delItem(int $id): array
  {
    echo $id; // 2

    // 先找到該 ID 在用 unset 從 Cart刪除，並回傳刪除的項目
    // 1. 先檢測該鍵值是否存在
    // 2. 找到陣列項目，並刪除該項目

    $isExists = false;
    $itemKey = null;

    // items陣列下也是陣列，必須存取項目

    // ? 寫上還是寫下好? (變數宣告放一起?)
    // $delItem = $this->items[$itemKey];

    // foreach ($this->items as $item) {

    // ! foreach 這個還不是很了解
    foreach ($this->items as $key => $item) {
      if ($key['id'] !== $id) {
        continue;
      }
      $isExists = true;
      $itemKey = $key;
      break;
    }

    if ($isExists === false) {
      throw new Exception('找無指定ID');
    }

    $delItem = $this->items[$itemKey];

    return $delItem;
  }

  public function getOrder()
  {
    return $this->items;
  }

  public function updateItem(array $newItem): array
  {
    // 先找到該 ID 在用 unset 刪除
    // 取鍵值並指定更改

    $IsIdExists = false;

    // 代表該項目
    $itemKey = null;

    $targetID = $newItem['id'];

    foreach ($this->items as $key => $item) {
      if ($item['id'] !== $targetID) {
        continue;
      }
      $IsIdExists = true;
      $itemKey = $key;

      $this->items[$key]['id'] = $newItem['id'];
      $this->items[$key]['title'] = $newItem['title'];
      $this->items[$key]['price'] = $newItem['price'];

      break;
    }

    if ($IsIdExists === false) {
      throw new Exception('找無指定ID');
    }

    return $this->items;
  }

  public function getTotal(): int
  {
    $sum = 0;

    foreach ($this->items as $item) {
      $sum += $item['price'];
    }

    return $sum;
  }
}

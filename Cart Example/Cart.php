<?php

/**
 * 簡單的購物車，不包含 session 功能
 *
 */

class Cart
{
  // 購物車項目
  protected $_items;

  public function __construct(array &$storage)
  {
    // 透過依賴注入，通常紀錄的方式使用 session
    $this->items =& $storage;
  }

  public function add(array $item): bool
  {
    $this->addItem([
      'id' => $item['id'] ?? null,
      'title' => $item['title'] ?? null,
      'price' => $item['price'] ?? null,
    ]);
    return true;
  }

  /**
   * @param $id 編號
   * @return array 返回被刪除的項目
   * @throws Exception
   */
  public function delete($id): array
  {
    $isExists = false;
    $itemKey = null;

    // 找出項目的陣列 Key
    foreach ($this->items as $key => $item) {
      if ($item['id'] != $id) {
        continue;
      }

      $isExists = true;
      $itemKey = $key;
      break;
    }

    if ($isExists === false) {
      throw new Exception('找不到指定的項目');
    }

    // 將找到的項目儲存返回
    $delItem = $this->items[$itemKey];

    // 刪除項目
    unset($this->items[$itemKey]);

    return $delItem;
  }

  // 取得訂單
  public function getOrder(): array
  {
    return $this->items;
  }

  // 總金額
  public function getTotal(): int
  {
    $total = 0;
    foreach ($this->items as $item) {
      $total += $item['price'];
    }
    return $total;
  }

  protected function _addItem($item): bool
  {
    if (empty($item['id'])) {
      throw new Exception('請輸入參數 id');
    } elseif (empty($item['title'])) {
      throw new Exception('請輸入參數 title');
    } elseif ($item['price'] === null) {
      throw new Exception('請輸入參數 price');
    }

    array_push($this->items, $item);

    return true;
  }
}

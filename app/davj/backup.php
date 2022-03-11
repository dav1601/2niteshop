
//  public function update($rowId, $qty)
//  {
//      $cartItem = $this->get($rowId);

//      if ($qty instanceof Buyable) {
//          $cartItem->updateFromBuyable($qty);
//      } elseif (is_array($qty)) {
//          $cartItem->updateFromArray($qty);
//      } else {
//          $cartItem->qty = $qty;
//      }

//      $content = $this->getContent();

//      if ($rowId !== $cartItem->rowId) {
//          $content->pull($rowId);

//          if ($content->has($cartItem->rowId)) {
//              $existingCartItem = $this->get($cartItem->rowId);
//              $cartItem->setQuantity($existingCartItem->qty + $cartItem->qty);
//          }
//      }

//      if ($cartItem->qty <= 0) {
//          $this->remove($cartItem->rowId);
//          return;
//      } else {
//          $content->put($cartItem->rowId, $cartItem);
//      }

//      $this->events->dispatch('cart.updated', $cartItem);

//      $this->session->put($this->instance, $content);

//      return $cartItem;
//  } 
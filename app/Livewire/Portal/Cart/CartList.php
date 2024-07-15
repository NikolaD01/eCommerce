<?php

namespace App\Livewire\Portal\Cart;

use App\Services\Shop\ProductService;

use App\Services\Utility\CartUtility;
use Livewire\Component;

class CartList extends Component
{
    public $cartItems;
    protected ProductService $productService;



    public function render()
    {
        $this->cartItems = CartUtility::listCartItems();
        return view('livewire.portal.cart.cart-list');
    }
}

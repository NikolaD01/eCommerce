<?php

namespace App\Services\Utility;

use Illuminate\Support\Facades\Log;

class CartUtility
{
    /**
     * Get all items currently in the cart.
     *
     * @return array
     */
    public static function getCartItems() : array
    {
        return session()->get('cart', []);
    }

    /**
     * List all items in the cart with details.
     *
     * @return array
     */
    public static function listCartItems() : array
    {
        $cartItems = self::getCartItems();
        $items = [];

        foreach ($cartItems as $key => $item) {
            $items[] = [
                'product_id' => $item['product_id'],
                'color' => $item['color'],
                'size' => $item['size'],
                'quantity' => $item['quantity']
            ];
        }

        return $items;
    }

    /**
     * Add a product to the cart.
     *
     * @param array $data
     * @return void
     */
    public static function addToCart($data) : void
    {
        $cart = session()->get('cart', []);
        $cartItemKey = self::generateCartItemKey($data['product_id'], $data['color'], $data['size']);

        Log::info('Current Cart:', $cart);
        Log::info('Generated Cart Item Key:', [$cartItemKey]);
        if (isset($cart[$cartItemKey])) {
            $cart[$cartItemKey]['quantity'] += $data['quantity'];
        } else {
            $cart[$cartItemKey] = $data;
        }
        Log::info('Updated Cart:', $cart);

        session()->put('cart', $cart);
        session()->save();
    }

    /**
     * Generate a unique cart item key based on product id, color, and size.
     *
     * @param int $productId
     * @param int|null $colorId
     * @param string|null $sizeName
     * @return string
     */
    protected static function generateCartItemKey(int $productId, int|null $colorId = null, string|null $sizeName = null) : string
    {
        $key = $productId;

        if (!is_null($colorId)) {
            $key .= '-' . $colorId;
        }

        if (!is_null($sizeName)) {
            $key .= '-' . $sizeName;
        }

        return $key;
    }

    /**
     * Remove a product from the cart.
     *
     * @param string $cartItemKey
     * @return void
     */
    public static function removeFromCart(string $cartItemKey) : void
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$cartItemKey])) {
            unset($cart[$cartItemKey]);
        }

        session()->put('cart', $cart);
    }
}

<?php

namespace App\Services\Utility;

class CartUtility
{
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
        if (isset($cart[$cartItemKey])) {
            $cart[$cartItemKey]['quantity'] += $data['quantity'];
        } else {
            $cart[$cartItemKey] = $data;
        }
        session()->put('cart', $cart);
    }

    /**
     * Generate a unique cart item key based on product id, color, and size.
     *
     * @param int $productId
     * @param int|null $colorId
     * @param string|null $sizeName
     * @return string
     */
    protected static function generateCartItemKey($productId, $colorId = null, $sizeName = null) : string
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
    public static function removeFromCart($cartItemKey) : void
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$cartItemKey])) {
            unset($cart[$cartItemKey]);
        }

        session()->put('cart', $cart);
    }

    /**
     * Get all items currently in the cart.
     *
     * @return array
     */
    public static function getCartItems()
    {
        return session()->get('cart', []);
    }
}

<?php

namespace App\Services\Utility;

use App\Services\Media\MediaService;
use App\Services\Shop\ProductService;
use App\Services\Shop\SizeService;
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
        $productService = app(ProductService::class);
        $mediaService = app(MediaService::class);
        $sizeService = app(SizeService::class);
        $cart = self::getCartItems();

        foreach ($cart as &$item) {
            $product = $productService->getProduct($item['product_id']);
            $item['product'] = $product;
            $item['media'] = $mediaService->getMediaColor($item['product_id'],$item['color']);
            $item['size'] =  $sizeService->getSize($item['size']);
            $item['total'] = $item['product']->price * $item['quantity'];
        }

        return $cart;
    }

    /**
     * Add a product to the cart.
     *
     * @param array $data
     * @return void
     */
    public static function addToCart($data) : ?string
    {
        if (empty($data['color']) || empty($data['size'])) {
            return 'Both color and size must be provided to add the product to the cart.';
        }

        $cart = session()->get('cart', []);
        $cartItemKey = self::generateCartItemKey($data['product_id'], $data['color'], $data['size']);


        if (isset($cart[$cartItemKey])) {
            $cart[$cartItemKey]['quantity'] += $data['quantity'];
        } else {
            $cart[$cartItemKey] = $data;
        }

        session()->put('cart', $cart);
        session()->save();
        return true;
    }

    /**
     * Generate a unique cart item key based on product id, color, and size.
     *
     * @param int $productId
     * @param int|null $colorId
     * @param string|null $sizeName
     * @return string
     */
    protected static function generateCartItemKey(int $productId, int|null $colorId = null, string|null $sizeName = null) : ?string
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

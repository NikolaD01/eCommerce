<?php

namespace App\Services\Utility;

use App\Services\Media\MediaService;
use App\Services\Shop\ProductService;
use App\Services\Shop\SizeService;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CartUtility
{
    /**
     * Get all items currently in the cart.
     *
     * @return array|null
     */
    public static function getCartItems() : array|null
    {
        try {
            return session()->get('cart', []);
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return null;
        }
    }

    /**
     * List all items in the cart with details.
     *
     * @return array|boolean
     */
    public static function listCartItems() : ?array
    {
        $productService = app(ProductService::class);
        $mediaService = app(MediaService::class);
        $sizeService = app(SizeService::class);
        $cart = self::getCartItems();
        $cartItems = [];
        $total = 0;

        if ($cart) {
            foreach ($cart as &$item) {
                if (is_array($item) && isset($item['product_id'])) {
                    $product = $productService->getProduct($item['product_id']);
                    $item['product'] = $product;
                    $item['media'] = $mediaService->getMediaColor($item['product_id'], $item['color']);
                    $item['size'] = $sizeService->getSize($item['size']);
                    $item['total'] = $item['product']->price * $item['quantity'];
                    $total += $item['total'];
                    $cartItems[] = $item;
                }
            }

            return [
                'items' => $cartItems,
                'total' => $total
            ];
        }
        return null;
    }

    /**
     * Add a product to the cart.
     *
     * @param array $data
     * @return true|null
     */
    public static function addToCart(array $data) : ?true
    {
        if (empty($data['color']) || empty($data['size'])) {
            return null;
        }

        try {
            $cart = session()->get('cart', []);
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            $cart = [];
        }
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
     * @return string|null
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
        try {
            $cart = session()->get('cart', []);
        } catch (NotFoundExceptionInterface|ContainerExceptionInterface $e) {
            return;
        }

        if (isset($cart[$cartItemKey])) {
            unset($cart[$cartItemKey]);
        }

        session()->put('cart', $cart);
    }
}

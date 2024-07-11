<?php

namespace App\Services\Utility;

use App\Services\Shop\ProductService;

class ProductExportUtility extends BaseExportUtility
{
    protected static function getRecordsWithRelations()
    {
        $productService = app(ProductService::class);
        return $productService->getAllProductsWithRelations();
    }

    protected static function getCsvHeaders()
    {
        return [
            'Product ID', 'Title', 'Description', 'Price', 'Created At', 'Updated At',
            'Media IDs', 'Material IDs', 'Category IDs', 'Size IDs'
        ];
    }

    protected static function getCsvRow($product)
    {
        $productData = [
            $product->id,
            $product->title,
            $product->description,
            $product->price,
            $product->created_at,
            $product->updated_at,
        ];

        $mediaIds = $product->medias->pluck('id')->implode(',');
        $materialIds = $product->materials->pluck('id')->implode(',');
        $categoryIds = $product->categories->pluck('id')->implode(',');
        $sizeIds = $product->sizes->pluck('id')->implode(',');

        return array_merge($productData, [$mediaIds, $materialIds, $categoryIds, $sizeIds]);
    }

    protected static function getFileNamePrefix()
    {
        return 'products';
    }
}

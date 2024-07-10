<?php

namespace App\Services\Utility;

use App\Services\Shop\ProductService;

class ExportUtility
{
    public static function exportCsv()
    {
        $productService = app(ProductService::class);
        $products = $productService->getAllProductsWithRelations();

        $timestamp = now()->format('Ymd_His');
        $filePath = storage_path("exports/products_{$timestamp}.csv");

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0755, true);
        }

        $file = fopen($filePath, 'w');

        fputcsv($file, [
            'Product ID', 'Title', 'Description', 'Price', 'Created At', 'Updated At',
            'Media IDs', 'Material IDs', 'Category IDs', 'Size IDs'
        ]);

        foreach ($products as $product) {
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

            $csvData = array_merge($productData, [$mediaIds, $materialIds, $categoryIds, $sizeIds]);

            fputcsv($file, $csvData);
        }

        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }
}

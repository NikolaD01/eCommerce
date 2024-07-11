<?php

namespace App\Services\Utility;

use Illuminate\Support\Facades\Storage;

abstract class BaseExportUtility
{
    public static function exportCsv()
    {
        $records = static::getRecordsWithRelations();

        $timestamp = now()->format('Ymd_His');
        $filePath = storage_path("exports/" . static::getFileNamePrefix() . "_{$timestamp}.csv");

        if (!file_exists(dirname($filePath))) {
            mkdir(dirname($filePath), 0755, true);
        }

        $file = fopen($filePath, 'w');

        fputcsv($file, static::getCsvHeaders());

        foreach ($records as $record) {
            fputcsv($file, static::getCsvRow($record));
        }

        fclose($file);

        return response()->download($filePath)->deleteFileAfterSend(true);
    }

    abstract protected static function getRecordsWithRelations();

    abstract protected static function getCsvHeaders();

    abstract protected static function getCsvRow($record);
}

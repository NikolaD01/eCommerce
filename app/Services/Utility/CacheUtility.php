<?php

namespace App\Services\Utility;

use Illuminate\Support\Facades\Cache;

class CacheUtility
{
    /**
     * Get data from the cache or store it if it doesn't exist.
     *
     * @param string $key
     * @param int $ttl
     * @param \Closure $callback
     * @return mixed
     */
    public function remember(string $key, int $ttl, \Closure $callback) : mixed
    {
        return Cache::remember($key, $ttl, $callback);
    }

    /**
     * Remove an item from the cache.
     *
     * @param string $key
     * @return void
     */
    public function forget(string $key): void
    {
        Cache::forget($key);
    }
    /**
     * Remove an item from the cache.
     *
     * @param string $cacheKey
     * @return void
     */
    public function clearModelCache(string $cacheKey): void
    {
        Cache::forget($cacheKey);
    }

    /**
     * Generate a cache key based on model name and ID.
     *
     * @param string $modelName
     * @param int $id
     * @return string
     */
    public function generateModelCacheKey(string $modelName, int $id): string
    {
        return "{$modelName}_{$id}_details";
    }
}

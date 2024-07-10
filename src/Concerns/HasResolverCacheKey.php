<?php

namespace Spatie\LaravelSettings\Concerns;

interface HasResolverCacheKey
{
    public function getCacheKey(string $settingsClass, string $prefix = ''): string;
}

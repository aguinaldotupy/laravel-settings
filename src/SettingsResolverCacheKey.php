<?php

namespace Spatie\LaravelSettings;

use Spatie\LaravelSettings\Concerns\HasResolverCacheKey;

class SettingsResolverCacheKey implements HasResolverCacheKey
{
    public function getCacheKey(string $settingsClass, string $prefix = ''): string
    {
        return "{$prefix}settings.{$settingsClass}";
    }
}

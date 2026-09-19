<?php

use App\Services\SettingService;

if (! function_exists('setting')) {

    function setting(string $key, mixed $default = null): mixed
    {
        return app(SettingService::class)->get($key, $default);
    }
}

if (! function_exists('setting_asset')) {

    function setting_asset(
        string $key,
        ?string $default = null
    ): ?string {
        return app(SettingService::class)->asset($key, $default);
    }

}
<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Carbon\Carbon;

Schedule::call(function () {
    collect(Storage::disk('temp')->allFiles())->each(function ($file) {
        if (Carbon::now()->diffInDays(Carbon::createFromTimestamp(Storage::disk('temp')->lastModified($file))) >= 14) {
            Storage::disk('temp')->delete($file);
        }
    });
})->dailyAt('3:00');


Artisan::command('clearTemp', function () {
    collect(Storage::disk('temp')->allFiles())->each(function ($file) {
            Storage::disk('temp')->delete($file);
    });
});

Artisan::command('test11', function(){
    $hall = \App\Models\Hall::create([
        'title' => '1',
        'is_active' => 'true',
        'rows_count' => intval('10'),
        'seats_count' => intval('10'),
        'price_standart' => intval('100'),
        'price_vip' => intval('100'),
    ]);
});

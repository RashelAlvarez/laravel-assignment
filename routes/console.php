<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('fetch:users')->everyMinute()
    ->onSuccess(function () {
        Log::info('Usuarios actualizados correctamente.');
    })
    ->onFailure(function () {
        Log::error('Error al actualizar los usuarios.');
    });

Schedule::command('fetch:posts')->everyMinute()
    ->onSuccess(function () {
        Log::info('Posts actualizados correctamente.');
    })
    ->onFailure(function () {
        Log::error('Error al actualizar los posts.');
    });

Schedule::command('fetch:comments')->everyMinute()
    ->onSuccess(function () {
        Log::info('Comentarios actualizados correctamente.');
    })
    ->onFailure(function () {
        Log::error('Error al actualizar los comentarios.');
    });

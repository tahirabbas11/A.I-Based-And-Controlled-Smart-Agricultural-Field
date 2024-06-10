<?php
/** Code By HAMDAN */
Route::get('/admin/dashboard', [Hamdan\CrudGenerator\Controllers\ProcessController::class,'getGenerator'])->name('generator');
Route::post('process', [Hamdan\CrudGenerator\Controllers\ProcessController::class,'postGenerator'])->name('postGenerator');

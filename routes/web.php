<?php

use App\Http\Controllers\BulkEditController;

Route::prefix('cp')->group(function () {
    Route::get('/bulk-edit-assets', [BulkEditController::class, 'index'])->name('cp.bulk.edit');
    Route::post('/bulk-edit-assets', [BulkEditController::class, 'update'])->name('cp.bulk.edit.update');
});

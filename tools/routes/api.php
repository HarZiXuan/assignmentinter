<?php
use App\Http\Controllers\ShapeController;

Route::get('/shapes', [ShapeController::class, 'index']);
Route::post('/shapes', [ShapeController::class, 'store']);
Route::get('/shapes/{id}', [ShapeController::class, 'show']);
Route::put('/shapes/{id}', [ShapeController::class, 'update']);
Route::delete('/shapes/{id}', [ShapeController::class, 'destroy']);



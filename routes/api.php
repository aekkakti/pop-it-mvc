<?php

use Src\Route;

Route::add('POST', '/login', [Controller\Api::class, 'index']);
Route::add('POST', '/echo', [Controller\Api::class, 'echo']);


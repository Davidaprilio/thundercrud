<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

$data = collect([
    [
        'prefix' => 'user',
        'action' => 'UserController@index',
    ],
    [
        'prefix' => 'user-profile',
        'action' => 'UserController@show_profile',
    ]
]);

# metode make match route
Route::get('/admin/{path}/{sub_path?}', function(string $path, ?string $sub_path = null) use ($data) {
    if ($sub_path) $sub_path = trim(trim($sub_path), '/');
    $match = $data->firstWhere('prefix', $path);
    if($match === null) return abort(404);

    dd([
        'path' => $path,
        'sub_path' => $sub_path,
    ], $match);
})->where('sub_path', '(.*)?');


# metode make all route
Route::prefix('admin2')->group(function() use ($data) {
    foreach ($data as $rt) {
        $action = explode('@', $rt['action']);
        $controller_file = "App\\Http\\Controllers\\{$action[0]}";
        Route::resource($rt['prefix'], $controller_file);
    }
});

Route::get('/', function () {
    return view('home');
});

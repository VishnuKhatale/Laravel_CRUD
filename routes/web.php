<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Middleware\CheckAge;

Route::get("/",  [UserController::class, 'index'])->name("users");

Route::prefix("/User")->group(function () {
Route::get("/",  [UserController::class, 'index'])->name("users");
Route::get("/list",  [UserController::class, 'index'])->name("users");
Route::get("/create",  [UserController::class, 'create_user'])->name("create_user");

// Route::post("/save",  [UserController::class, 'save_user'])->name("save_user")->middleware(CheckAge::class);
Route::post("/save",  [UserController::class, 'save_user'])->name("save_user");


Route::get("/edit/{id}",  [UserController::class, 'edit_user'])->name("edit_user");
Route::put("/update/{id}",  [UserController::class, 'update_user'])->name("update_user");
Route::get("/delete/{id}", [UserController::class, 'delete_user'])->name('delete_user');
});

Route::prefix('/Post')->group(function () {
Route::get("/", [PostsController::class,"index"])->name("posts");
Route::get("/posts", [PostsController::class,"index"])->name("posts");
Route::get("/create", [PostsController::class,"create_post"])->name("create_post");
Route::post("/save",  [PostsController::class, 'save_post'])->name("save_post");
Route::get("/edit/{id}", [PostsController::class,"edit_post"])->name("edit_post");
Route::put("/update/{id}",  [PostsController::class, 'update_post'])->name("update_post");
Route::get("/delete/{id}", [PostsController::class,"delete_post"])->name("delete_post");



});

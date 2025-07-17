<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



//User routes
Route::post("/edit_user/{id}", []);
Route::post("/delete_user/{id}", []);
Route::get("/get_user/{id}", []);
Route::get("/get_users", []);
Route::post("/register", []);
Route::post("/login", []);
Route::get("/profile", []);
Route::post("/logout", []);


//Capsule routes
Route::get("/get_capsule/{id}", []);

Route::get("/get_all_capsules", action: []);
Route::get("/get_personal_capsules", []);
Route::get("/get_pending_capsules", []);
Route::get("/get_revealed_capsules", []);

Route::get("/get_capsules_by_mood/{mood_id}", []);
Route::get("/get_capsules_by_country/{country_id}", []);

Route::post("/reveal_capsule/{id}", []);
Route::post("/add_update_capsule{id?}", []);
Route::post("/delete_capsule/{id}", []);

//Media routes
Route::post("/upload/pbg/{profile_id}", []);
Route::post("/upload/pfp/{profile_id}", []);
Route::post("/upload/capsule/image/{capsule_id}", []);
Route::post("/upload/capsule/audio/{capsule_id}", []);
Route::post("/upload/capsule/bg/{capsule_id}", []);
Route::post("/upload/capsule/color/{capsule_id}", []);

Route::post("", []);





// Route::post("/add_update_task/{id?}", [TaskController::class, "addOrUpdateTask"]);
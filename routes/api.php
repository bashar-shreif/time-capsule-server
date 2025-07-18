<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Capsule\CapsuleController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



//User routes
// Route::post("/edit_user/{id}", []);
// Route::post("/delete_user/{id}", []);
// Route::get("/get_user/{id}", []);
// Route::get("/get_user/{id?}", []);
// Route::post("/register", []);
// Route::post("/login", []);
// Route::get("/profile", []);
// Route::post("/logout", []);


Route::group(["prefix" => "v0.1"], function () {
    //Capsule routes
    Route::group(["prefix" => "capsule"], function () {
        Route::get("/{id?}", [CapsuleController::class, "getAll"]);
        Route::get("/user/{id}", [CapsuleController::class, "getByUserId"]);
        Route::get("/revealed/{user_id}", [CapsuleController::class, "getRevealed"]);
        Route::get("/pending/{user_id}", [CapsuleController::class, "getPending"]);
        Route::get("/mood/{mood_id}", [CapsuleController::class, "getByMoodId"]);
        Route::get("/country/{country_id}", [CapsuleController::class, "getByCountryId"]);
        Route::post("/add_update/{id?}", [CapsuleController::class, 'addOrUpdateCapsule']);
        Route::post("/delete/{user_id}/{id?}", [CapsuleController::class, 'deleteAll']);

        Route::group(["prefix" => "upload"], function () {
            Route::post("/image/{capsule_id}", []);
            Route::post("/audio/{capsule_id}", []);
            Route::post("/bg/{capsule_id}", []);
            Route::post("/color/{capsule_id}", []);
        });

    });

    //Profile routes
    Route::group(["prefix" => "profile"], function () {
        Route::group(["prefix" => "profile"], function () {
            // Route::post("/pbg/{profile_id}", []);
            // Route::post("/pfp/{profile_id}", []);
        });

    });
    
});



// //Export api's
// Route::post("/export/{id}", []);

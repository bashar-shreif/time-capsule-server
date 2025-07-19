<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Capsule\CapsuleController;
use App\Http\Controllers\Common\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::group(["prefix" => "v0.1"], function () {
    //Capsule routes
    Route::group(["middleware" => "auth:api"], function () {

        Route::group(["prefix" => "user"], function () {
            Route::get("/{id?}", [CapsuleController::class, "getAll"]); //get all capsules, and gets one capsule if an id is set
            Route::get("/map", [CapsuleController::class, "getAllOnMap"]); //get capsules with their

            Route::get("/user/{id}", [CapsuleController::class, "getByUserId"]); //get capsules of a certain user
            Route::get("/revealed/{user_id}", [CapsuleController::class, "getRevealed"]); //get revealed capsules of a user
            Route::get("/pending/{user_id}", [CapsuleController::class, "getPending"]); //get pending capsules of a user
            Route::get("", [CapsuleController::class, ""]); //get capsules in surprise mode

            Route::get("/mood/{mood}", [CapsuleController::class, "getByMood"]); //get capsules in a certain mood
            Route::get("/country/{country}", [CapsuleController::class, "getByCountry"]); //get capsules in a certain country
            Route::get("/ip/{ip}", [CapsuleController::class, "getByIp"]); //get capsules with a certain ip
            Route::get("/time_range/{time_range}", [CapsuleController::class,""]); // get capsules in certain time range

            Route::get("", [CapsuleController::class, ""]); //get link to share a capsule

            Route::post("/add_update/{id?}", [CapsuleController::class, 'addOrUpdateCapsule']); //add a capsule, and update if a capsule id is set
            Route::post("/delete/{user_id}/{id?}", [CapsuleController::class, 'deleteAll']); //delete a capsule for the user or delete all capsules
            Route::post('', [CapsuleController::class, '']); //reveal a capsule

            Route::group(["prefix" => "upload"], function () {
                Route::post("/image/{capsule_id}", []);
                Route::post("/audio/{capsule_id}", []);
                Route::post("/bg/{capsule_id}", []);
                Route::post("/color/{capsule_id}", []);
            });

        });

    });
    Route::group(["prefix" => "guest"], function () {
        Route::post("/login", [AuthController::class, "login"]);
        Route::post("/register", [AuthController::class, "register"]);
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

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function (){
    return view("master");
})->middleware("g");

Route::get('/registerPage',function (){
    return view("register");
})->middleware("g");

Route::get("/masterUser","UserController@fetchUser");
Route::get("/updateUser","UserController@getUserDataUpdate");
Route::get("/updateProfile","UserController@getUserDataUpdate");
Route::post("/updateUserData","UserController@updateUser");
Route::get("/deleteUser","UserController@getUserDataDelete");
Route::post("/doLogin","UserController@doLogin");
Route::post("/doRegister","UserController@doRegister");

Route::get("/home","QuestController@fetchQuestion");

Route::post("/search","QuestController@search");
Route::post("/addQuestion","QuestController@add")->middleware("m");
Route::post("/updateQuestion","QuestController@update")->middleware("m");

Route::get("/masterQuestion","QuestController@fetchQuestion")->middleware("a");
Route::get("/closeQuest","QuestController@close")->middleware("m");
Route::get("/deleteQuest","QuestController@delete")->middleware("m");
Route::get("/updateQuest","QuestController@getDataUpdate")->middleware("m");
Route::get("/detail","QuestController@getDataDetail");

Route::get("/addQuest",function (){
    return view('addQuestion')->with("topic",\App\topic::all());
})->middleware("m");

Route::get("/profile/{id}","userController@getprofileData");

Route::get("/addTopicPage",function (){
    return view("addTopic");
})->middleware("a");

Route::get("/masterTopic","TopicController@fetchTopic")->middleware("a");
Route::get("/addTopic","TopicController@add")->middleware("a");
Route::get("/updateTopic","TopicController@getDataUpdate")->middleware("a");
Route::get("/updateTopicData","TopicController@update")->middleware("a");
Route::get("/deleteTopic","TopicController@delete");

Route::get("/myQuestion","QuestController@getMy")->middleware("m");

Route::post("addAnswer","QuestController@addAnswer")->middleware("m");
Route::post("deleteAnswer/{id}","QuestController@deleteAnswer")->middleware("m");

Route::post("/sendMessage","ChatController@sendMessage")->middleware("m");
Route::get("/inbox","ChatController@getInbox")->middleware("m");
Route::get("/removeChat/{id}","ChatController@remove")->middleware("m");

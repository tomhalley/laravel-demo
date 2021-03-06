<?php

/**
 * Home Controller
 */
Route::get("/", array("as" => "home", "uses" => "HomeController@indexAction"));
Route::get("/view/{id}", "HomeController@viewImageAction");

/**
 * Image Controller
 */
Route::get("/create", "ImageController@createAction");
Route::post("/create/process", array("before" => "csrf", "uses" => "ImageController@processAction"));

Route::get("/image/{checksum}", "ImageController@imageAction");

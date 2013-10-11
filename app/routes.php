<?php

/**
 * Home Controller
 */
Route::get("/", "HomeController@indexAction");

/**
 * Image Controller
 */
Route::get("/create", array("as" => "home", "uses" => "ImageController@createAction"));
Route::post("/create/process", array("before" => "csrf", "uses" => "ImageController@processAction"));

Route::get("/image/{checksum}", "ImageController@imageAction");

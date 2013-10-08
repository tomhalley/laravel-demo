<?php

Route::get("/", "HomeController@indexAction");
Route::get("/hello/{name}", "HomeController@helloAction");
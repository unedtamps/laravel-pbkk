<?php

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;


Route::get(
    '/', function () {
        return view(
            'home', [
            "title" => "Home Page",
            ]
        );
    }
);
Route::get(
    "/about", function () {
        return view(
            "about", [
            "name" => "Unedo",
            "title" => "About Page"
            ]
        );
    }
);

Route::get(
    "/contact", function () {
        return view(
            "contact", [
            "title" => "Contact Page"
            ]
        );
    }
);

Route::get(
    "/posts", function () {
        return view(
            "posts", [
            "title" => "Blog Page",
            "posts" => Post::show()
            ]
        );
    }
);

Route::get(
    "/posts/{id}", function ($slug) {
        return view('post', ['title' => 'Single Post', 'post' => Post::get($slug)]);
    }
);



<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        /* $posts = Post::with(['author', 'category'])->get(); */
        return view(
            "posts", [
            "title" => "Blog Page",
            "posts" => Post::filter(request(['search', 'category', 'author']))->paginate(5)->withQueryString()
            ]
        );
    }
);

Route::get(
    "/posts/{post:slug}", function (Post $post) {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }
);

Route::get(
    "/authors/{user:username}", function (User $user) {
        /* $post = $user->posts->load('author', 'category'); */
        return view('posts', ['title' => 'Article by  '. $user->name, 'posts' => $user->posts]);
    }
);
Route::get(
    "/category/{category:slug}", function (Category $category) {
        /* $post = $category->posts->load('category', 'author'); */
        return view('posts', ['title'=> $category->name .  ' Article', 'posts'=> $category->posts]);
    }
);


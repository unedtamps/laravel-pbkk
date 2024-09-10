<?php

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
    "/blog", function () {
        return view(
            "blog", [
                "title" => "Blog Page",
                "articles" => [
                    [
                        "name" => "The Rise of AI in Everyday Life",
                        "author" => "Jane Smith",
                        "release_date" => "March 5, 2023",
                        "publisher" => "Tech Insights",
                        "city" => "San Francisco"
                    ],
                    [
                        "name" => "Blockchain's Role in FinTech",
                        "author" => "Michael Tan",
                        "release_date" => "June 12, 2022",
                        "publisher" => "Finance Today",
                        "city" => "New York"
                    ],
                    [
                        "name" => "The Future of Quantum Computing",
                        "author" => "Emily Johnson",
                        "release_date" => "April 18, 2024",
                        "publisher" => "Science World",
                        "city" => "London"
                    ],
                    [
                        "name" => "The Evolution of Cloud Infrastructure",
                        "author" => "David Lee",
                        "release_date" => "September 21, 2023",
                        "publisher" => "Cloud Magazine",
                        "city" => "Toronto"
                    ],
                    [
                        "name" => "Advances in Machine Learning Algorithms",
                        "author" => "Sara Ahmed",
                        "release_date" => "August 15, 2021",
                        "publisher" => "AI Weekly",
                        "city" => "Berlin"
                    ],
                    [
                        "name" => "Cybersecurity in a Digital World",
                        "author" => "Robert Clark",
                        "release_date" => "November 8, 2022",
                        "publisher" => "Secure Systems",
                        "city" => "Chicago"
                    ],
                    [
                        "name" => "Renewable Energy Trends in 2023",
                        "author" => "Isabel Green",
                        "release_date" => "July 30, 2023",
                        "publisher" => "Environmental Focus",
                        "city" => "Amsterdam"
                    ],
                    [
                        "name" => "The Role of 5G in Global Communication",
                        "author" => "John Kim",
                        "release_date" => "May 3, 2023",
                        "publisher" => "Telecom Review",
                        "city" => "Seoul"
                    ],
                    [
                        "name" => "Ethical Considerations in AI Development",
                        "author" => "Linda Martinez",
                        "release_date" => "February 19, 2022",
                        "publisher" => "Ethics & Tech",
                        "city" => "Madrid"
                    ],
                    [
                        "name" => "Urban Mobility and Smart Cities",
                        "author" => "Alex Brown",
                        "release_date" => "October 10, 2021",
                        "publisher" => "Smart City Journal",
                        "city" => "Paris"
                    ],
                ],
            ]
        );
    }
);

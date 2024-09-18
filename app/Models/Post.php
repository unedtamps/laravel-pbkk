<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post
{
    public static function show()
    {
        return [
            [
            "id" => 1,
            "name" => "The Rise of AI in Everyday Life",
            "author" => "Jane Smith",
            "release_date" => "March 5, 2023",
            "publisher" => "Tech Insights",
            "city" => "San Francisco",
            "body" => "Artificial Intelligence (AI) has become an integral part of daily life, transforming industries and enhancing personal experiences. This article explores how AI is being used in various sectors, from healthcare to entertainment, and what the future holds for AI technology.",
            "slug" => "the-rise-of-ai-in-everyday-life"
            ],
            [
            "id" => 2,
            "name" => "Blockchain's Role in FinTech",
            "author" => "Michael Tan",
            "release_date" => "June 12, 2022",
            "publisher" => "Finance Today",
            "city" => "New York",
            "body" => "Blockchain technology is revolutionizing the financial sector by providing secure, transparent, and decentralized solutions. This article dives into the current applications of blockchain in FinTech and examines how it is reshaping traditional banking, payments, and investment services.",
            "slug" => "blockchains-role-in-fintech"
            ],
            [
            "id" => 3,
            "name" => "The Future of Quantum Computing",
            "author" => "Emily Johnson",
            "release_date" => "April 18, 2024",
            "publisher" => "Science World",
            "city" => "London",
            "body" => "Quantum computing promises to tackle complex problems beyond the capabilities of classical computers. This article discusses recent advancements in quantum technology and its potential impact on fields such as cryptography, materials science, and artificial intelligence.",
            "slug" => "the-future-of-quantum-computing"
            ],
            [
            "id" => 4,
            "name" => "The Evolution of Cloud Infrastructure",
            "author" => "David Lee",
            "release_date" => "September 21, 2023",
            "publisher" => "Cloud Magazine",
            "city" => "Toronto",
            "body" => "Cloud infrastructure has undergone significant changes, offering more scalable, flexible, and secure solutions. This article reviews the evolution of cloud services, focusing on the latest trends in multi-cloud and edge computing, as well as the future of cloud-native development.",
            "slug" => "the-evolution-of-cloud-infrastructure"
            ],
            [
            "id" => 5,
            "name" => "Advances in Machine Learning Algorithms",
            "author" => "Sara Ahmed",
            "release_date" => "August 15, 2021",
            "publisher" => "AI Weekly",
            "city" => "Berlin",
            "body" => "Machine learning algorithms have evolved rapidly, enabling more accurate predictions and real-time processing. This article covers the recent developments in deep learning, reinforcement learning, and natural language processing, highlighting their applications in various industries.",
            "slug" => "advances-in-machine-learning-algorithms"
            ],
            [
            "id" => 6,
            "name" => "Cybersecurity in a Digital World",
            "author" => "Robert Clark",
            "release_date" => "November 8, 2022",
            "publisher" => "Secure Systems",
            "city" => "Chicago",
            "body" => "As our world becomes increasingly digital, cybersecurity threats are growing in both number and sophistication. This article explores the latest challenges in cybersecurity, from data breaches to ransomware attacks, and discusses strategies for building robust defenses in a digital-first world.",
            "slug" => "cybersecurity-in-a-digital-world"
            ],
            [
            "id" => 7,
            "name" => "Renewable Energy Trends in 2023",
            "author" => "Isabel Green",
            "release_date" => "July 30, 2023",
            "publisher" => "Environmental Focus",
            "city" => "Amsterdam",
            "body" => "The renewable energy sector is experiencing rapid growth as countries strive for a sustainable future. This article examines the latest trends in renewable energy, including solar, wind, and hydro power, and discusses innovations that are driving the transition to clean energy.",
            "slug" => "renewable-energy-trends-in-2023"
            ],
            [
            "id" => 8,
            "name" => "The Role of 5G in Global Communication",
            "author" => "John Kim",
            "release_date" => "May 3, 2023",
            "publisher" => "Telecom Review",
            "city" => "Seoul",
            "body" => "5G technology is transforming global communication by providing faster data speeds and more reliable connections. This article analyzes the impact of 5G on industries such as healthcare, transportation, and entertainment, and considers the challenges in building a worldwide 5G network.",
            "slug" => "the-role-of-5g-in-global-communication"
            ],
            [
            "id" => 9,
            "name" => "Ethical Considerations in AI Development",
            "author" => "Linda Martinez",
            "release_date" => "February 19, 2022",
            "publisher" => "Ethics & Tech",
            "city" => "Madrid",
            "body" => "The rapid advancement of AI technology has raised important ethical questions. This article discusses the ethical implications of AI development, including privacy concerns, bias in algorithms, and the need for regulations to ensure the responsible use of artificial intelligence.",
            "slug" => "ethical-considerations-in-ai-development"
            ],
            [
            "id" => 10,
            "name" => "Urban Mobility and Smart Cities",
            "author" => "Alex Brown",
            "release_date" => "October 10, 2021",
            "publisher" => "Smart City Journal",
            "city" => "Paris",
            "body" => "Smart cities are leveraging technology to enhance urban mobility and create more efficient, sustainable living environments. This article explores the latest developments in smart transportation, including autonomous vehicles, ride-sharing, and intelligent traffic management systems.",
            "slug" => "urban-mobility-and-smart-cities"
            ],

        ];
    }


    public static function get($slug) : array
    {
        $post = Arr::first(
            static::show(), fn($post) =>
            $post['slug'] == $slug
        );

        if (!$post) {
            abort(404, "Not Found");
        }
        return $post;
    }
}

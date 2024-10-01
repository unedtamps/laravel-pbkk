<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        /* Post::insert( */
        /*     [ */
        /*     [ */
        /*     "name" => "The Rise of AI in Everyday Life", */
        /*     "author_id" => User::factory(), */
        /*     "publisher" => "Tech Insights", */
        /*     "city" => "San Francisco", */
        /*     "body" => "Artificial Intelligence (AI) has become an integral part of daily life, transforming industries and enhancing personal experiences. This article explores how AI is being used in various sectors, from healthcare to entertainment, and what the future holds for AI technology.", */
        /*     "slug" => "the-rise-of-ai-in-everyday-life" */
        /*     ], */
        /*     [ */
        /*     "name" => "Blockchain's Role in FinTech", */
        /*     "author_id" => User::factory(), */
        /*     "publisher" => "Finance Today", */
        /*     "city" => "New York", */
        /*     "body" => "Blockchain technology is revolutionizing the financial sector by providing secure, transparent, and decentralized solutions. This article dives into the current applications of blockchain in FinTech and examines how it is reshaping traditional banking, payments, and investment services.", */
        /*     "slug" => "blockchains-role-in-fintech" */
        /*     ], */
        /*     [ */
        /*     "name" => "The Future of Quantum Computing", */
        /*     "publisher" => "Science World", */
        /*     "author_id" => User::factory(), */
        /*     "city" => "London", */
        /*     "body" => "Quantum computing promises to tackle complex problems beyond the capabilities of classical computers. This article discusses recent advancements in quantum technology and its potential impact on fields such as cryptography, materials science, and artificial intelligence.", */
        /*     "slug" => "the-future-of-quantum-computing" */
        /*     ], */
        /*     [ */
        /*     "name" => "The Evolution of Cloud Infrastructure", */
        /*     "publisher" => "Cloud Magazine", */
        /*     "author_id" => User::factory(), */
        /*     "city" => "Toronto", */
        /*     "body" => "Cloud infrastructure has undergone significant changes, offering more scalable, flexible, and secure solutions. This article reviews the evolution of cloud services, focusing on the latest trends in multi-cloud and edge computing, as well as the future of cloud-native development.", */
        /*     "slug" => "the-evolution-of-cloud-infrastructure" */
        /*     ], */
        /*     [ */
        /*     "name" => "Advances in Machine Learning Algorithms", */
        /*     "publisher" => "AI Weekly", */
        /*     "author_id" => User::factory(), */
        /*     "city" => "Berlin", */
        /*     "body" => "Machine learning algorithms have evolved rapidly, enabling more accurate predictions and real-time processing. This article covers the recent developments in deep learning, reinforcement learning, and natural language processing, highlighting their applications in various industries.", */
        /*     "slug" => "advances-in-machine-learning-algorithms" */
        /*     ], */
        /*     [ */
        /*     "name" => "Cybersecurity in a Digital World", */
        /*     "publisher" => "Secure Systems", */
        /*     "author_id" => User::factory(), */
        /*     "city" => "Chicago", */
        /*     "body" => "As our world becomes increasingly digital, cybersecurity threats are growing in both number and sophistication. This article explores the latest challenges in cybersecurity, from data breaches to ransomware attacks, and discusses strategies for building robust defenses in a digital-first world.", */
        /*     "slug" => "cybersecurity-in-a-digital-world" */
        /*     ], */
        /*     [ */
        /*     "name" => "Renewable Energy Trends in 2023", */
        /*     "publisher" => "Environmental Focus", */
        /*     "author_id" => User::factory(), */
        /*     "city" => "Amsterdam", */
        /*     "body" => "The renewable energy sector is experiencing rapid growth as countries strive for a sustainable future. This article examines the latest trends in renewable energy, including solar, wind, and hydro power, and discusses innovations that are driving the transition to clean energy.", */
        /*     "slug" => "renewable-energy-trends-in-2023" */
        /*     ], */
        /*     [ */
        /*     "name" => "The Role of 5G in Global Communication", */
        /*     "publisher" => "Telecom Review", */
        /*     "author_id" => User::factory(), */
        /*     "city" => "Seoul", */
        /*     "body" => "5G technology is transforming global communication by providing faster data speeds and more reliable connections. This article analyzes the impact of 5G on industries such as healthcare, transportation, and entertainment, and considers the challenges in building a worldwide 5G network.", */
        /*     "slug" => "the-role-of-5g-in-global-communication" */
        /*     ], */
        /*     [ */
        /*     "name" => "Ethical Considerations in AI Development", */
        /*     "publisher" => "Ethics & Tech", */
        /*     "author_id" => User::factory(), */
        /*     "city" => "Madrid", */
        /*     "body" => "The rapid advancement of AI technology has raised important ethical questions. This article discusses the ethical implications of AI development, including privacy concerns, bias in algorithms, and the need for regulations to ensure the responsible use of artificial intelligence.", */
        /*     "slug" => "ethical-considerations-in-ai-development" */
        /*     ], */
        /*     [ */
        /*     "name" => "Urban Mobility and Smart Cities", */
        /*     "publisher" => "Smart City Journal", */
        /*     "author_id" => User::factory(), */
        /*     "city" => "Paris", */
        /*     "body" => "Smart cities are leveraging technology to enhance urban mobility and create more efficient, sustainable living environments. This article explores the latest developments in smart transportation, including autonomous vehicles, ride-sharing, and intelligent traffic management systems.", */
        /*     "slug" => "urban-mobility-and-smart-cities" */
        /*     ], */

        /*     ] */
        /* ); */
        Post::factory()->count(100)->recycle(User::factory(5)->create())->recycle(Category::factory(10)->create())->create();
    }
}

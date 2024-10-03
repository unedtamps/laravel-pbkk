# Repository Laravel Mata Kuliah PBKK D (Pemrograman Berbasis Kerangka Kerja)

- Nama : Unedo Viery Kristenzky Tampubolon
- NRP : 5025221116

## Penjelasan UI
### Components
Beberapa component yang ada didalam repository ini

**1. Header**

```html
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
    </div>
</header>
```
> Header component ini digunakan untuk membuat dynamic header pada halaman web. Component ini menerima slot untuk menampilkan judul halaman.
Digunakan dengan tag `<x-header>` pada file blade.

**2. NavLink**

```html
<a {{ $attributes }}
    class="{{ $active
        ? 'bg-gray-900 text-white'
        : 'text-gray-300
            hover:bg-gray-700 hover:text-white' }} block md:inline rounded-md px-3
        py-2 text-base md:text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
```
> NavLink component ini digunakan untuk membuat dynamic link pada halaman web. Component ini menerima slot untuk menampilkan teks link dan menerima atribut untuk menentukan link aktif. Digunakan dengan tag `<x-nav-link>`pada file blade

**3. NavBar**

Component NavBar dapat dilihat pada file [resources/views/components/navbar.blade.php](resources/views/components/navbar.blade.php). Component ini digunakan untuk membuat navbar pada halaman web. Navbar menggunakan component `<x-nav-link>` yang sudah dibuat sebelumnya

- Desktop View

![Screenshot from 2024-09-11 07-00-50](https://github.com/user-attachments/assets/eda9e9db-544f-4a4a-9d5a-2dc8719ad956)
- Mobile View

![Screenshot from 2024-09-11 07-01-21](https://github.com/user-attachments/assets/97d16dde-1040-400b-ba58-abce8f1b4108)

**4. Layouts**

Layouts yang digunakan pada repository ini adalah `layout.blade.php` yang terdapat pada folder [`resources/views/components`](resources/views/components). Layout ini digunakan untuk membuat layout dasar pada halaman web. Layout ini menggunakan component `<x-header>` dan `<x-nav-bar>` yang sudah dibuat sebelumnya. Sehingga untuk setiap page dapat menggunkan layout yang sama
![image](https://github.com/user-attachments/assets/b2f6fa0b-2db7-4829-8965-8c4def69f0f7)

### Pages
Setiap Pages yang ada pada repository ini menggunakan layout yang sama yaitu `layout.blade.php` yang terdapat pada folder [`resources/views/components`](resources/views/components).Terdapat 5 page yang ada pada repository ini antara lain
- [**Home Page**](resources/views/pages/home.blade.php)
![image](https://github.com/user-attachments/assets/5f3fe5cf-66ea-4efb-b482-8453b794cb58)
- [**About Page**](resources/views/pages/about.blade.php)
![image](https://github.com/user-attachments/assets/959a94d6-e51e-42f7-ae0c-2aa9a8bbf025)
- [**Blog**](resources/views/pages/blog.blade.php)
  - Blog Page

  Menampilkan semua blog yang ada. Data blog masih manual array yang ada di
  model [post](app/Models/Post.php). Model masih dibuat manual yang memiliki 2
  method saja Antara lain `show()` dan `get($slug)`. Untuk menampikkan semua blok
  gunakan method `show()`
  ![Screenshot from 2024-09-18 10-03-11](https://github.com/user-attachments/assets/664eafd4-7e0a-4948-a400-e1162b14f414)
  
  Data diblog tidak lagi berasal dari array manual tetapi dari data factory
  kemudian di seeder. Kita dapat membuat factory dengan cara `php artisan make:factory <FacoryName>`, kemudian buat spesifikasi untuk data yang di inginkan pada Post  factory berikut adalah spesifikasinya 
  ```php 

    class PostFactory extends Factory
    {
        /**
         * Define the model's default state.
         *
         * @return array<string, mixed>
         */
        public function definition(): array
        {
            return [
                'name' => fake()->sentence(6),
                'author_id' => User::factory(),
                'category_id' => Category::factory(),
                'publisher' => fake()->company(),
                'city' => fake()->city(),
                'body' => fake()->text(),
                'slug' => Str::slug(fake()->sentence(6))
            ];
        }
    }

  ```
  atau dengan comamnd `php artisan make:Model <ModelName> -mf` akan sekaligus
  membuat model , factory dan migrasinya . Berikut ini adalah migrasi dari posts
  ```php 
    public function up(): void
    {
        Schema::create(
            'posts', function (Blueprint $table) {
                $table->id();
                $table->string("name");
                $table->foreignId('author_id')->constrained(
                    table: 'users',
                    indexName: 'post_user_id',
                );
                $table->string("publisher");
                $table->string("city");
                $table->text("body");
                $table->string("slug");
                $table->foreignId('category_id')->constrained(
                    table: 'categories',
                    indexName: 'post_category_id',
                );

                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            }
        );
    }
  ```
  - User Blog
  Sebelum menampilkan Single blog ada baiknya membuat model, factory dan
  migration
  user. berikut ini adalah spesifikasi dari migration user

  ```php
        Schema::create(
            'users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('username')->unique();
                $table->string('email')->unique();
                $table->string('password');
                $table->rememberToken();
                $table->timestamps();
            }
        );
  ```
  Factory
  ```php
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username'=>fake()->unique()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }
  ```
  Pada post kita sudah membuat foregin key ke table user sehingga dengan begitu
  kita dalam melihat post yang dibuat oleh user

  Tambahkan juga relasi user dan post pada masing masing model
  Pada user model

  ```php
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }
  ```
  Pada post model

  ```php
    public function author() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
  ```

  ![image](https://github.com/user-attachments/assets/c8982ce2-0604-4a35-b1ce-46c4ef9141fd)

  - Single Blog
  Menampilkan detail dari blog ketika user menekan tombol `Read More`. Untuk
  menampikan single post gunakan method `get($slug)` dengan parameter nya adalah
  slug dari artikel itu

![Screenshot from 2024-09-18 10-05-41](https://github.com/user-attachments/assets/f694f659-f2bf-45d6-9441-4c8c678abcde)

  - Category Blog
  Masing masing post akan memiliki kategory nya tersendiri maka dari itu pada
  table post ditambahkan foregin key one to many . Satu post memiliki satu
  category dan satu kategori banyak post. Dengan comamand yang sama di buat
  model , factory dan migration untuk kategory. Pada model tambahkan relasi
  diantara table tersebut 
  Pada model category 
  ```php 
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
  ```
  Pada model Post
  ```php
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
  ```

  Migration dari category adalah
  ```php
    public function up(): void
    {
        Schema::create(
            'categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            }
        );
    }
  ```
  Akan memuat table dengan field id,name,slug
  
  Factorynya akan menjadi seperti ini
   ```php
        public function definition(): array
        {
            return [
            'name' => fake()->sentence(rand(1, 2), false),
            'slug' => Str::slug(fake()->sentence(rand(1, 2), false))

            ];
        }
   ```


  ![image](https://github.com/user-attachments/assets/1cb57507-d7ec-4572-8f8d-d096e9999813)

- [**Contact Page**](resources/views/pages/contact.blade.php)
![image](https://github.com/user-attachments/assets/f33e68f4-ff5a-44f1-b801-3f5cd35c6372)








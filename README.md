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

    Pada aplikasi kita masih terdapat N+1 problem. N+1 problem terjadi ketika kita melakukan query terhadap data yang memiliki relasi dengan data lain. Sebagai contoh pada aplikasi kita ketika kita menampilkan post kita juga menampilkan nama author dari post tersebut. Dengan cara ini kita melakukan query terhadap table user sebanyak jumlah post yang ada. Untuk mengatasi hal ini kita dapat menggunakan eager loading. Eager loading adalah cara untuk mengambil data yang memiliki relasi dengan data lain sekaligus. Dengan cara ini kita hanya melakukan query sebanyak 2 kali yaitu untuk mengambil data post dan data user. Berikut ini adalah contoh penggunaan eager loading pada aplikasi kita. Didalam laravel hal ini bisa diselaikan di dalam model kita dengan cara menambahkan kode ini kedalam model post
  ```php 
    protected $with = ['author' , 'category'];
  ```

  Kita juga dapat melidungi aplikasi laravel kita agar menggunakan eager loading
  secara devalud dengan menambahkan kode ini di `AppServiceProviders.php`

  ```php 
    public function boot(): void
    {
        Model::preventLazyLoading();
    }
  ```
  Kemudian kita refactor kode blade agar tampilan dari post blog lebih baik.
  Untuk redesign, kita menggunakan platform flowbite yang menyediakan component
  component yang dapat kita gunakan . Berikut ini adalah hasil akhirnya


  ![image](https://github.com/user-attachments/assets/53886965-6467-4cd7-894c-0189c6489fa0)

  Kemudian kita tambahkan juga fitur search pada blog yang akan mencari
  berdasarkan judul blocknya. Untuk UI searchnya bisa didapatkan di flowbite
  juga. Untuk mendapatkan judul yang igin di cari dari request kita bisa
  melakukannya di level model dengan menggunakan  query scope. Berikut ini
  adalah kodenya 
  ```php 
    public  function scopeFilter(Builder $query, array $filters) :void
    {
        $query->when(
            $filters['search'] ?? false, fn ($query, $search) =>
            $query->where('name', 'like', '%' .$search. '%')
        );

        $query->when(
            $filters['category'] ?? false, fn ($query, $category) =>
            $query->whereHas('category', fn ($query) => $query->where('slug', 'like', '%'. $category .'%'))
        );

        $query->when(
            $filters['author'] ?? false, fn ($query, $author) =>
            $query->whereHas('author', fn ($query) => $query->where('username', 'like', '%'. $author .'%'))
        );
    }
  ```
  ```php
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
  ```
  Kita hanya perlu melakukan passing request mana yang akan kita filter melalui
  modelnya. Dengan begini kita dapat mencari judul dari blog ketika kita berada
  di halaman post kategory tertentu atau laman post dengan user tertentu.
  Sehingga hasilnya bukanlah kategory atau user lain

  Setelah itu buat juga pagination untuk membagi bagi hasil query yang
  dihasilkan oleh database jangan lupa tambahkan `withQueryString()` agar hasil
  pagination pada kategory tertentu atau user tentu , query stringnya di append
  ke URL sehingga hasilnya sesuai. Berikut ini tampilan dengan pagination

  ![image](https://github.com/user-attachments/assets/bd88ef23-7c78-4d56-9f7c-8d2d8ea538fd)


  ```php
    @if (request('category'))
    <input type="hidden" name="category" value="{{ request('category') }}">
    @endif

    @if (request('author'))
    <input type="hidden" name="author" value="{{ request('author') }}">
    @endif
   ```

   Jangan lupa tambahkan hidden input agar saat berada di post berdasarkan
   author atau category , nilai parameter ikut difilter

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

  Terdapat redesign UI pada single blog agar terlihat lebih menarik
  
  ![image](https://github.com/user-attachments/assets/c3ae4622-a7ed-45d4-af8a-a8433900c3aa)

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


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

Component NavBar dapat dilihat pada file [resources/views/components/nav-bar.blade.php](resources/views/components/nav-bar.blade.php). Component ini digunakan untuk membuat navbar pada halaman web. Navbar menggunakan component `<x-nav-link>` yang sudah dibuat sebelumnya

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
  model [post]('app/Models/Post.php'). Model masih dibuat manual yang memiliki 2
  method saja Antara lain `show()` dan `get($slug)`. Untuk menampikkan semua blok
  gunakan method `show()`
  ![Screenshot from 2024-09-18 10-03-11](https://github.com/user-attachments/assets/664eafd4-7e0a-4948-a400-e1162b14f414)
  - Single Blog

  Menampilkan detail dari blog ketika user menekan tombol `Read More`. Untuk
  menampikan single post gunakan method `get($slug)` dengan parameter nya adalah
  slug dari artikel itu
![Screenshot from 2024-09-18 10-05-41](https://github.com/user-attachments/assets/f694f659-f2bf-45d6-9441-4c8c678abcde)

- [**Contact Page**](resources/views/pages/contact.blade.php)
![image](https://github.com/user-attachments/assets/f33e68f4-ff5a-44f1-b801-3f5cd35c6372)








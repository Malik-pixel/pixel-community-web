<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/courses', function () {
    return view('courses');
})->middleware(['auth', 'verified'])->name('courses');

Route::get('/courses/detail/{slug?}', function ($slug = 'ui-ux') {
    $courses = [
        'ui-ux' => [
            'title' => 'Fundamental UI/UX Design',
            'author' => 'Alex Johnson',
            'image' => '/images/course_uiux_1790558583074.jpg',
            'badge' => 'Pemula',
            'category' => 'Desain',
            'rating' => '4.9',
            'reviews' => '245 ulasan',
            'students' => '1.200',
            'duration' => '20j Total',
            'progress' => 65,
            'desc' => 'Kuasai dasar-dasar desain User Interface (UI) dan User Experience (UX). Kelas fundamental yang komprehensif ini menjembatani kesenjangan antara desain estetika dan penyelesaian masalah fungsional. Anda akan belajar cara membuat produk digital yang tidak hanya indah tetapi juga intuitif, dapat diakses, dan berpusat pada pengguna, mempersiapkan Anda untuk berkarir dalam desain produk modern.',
        ],
        'react' => [
            'title' => 'Fullstack React & Node.js Masterclass',
            'author' => 'Michael Chen, Sr. Engineer',
            'image' => '/images/course_react_1790558572624.jpg',
            'badge' => 'Menengah',
            'category' => 'Web Dev',
            'rating' => '4.9',
            'reviews' => '3.4k ulasan',
            'students' => '4.500',
            'duration' => '35j 15m',
            'progress' => 12,
            'desc' => 'Pelajari cara membangun aplikasi web modern berskala penuh dengan tumpukan teknologi MERN (MongoDB, Express, React, Node.js). Anda akan membangun beberapa proyek dunia nyata dari awal hingga publikasi.',
        ],
        'growth' => [
            'title' => 'Strategi Growth Hacking & Analitik Digital',
            'author' => 'Elena Rodriguez, CMO',
            'image' => '/images/course_marketing_1790558594033.jpg',
            'badge' => 'Lanjutan',
            'category' => 'Bisnis',
            'rating' => '4.7',
            'reviews' => '876 ulasan',
            'students' => '2.100',
            'duration' => '8j 45m',
            'progress' => 100,
            'desc' => 'Tingkatkan pertumbuhan pengguna produk Anda secara eksponensial. Kelas ini fokus pada strategi, metrik AARRR, dan analitik data untuk mencapai pertumbuhan bisnis yang berkelanjutan.',
        ],
        'python' => [
            'title' => 'Python untuk Data Science & Machine Learning',
            'author' => 'Dr. Ahmad Rizky, PhD',
            'image' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=800&q=80',
            'badge' => 'Menengah',
            'category' => 'Data Science',
            'rating' => '4.8',
            'reviews' => '2.1k ulasan',
            'students' => '3.200',
            'duration' => '28j 00m',
            'progress' => 0,
            'desc' => 'Pelajari bahasa pemrograman Python dari dasar hingga mahir, dengan fokus pada pengolahan data (Data Science) dan algoritma Machine Learning. Kelas ini merangkum dasar-dasar statistik, visualisasi data, hingga implementasi model prediksi.',
        ],
        'flutter' => [
            'title' => 'Mobile App Development dengan Flutter',
            'author' => 'Budi Santoso, Mobile Engineer',
            'image' => '/images/course_flutter.jpg',
            'badge' => 'Pemula',
            'category' => 'Mobile Dev',
            'rating' => '4.8',
            'reviews' => '1.5k ulasan',
            'students' => '2.800',
            'duration' => '21j 00m',
            'progress' => 0,
            'desc' => 'Belajar membuat aplikasi mobile native untuk iOS dan Android menggunakan framework Flutter. Anda akan membangun aplikasi e-commerce dari nol hingga siap dipublish ke Play Store.',
        ],
        'digital-marketing' => [
            'title' => 'Digital Marketing: SEO & SEM Mastery',
            'author' => 'Diana Putri, SEO Specialist',
            'image' => 'https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?w=800&q=80',
            'badge' => 'Pemula',
            'category' => 'Bisnis',
            'rating' => '4.6',
            'reviews' => '950 ulasan',
            'students' => '1.500',
            'duration' => '10j 45m',
            'progress' => 0,
            'desc' => 'Kuasai teknik optimasi mesin pencari (SEO) dan pemasaran berbayar (SEM) untuk meningkatkan traffic website. Pelajari riset keyword, on-page SEO, dan Google Ads secara komprehensif.',
        ]
    ];
    
    $course = $courses[$slug] ?? $courses['ui-ux'];

    return view('course-detail', compact('course', 'slug'));
})->middleware(['auth', 'verified'])->name('courses.detail');

Route::get('/learn/{slug?}', function ($slug = 'ui-ux') {
    return view('learn');
})->middleware(['auth', 'verified'])->name('learn');

Route::get('/videos', function () {
    return view('videos');
})->middleware(['auth', 'verified'])->name('videos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

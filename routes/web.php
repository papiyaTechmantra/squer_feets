<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\{IndexController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [IndexController::class, 'index'])->name('front.index');
Route::get('/contact-us', [IndexController::class, 'contact_us'])->name('front.contact_us');
Route::get('/sectors', [IndexController::class, 'sectors'])->name('front.sectors');
Route::get('/property-buying', [IndexController::class, 'property_buying'])->name('front.property_buying');
Route::get('/property-selling', [IndexController::class, 'property_selling'])->name('front.property_selling');
Route::get('/property-leasing', [IndexController::class, 'property_leasing'])->name('front.property_leasing');
Route::get('/why-us', [IndexController::class, 'why_us'])->name('front.why_us');
Route::get('/about-us', [IndexController::class, 'about_us'])->name('front.about_us');
Route::get('/blogs', [IndexController::class, 'blog_list'])->name('front.blogs');
Route::get('/blogs/{id}', [IndexController::class, 'blog_details'])->name('front.blogs.details');
Route::get('/news', [IndexController::class, 'news_list'])->name('front.news');
Route::get('/news/{id}', [IndexController::class, 'news_details'])->name('front.news.details');
Route::post('/subscribers-store', [IndexController::class, 'subscribers_store'])->name('front.subscribers_store');
Route::get('property/listing', [IndexController::class, 'property_listing'])->name('front.property.listing');
Route::get('property/listing/{city}', [IndexController::class, 'property_listing_city'])->name('front.property.listing.city');
Route::get('property/details/{slug}/uid-{uid?}', [IndexController::class, 'property_details'])->name('front.property.details');
Route::post('/lead', [IndexController::class, 'store_lead'])->name('front.store.lead');
Route::get('/contact-us', [IndexController::class, 'contact_us'])->name('front.contact_us');
Route::get('/privacy-policy', [IndexController::class, 'privacy_policy'])->name('front.privacy_policy');
Route::get('/terms-conditions', [IndexController::class, 'terms_conditions'])->name('front.terms_conditions');

require 'admin.php';

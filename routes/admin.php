<?php

use App\Http\Controllers\Admin\{LoginController,BannerController,LocalityController,
    AmenityController,PropertyController,BlogController,LeadController,NewsController,ReviewController,ParkingController,SubscribersController,FlatSizeController,PropertyGroupController,FloorPlanController};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::auth();

        Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
        Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login.post');

        Route::get('/login', [LoginController::class, 'showUserLoginForm'])->name('user.login');
        Route::post('/login', [LoginController::class, 'userlogin'])->name('user.login.post');

        Route::get('registration', [LoginController::class, 'userregister'])->name('user.login.userregister');
        Route::post('registration', [LoginController::class, 'registration'])->name('user.login.registration');

        Route::get('coupon/count', [OrderController::class, 'Coupon_count_by_user'])->name('Coupon_count_by_user');

        /** admin password reset routes **/
        Route::any('/forgot-password', [LoginController::class, 'forgotPassword'])->name('forgotPassword');
        Route::post('/send-password-link', [LoginController::class, 'sendResetLink'])->name('sendResetLink');
        Route::any('/reset-password/{token}', [LoginController::class, 'resetPassword'])->name('resetPassword');
        Route::get('/register', 'Admin\RegisterController@showRegistrationForm')->name('admin.register')->middleware('hasInvitation');
        Route::post('/register', 'Admin\RegisterController@register')->name('admin.register.post');
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

        Route::group(['middleware' => 'auth'], function(){
        
            Route::get('admin/dashboard', [LoginController::class, 'dashboard'])->name('admin.dashboard');

            Route::get('admin/banner', [BannerController::class, 'index'])->name('admin.banner');
            Route::get('admin/banner/add', [BannerController::class, 'create'])->name('admin.banner.add');
            Route::post('admin/banner/add', [BannerController::class, 'store'])->name('admin.banner.store');
            Route::get('admin/banner/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
            Route::get('admin/banner/details/{id}', [BannerController::class, 'show'])->name('admin.banner.show');
            Route::post('admin/banner/update', [BannerController::class, 'update'])->name('admin.banner.update');
            Route::get('admin/banner/delete/{id}', [BannerController::class, 'destroy'])->name('admin.banner.delete');

            Route::get('admin/locality', [LocalityController::class, 'index'])->name('admin.locality');
            Route::get('admin/locality/add', [LocalityController::class, 'create'])->name('admin.locality.add');
            Route::post('admin/locality/add', [LocalityController::class, 'store'])->name('admin.locality.store');
            Route::get('admin/locality/edit/{id}', [LocalityController::class, 'edit'])->name('admin.locality.edit');
            Route::get('admin/locality/details/{id}', [LocalityController::class, 'show'])->name('admin.locality.show');
            Route::post('admin/locality/update', [LocalityController::class, 'update'])->name('admin.locality.update');
            Route::get('admin/locality/delete/{id}', [LocalityController::class, 'destroy'])->name('admin.locality.delete');

            Route::get('admin/amenity', [AmenityController::class, 'index'])->name('admin.amenity');
            Route::get('admin/amenity/add', [AmenityController::class, 'create'])->name('admin.amenity.add');
            Route::post('admin/amenity/add', [AmenityController::class, 'store'])->name('admin.amenity.store');
            Route::get('admin/amenity/edit/{id}', [AmenityController::class, 'edit'])->name('admin.amenity.edit');
            Route::get('admin/amenity/details/{id}', [AmenityController::class, 'show'])->name('admin.amenity.show');
            Route::post('admin/amenity/update', [AmenityController::class, 'update'])->name('admin.amenity.update');
            Route::get('admin/amenity/delete/{id}', [AmenityController::class, 'destroy'])->name('admin.amenity.delete');

            Route::get('admin/property', [PropertyController::class, 'index'])->name('admin.property');
            Route::get('admin/property/add', [PropertyController::class, 'create'])->name('admin.property.add');
            Route::post('admin/property/add', [PropertyController::class, 'store'])->name('admin.property.store');
            Route::get('admin/property/edit/{id}', [PropertyController::class, 'edit'])->name('admin.property.edit');
            Route::get('admin/property/details/{id}', [PropertyController::class, 'show'])->name('admin.property.show');
            Route::post('admin/property/update', [PropertyController::class, 'update'])->name('admin.property.update');
            Route::get('admin/property/delete/{id}', [PropertyController::class, 'destroy'])->name('admin.property.delete');

            Route::get('admin/property/image/{id}', [PropertyController::class, 'property_image'])->name('admin.property.image');
            Route::post('admin/property/image/add/', [PropertyController::class, 'property_image_store'])->name('admin.property.image.store');
            Route::get('admin/property/image/delete/{id}', [PropertyController::class, 'property_image_destroy'])->name('admin.property.image.delete');

            Route::get('admin/property/variation/{id}', [PropertyController::class, 'property_variation'])->name('admin.property.variation');
            Route::get('admin/property/variation/add/{id}', [PropertyController::class, 'create_property_variation'])->name('admin.property.variation.add');
            Route::post('admin/property/variation/add/', [PropertyController::class, 'property_variation_store'])->name('admin.property.variation.store');
            Route::get('admin/property/variation/edit/{id}', [PropertyController::class, 'property_variation_edit'])->name('admin.property.variation.edit');
            Route::get('admin/property/variation/delete/{id}', [PropertyController::class, 'property_variation_destroy'])->name('admin.property.variation.delete');

            Route::get('admin/blog', [BlogController::class, 'index'])->name('admin.blog');
            Route::get('admin/blog/add', [BlogController::class, 'create'])->name('admin.blog.add');
            Route::post('admin/blog/add', [BlogController::class, 'store'])->name('admin.blog.store');
            Route::get('admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
            Route::get('admin/blog/details/{id}', [BlogController::class, 'show'])->name('admin.blog.show');
            Route::post('admin/blog/update', [BlogController::class, 'update'])->name('admin.blog.update');
            Route::get('admin/blog/delete/{id}', [BlogController::class, 'destroy'])->name('admin.blog.delete');

            Route::get('admin/news', [NewsController::class, 'index'])->name('admin.news');
            Route::get('admin/news/add', [NewsController::class, 'create'])->name('admin.news.add');
            Route::post('admin/news/add', [NewsController::class, 'store'])->name('admin.news.store');
            Route::get('admin/news/edit/{id}', [NewsController::class, 'edit'])->name('admin.news.edit');
            Route::get('admin/news/details/{id}', [NewsController::class, 'show'])->name('admin.news.show');
            Route::post('admin/news/update', [NewsController::class, 'update'])->name('admin.news.update');
            Route::get('admin/news/delete/{id}', [NewsController::class, 'destroy'])->name('admin.news.delete');

            Route::get('admin/lead', [LeadController::class, 'index'])->name('admin.lead');
            Route::get('admin/lead/add', [LeadController::class, 'create'])->name('admin.lead.add');
            Route::post('admin/lead/add', [LeadController::class, 'store'])->name('admin.lead.store');
            Route::get('admin/lead/edit/{id}', [LeadController::class, 'edit'])->name('admin.lead.edit');
            Route::get('admin/lead/details/{id}', [LeadController::class, 'show'])->name('admin.lead.show');
            Route::post('admin/lead/update', [LeadController::class, 'update'])->name('admin.lead.update');
            Route::get('admin/lead/delete/{id}', [LeadController::class, 'destroy'])->name('admin.lead.delete');

            Route::get('admin/review', [ReviewController::class, 'index'])->name('admin.review');
            Route::get('admin/review/add', [ReviewController::class, 'create'])->name('admin.review.add');
            Route::post('admin/review/add', [ReviewController::class, 'store'])->name('admin.review.store');
            Route::get('admin/review/edit/{id}', [ReviewController::class, 'edit'])->name('admin.review.edit');
            Route::get('admin/review/details/{id}', [ReviewController::class, 'show'])->name('admin.review.show');
            Route::post('admin/review/update', [ReviewController::class, 'update'])->name('admin.review.update');
            Route::get('admin/review/delete/{id}', [ReviewController::class, 'destroy'])->name('admin.review.delete');

            Route::get('admin/subscribers', [SubscribersController::class, 'index'])->name('admin.subscribers');
            Route::get('admin/subscribers/add', [SubscribersController::class, 'create'])->name('admin.subscribers.add');
            Route::post('admin/subscribers/add', [SubscribersController::class, 'store'])->name('admin.subscribers.store');
            Route::get('admin/subscribers/edit/{id}', [SubscribersController::class, 'edit'])->name('admin.subscribers.edit');
            Route::get('admin/subscribers/details/{id}', [SubscribersController::class, 'show'])->name('admin.subscribers.show');
            Route::post('admin/subscribers/update', [SubscribersController::class, 'update'])->name('admin.subscribers.update');
            Route::get('admin/subscribers/delete/{id}', [SubscribersController::class, 'destroy'])->name('admin.subscribers.delete');


            Route::get('admin/parking', [ParkingController::class, 'index'])->name('admin.parking');
            Route::get('admin/parking/add', [ParkingController::class, 'create'])->name('admin.parking.add');
            Route::post('admin/parking/add', [ParkingController::class, 'store'])->name('admin.parking.store');
            Route::get('admin/parking/edit/{id}', [ParkingController::class, 'edit'])->name('admin.parking.edit');
            Route::get('admin/parking/details/{id}', [ParkingController::class, 'show'])->name('admin.parking.show');
            Route::post('admin/parking/update', [ParkingController::class, 'update'])->name('admin.parking.update');
            Route::get('admin/parking/delete/{id}', [ParkingController::class, 'destroy'])->name('admin.parking.delete');

            Route::get('admin/flatsize', [FlatSizeController::class, 'index'])->name('admin.flatsize');
            Route::get('admin/flatsize/add', [FlatSizeController::class, 'create'])->name('admin.flatsize.add');
            Route::post('admin/flatsize/add', [FlatSizeController::class, 'store'])->name('admin.flatsize.store');
            Route::get('admin/flatsize/edit/{id}', [FlatSizeController::class, 'edit'])->name('admin.flatsize.edit');
            Route::get('admin/flatsize/details/{id}', [FlatSizeController::class, 'show'])->name('admin.flatsize.show');
            Route::post('admin/flatsize/update', [FlatSizeController::class, 'update'])->name('admin.flatsize.update');
            Route::get('admin/flatsize/delete/{id}', [FlatSizeController::class, 'destroy'])->name('admin.flatsize.delete');
        
            Route::get('admin/propertygroup', [PropertyGroupController::class, 'index'])->name('admin.propertygroup');
            Route::get('admin/propertygroup/add', [PropertyGroupController::class, 'create'])->name('admin.propertygroup.add');
            Route::post('admin/propertygroup/add', [PropertyGroupController::class, 'store'])->name('admin.propertygroup.store');
            Route::get('admin/propertygroup/edit/{id}', [PropertyGroupController::class, 'edit'])->name('admin.propertygroup.edit');
            Route::get('admin/propertygroup/details/{id}', [PropertyGroupController::class, 'show'])->name('admin.propertygroup.show');
            Route::post('admin/propertygroup/update', [PropertyGroupController::class, 'update'])->name('admin.propertygroup.update');
            Route::get('admin/propertygroup/delete/{id}', [PropertyGroupController::class, 'destroy'])->name('admin.propertygroup.delete');

            Route::get('admin/floorplan', [FloorPlanController::class, 'index'])->name('admin.floorplan');
            Route::get('admin/floorplan/add', [FloorPlanController::class, 'create'])->name('admin.floorplan.add');
            Route::post('admin/floorplan/add', [FloorPlanController::class, 'store'])->name('admin.floorplan.store');
            Route::get('admin/floorplan/edit/{id}', [FloorPlanController::class, 'edit'])->name('admin.floorplan.edit');
            Route::get('admin/floorplan/details/{id}', [FloorPlanController::class, 'show'])->name('admin.floorplan.show');
            Route::post('admin/floorplan/update', [FloorPlanController::class, 'update'])->name('admin.floorplan.update');
            Route::get('admin/floorplan/delete/{id}', [FloorPlanController::class, 'destroy'])->name('admin.floorplan.delete');

        
        });
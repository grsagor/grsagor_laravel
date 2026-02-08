<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ExperienceController;
use App\Http\Controllers\Backend\ProjectController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SkillController;
use App\Http\Controllers\Backend\ContactController as BackendContactController;
use App\Http\Controllers\Frontend\ContactController;
use Illuminate\Support\Facades\Route;

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('front.index');                      // Home page
    Route::get('/about', 'about')->name('front.about');                // About page
    Route::get('/projects', 'projects')->name('front.projects');       // Projects page
    Route::get('/projects/{id}/details', 'projectDetails')->name('front.projects.details'); // Project details AJAX
    Route::get('/blog', 'blog')->name('front.blogs');                   // Blog listing
    Route::get('/blog/{slug}', 'blogShow')->name('front.blog.show');   // Single blog post
    Route::get('/contact', 'contact')->name('front.contact');          // Contact page
    Route::post('/contact', 'contactSubmit')->name('front.contact.submit'); // Contact form submit
    Route::get('/privacy-policy', 'privacyPolicy')->name('front.privacy'); // Privacy Policy
    Route::get('/terms-of-service', 'termsOfService')->name('front.terms'); // Terms of Service
    Route::get('/sitemap.xml', 'sitemap')->name('front.sitemap'); // Sitemap
    Route::get('/old-home', 'indexOld')->name('front.index.old');      // Optional old homepage
});
Route::controller(ContactController::class)->group(function () {
    Route::get('/captcha', 'generateCaptcha')->name('front.generate.captcha');
    Route::post('/contact', 'send')->name('front.contact.send');
});

Route::controller(FrontendController::class)->group(function(){
    Route::get('reset-password', 'forgotPassword');
    Route::any('reset-otp-send', 'resetOtpSend');
    Route::any('change-password', 'otp');
    Route::get('login', 'login')->name('login');
    Route::get('registration', 'registration');
});



// Auth route
Route::post('login-post', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('signup', [LoginController::class, 'signup'])->name('registration.post');

// admin route start
Route::get('/admin', function () {return view('backend.auth.login');})->name('admin');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('profile', [LoginController::class, 'adminProfile'])->name('admin.profile');
    Route::post('profile/update', [LoginController::class, 'adminProfileUpdate'])->name('admin.profile.update');
    Route::get('profile/setting', [LoginController::class, 'adminProfileSetting'])->name('admin.profile.setting');
    Route::post('profile/change/password', [LoginController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin.index');

    Route::group(['prefix' => '/user'], function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user');
        Route::get('/get/list', [UserController::class, 'getList']);
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::any('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::post('/change', [UserController::class, 'changePassword'])->name('admin.user.changepassword');
    });

    Route::group(['prefix' => '/role'], function () {
        Route::get('/generate/right/{mdule_name}', [RoleController::class, 'generate'])->name('admin.role.right.generate');
        Route::get('/', [RoleController::class, 'index'])->name('admin.role');
        Route::get('/get/role/list', [RoleController::class, 'getRoleList']);
        Route::get('/create', [RoleController::class, 'create'])->name('admin.role.create');
        Route::post('/store', [RoleController::class, 'store'])->name('admin.role.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
        Route::any('/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');
        Route::get('/right', [RoleController::class, 'right'])->name('admin.role.right');
        Route::get('/get/right/list', [RoleController::class, 'getRightList']);
        Route::post('/right/store', [RoleController::class, 'rightStore'])->name('admin.role.right.store');
        Route::get('/right/edit/{id}', [RoleController::class, 'editRight'])->name('admin.role.right.edit');
        Route::any('/right/update/{id}', [RoleController::class, 'roleRightUpdate'])->name('admin.role.right.update');
        Route::get('/right/delete/{id}', [RoleController::class, 'rightDelete'])->name('admin.role.right.delete');
    });

    Route::group(['prefix' => '/setting'], function () {
        Route::get('/general', [SettingController::class, 'general'])->name('admin.setting.general');
        Route::get('/static-content', [SettingController::class, 'staticContent'])->name('admin.setting.static.content');
        Route::get('/legal-content', [SettingController::class, 'legalContent'])->name('admin.setting.legal.content');
        Route::post('/update', [SettingController::class, 'update'])->name('admin.setting.update');
        Route::get('/change-language', [SettingController::class, 'changeLanguage'])->name('admin.setting.change.language');
    });

    Route::controller(SkillController::class)->prefix('skills')->name('admin.skills.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });
    Route::controller(ProjectController::class)->prefix('projects')->name('admin.projects.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });
    Route::controller(ReviewController::class)->prefix('reviews')->name('admin.reviews.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });
    Route::controller(BlogController::class)->prefix('blogs')->name('admin.blogs.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });
    Route::controller(ExperienceController::class)->prefix('experiences')->name('admin.experiences.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });
    Route::controller(BackendContactController::class)->prefix('contacts')->name('admin.contacts.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/list', 'list')->name('list');
        Route::get('/view/{id}', 'view')->name('view');
        Route::put('/mark-read/{id}', 'markRead')->name('mark-read');
        Route::put('/mark-unread/{id}', 'markUnread')->name('mark-unread');
        Route::delete('/delete/{id}', 'delete')->name('delete');
    });
});

Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');
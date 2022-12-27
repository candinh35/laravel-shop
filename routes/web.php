<?php

use App\Http\Controllers\Admin\BackgroundController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\CheckOutController;
use App\Http\Controllers\Client\ClientLoginController;
use App\Http\Controllers\Client\ContactController as ClientContactController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\OrderDetailController;
use App\Http\Controllers\Client\BlogController as ClientBlogController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Client\BlogCommentController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\LoginContrller;
use Illuminate\Support\Facades\Route;
use  Stichoza\GoogleTranslate\GoogleTranslate;
use Laravel\Socialite\Facades\Socialite;

Route::get('translate', [LoginContrller::class, 'loginGoogle']);

Route::get('login', [LoginContrller::class, 'index'])->name('login');
Route::get('register', [LoginContrller::class, 'create'])->name('register');
Route::post('register/store', [LoginContrller::class, 'store'])->name('register_store');
Route::post('login/mana', [LoginContrller::class, 'login'])->name('checkLogin');
Route::get('admin-logout', [LoginContrller::class, 'logout'])->name('admin.logout');

// login bang facebook
Route::get('/auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('/getInfo-facebook/{social}', [SocialController::class, 'getInfo'])->name('login-face');
Route::get('/checkInfo-facebook/{social}', [SocialController::class, 'checkInfo']);

Route::get('/chinh-sach-rieng-tu', function (){
    return '<h1>chinh sach rieng tu</h1>';
});


//thanh toán bằng momo

Route::post('/momo_payment', [CheckOutController::class, 'momo_payment'])->name('momo_payment');

//  Quản lý Admin
Route::middleware('auth')->group(function (){

    Route::get('dashboard', [DashboardController::class ,'index'])->name('dashboard');


    Route::middleware('decentralization')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('menu', MenuController::class);
        Route::resource('brand', BrandController::class);
        Route::resource('background', BackgroundController::class);
        Route::resource('banner', BannerController::class);
        Route::resource('product', ProductController::class);
        Route::resource('order', OrderController::class);
        Route::resource('blog', BlogController::class);
        Route::resource('admin/contact', ContactController::class);
        Route::resource('role', RoleController::class);
        Route::resource('permission', PermissionController::class);


        Route::get('orderPdf/{checkout_code}', [OrderController::class, 'print_order'])->name('order.inPdf');
    });
});

// Hiển thị giao diện

Route::get('/', [HomeController::class, 'index'])->name('Home');

Route::prefix('shop')->group(function (){
    Route::get('/', [ShopController::class, 'index'])->name('Shop');
    Route::get('/{category_name}', [ShopController::class, 'category'])->name('categoryName');
    Route::get('/color/{color_name}', [ShopController::class, 'colors'])->name('colorName');
});

// Bình luận sản phẩm

Route::post('product/addComment', [\App\Http\Controllers\Admin\Api\ProductCommentController::class, 'addForm']);
Route::post('product/comment/{id}', [\App\Http\Controllers\Admin\Api\ProductCommentController::class, 'index']);

Route::get('/product/detail/{id}', [ProductDetailController::class, 'index'])->name('product_detail');

// Hiện thị giỏ hàng
Route::prefix('cart')->group(function (){
    Route::get('/', [CartController::class, 'index'])->name('product_cart');
    Route::post('/add', [CartController::class, 'add'])->name('product_cart_add');
    Route::get('/update', [CartController::class, 'update'])->name('product_cart_update');
    Route::get('/delete/{rowId}', [CartController::class, 'delete'])->name('product_cart_delete');
    Route::get('/destroy', [CartController::class, 'destroy'])->name('product_cart_destroy');
});


// hiện thị phần CHeck out
Route::prefix('checkout')->group(function (){
    Route::get('/', [CheckOutController::class, 'index'])->name('product_cart_checkout');
    Route::post('/', [CheckOutController::class, 'addOrder'])->name('addOrder');
    Route::get('/vnPayCheck', [CheckOutController::class, 'vnPayCheck']);
});




Route::prefix('client')->group(function (){
    Route::get('/login', [ClientLoginController::class, 'index'])->name('client_login');
    Route::post('/login/check', [ClientLoginController::class, 'login'])->name('client_check_login');
    Route::get('/logout', [ClientLoginController::class, 'logout'])->name('client_check_logout');

    Route::post('/register',[ClientLoginController::class, 'register'])->name('client_register');
});

Route::get('/about', [HomeController::class, 'index'])->name('About Us');
Route::post('postComment', [BlogCommentController::class, 'add'])->name('postComment');
Route::get('deleteComment/{id}', [BlogCommentController::class, 'delete'])->name('deleteComment');


// info Order
Route::prefix('orderDetail')->group(function (){
    Route::get('/{user_id}', [OrderDetailController::class, 'index'])->name('orderDetail');
    Route::get('/update/{order_id}', [OrderDetailController::class, 'update'])->name('updateOrder');
});


Route::prefix('blogs')->group(function (){
    Route::get('/', [ClientBlogController::class, 'index'])->name('Blogs');
    Route::get('/detail/{id}', [ClientBlogController::class, 'detail'])->name('blog_detail');
});


Route::prefix('contact')->group(function (){
    Route::get('/', [ClientContactController::class, 'index'])->name('Contact Us');
   Route::post('/feedback', [ClientContactController::class, 'feedback'])->name('feedback');
});


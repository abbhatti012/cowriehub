<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\PaymentController;


Auth::routes();

//Fron Routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
Route::get('/product/{any}', [App\Http\Controllers\HomeController::class, 'product'])->name('product');
Route::get('/cart', [App\Http\Controllers\HomeController::class, 'cart'])->name('cart');
Route::get('/wishlist', [App\Http\Controllers\HomeController::class, 'wishlist'])->name('wishlist')->middleware('auth');;
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about_us'])->name('about-us');
Route::get('/authors-list', [App\Http\Controllers\HomeController::class, 'authors_list'])->name('authors-list');
Route::get('/author-detail/{num}', [App\Http\Controllers\HomeController::class, 'author_detail'])->name('author-detail');
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contact_us'])->name('contact-us');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');
Route::get('/pricing-table', [App\Http\Controllers\HomeController::class, 'pricing_table'])->name('pricing-table');
Route::get('/terms-conditions', [App\Http\Controllers\HomeController::class, 'terms_conditions'])->name('terms-conditions');
Route::get('/comming-soon', [App\Http\Controllers\HomeController::class, 'comming_soon'])->name('comming-soon');
Route::get('/404', [App\Http\Controllers\HomeController::class, 'error'])->name('404');
Route::get('/blog', [App\Http\Controllers\HomeController::class, 'blog'])->name('blog');
Route::get('/blog-detail', [App\Http\Controllers\HomeController::class, 'blog_detail'])->name('blog-detail');
Route::get('/buy-marketing-package/{any}', [App\Http\Controllers\HomeController::class, 'buy_marketing_package'])->name('buy-marketing-package');
Route::post('/add-marketing-orders', [App\Http\Controllers\HomeController::class, 'add_marketing_orders'])->name('add-marketing-orders');
Route::post('/add-review', [App\Http\Controllers\HomeController::class, 'add_review'])->name('add-review');

Route::post('/before-payment', [App\Http\Controllers\PaymentController::class, 'before_payment'])->name('before-payment');

Route::post('/add-to-cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('add-to-cart');
Route::post('/add-to-wishlist', [App\Http\Controllers\CartController::class, 'add_to_wishlist'])->name('add-to-wishlist');
Route::get('/remove-cart', [App\Http\Controllers\CartController::class, 'remove_cart'])->name('remove-cart');
Route::get('/remove-wishlist', [App\Http\Controllers\CartController::class, 'remove_wishlist'])->name('remove-wishlist');
Route::get('/update-cart', [App\Http\Controllers\CartController::class, 'update_cart'])->name('update-cart');
Route::get('/admin-login', function(){
    return view('auth.login');
});


Route::group(['domain' => '{account}.dev.cimchealth.org/'], function () {
    Route::get('/abc', function ($account) {
        return 'Hello';
    });
});


//Admin Routes
Route::group(['middleware' => 'admin'], function () {
    Route::get('/cms/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('/cms/authors', [App\Http\Controllers\Admin\AdminController::class, 'author'])->name('admin.author');
    Route::get('/cms/author/{id}', [App\Http\Controllers\Admin\AdminController::class, 'edit_author'])->name('admin.edit.author');
    Route::get('/cms/delete-author/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_author'])->name('admin.delete-author');
    Route::post('/cms/author_profile_update/{any}', [App\Http\Controllers\Admin\AdminController::class, 'author_profile_update'])->name('admin.author_profile_update');
    Route::get('/cms/consultants', [App\Http\Controllers\Admin\AdminController::class, 'consultant'])->name('admin.consultant');
    Route::get('/cms/consultant/{id}', [App\Http\Controllers\Admin\AdminController::class, 'consultant'])->name('admin.edit.consultant');
    Route::get('/cms/users', [App\Http\Controllers\Admin\AdminController::class, 'general_user'])->name('admin.general-user');
    Route::get('/cms/delete-user/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_user'])->name('admin.delete-user');
    Route::get('/cms/publisher', [App\Http\Controllers\Admin\AdminController::class, 'publisher'])->name('admin.publisher');
    Route::get('/cms/pos', [App\Http\Controllers\Admin\AdminController::class, 'pos'])->name('admin.pos');
    Route::get('/cms/affiliate', [App\Http\Controllers\Admin\AdminController::class, 'affiliates'])->name('admin.affiliates');
    Route::get('/cms/genre', [App\Http\Controllers\Admin\AdminController::class, 'genre'])->name('admin.genre');
    Route::get('/cms/sub-genre', [App\Http\Controllers\Admin\AdminController::class, 'sub_genre'])->name('admin.sub-genre');
    Route::get('/cms/books', [App\Http\Controllers\Admin\AdminController::class, 'books'])->name('admin.books');
    Route::post('/cms/update-book-status', [App\Http\Controllers\Admin\AdminController::class, 'update_book_status'])->name('admin.update-book-status');
    Route::post('/cms/update-campaign-status', [App\Http\Controllers\Admin\AdminController::class, 'update_campaign_status'])->name('admin.update-campaign-status');
    Route::get('/cms/edit-book/{any}', [App\Http\Controllers\Admin\AdminController::class, 'edit_book'])->name('admin.edit-book');
    Route::get('/cms/add-book', [App\Http\Controllers\Admin\AdminController::class, 'add_book'])->name('admin.add-book');
    Route::get('/cms/books/orders', [App\Http\Controllers\Admin\AdminController::class, 'book_orders'])->name('admin.book-orders');
    Route::get('/cms/marketing/orders', [App\Http\Controllers\Admin\AdminController::class, 'marketing_orders'])->name('admin.marketing-orders');
    Route::get('/cms/promotions', [App\Http\Controllers\Admin\AdminController::class, 'offers'])->name('admin.offers');
    Route::get('/cms/promotions/list', [App\Http\Controllers\Admin\AdminController::class, 'subscribed_users'])->name('admin.subscribed-users');
    Route::get('/cms/reports/books-sales', [App\Http\Controllers\Admin\AdminController::class, 'book_sellers'])->name('admin.book-sellers');
    Route::get('/cms/accounts/author-settelments', [App\Http\Controllers\Admin\AdminController::class, 'author_settelments'])->name('admin.author-settelments');
    Route::get('/cms/blog', [App\Http\Controllers\Admin\AdminController::class, 'blog'])->name('admin.blog');
    Route::get('/cms/packages', [App\Http\Controllers\Admin\AdminController::class, 'packages'])->name('admin.packages');
    Route::get('/cms/users/admin', [App\Http\Controllers\Admin\AdminController::class, 'system_users'])->name('admin.system-users');
    Route::get('/cms/settings', [App\Http\Controllers\Admin\AdminController::class, 'settings'])->name('admin.settings');
    Route::get('/cms/profile', [App\Http\Controllers\Admin\AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/cms/update-settings', [App\Http\Controllers\Admin\AdminController::class, 'update_setting'])->name('admin.update-setting');
    Route::post('/cms/add-marketing', [App\Http\Controllers\Admin\AdminController::class, 'add_marketing'])->name('admin.add-marketing');
    Route::post('/cms/add-banner', [App\Http\Controllers\Admin\AdminController::class, 'add_banner'])->name('admin.add-banner');
    Route::get('/cms/locations', [App\Http\Controllers\Admin\AdminController::class, 'locations'])->name('admin.locations');
    Route::post('/cms/add-location', [App\Http\Controllers\Admin\AdminController::class, 'add_location'])->name('admin.add-location');
    Route::get('/cms/delete-location/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_location'])->name('admin.delete-location');
    Route::get('/cms/view-book-detail/{id}', [App\Http\Controllers\Admin\AdminController::class, 'view_book_detail'])->name('admin.view-book-detail');
    
    Route::get('/cms/faq', [App\Http\Controllers\Admin\AdminController::class, 'faq'])->name('admin.faq');
    Route::get('/cms/slider', [App\Http\Controllers\Admin\AdminController::class, 'slider'])->name('admin.slider');
    Route::get('/cms/ads', [App\Http\Controllers\Admin\AdminController::class, 'ads'])->name('admin.ads');
    Route::get('/cms/page/about', [App\Http\Controllers\Admin\AdminController::class, 'about'])->name('admin.about');
    Route::get('/cms/page/default-policy', [App\Http\Controllers\Admin\AdminController::class, 'default_policy'])->name('admin.default-policy');
    Route::get('/cms/page/privacy', [App\Http\Controllers\Admin\AdminController::class, 'privacy'])->name('admin.privacy');
    Route::get('/cms/page/content-policy', [App\Http\Controllers\Admin\AdminController::class, 'content_policy'])->name('admin.content-policy');
    Route::get('/cms/page/terms', [App\Http\Controllers\Admin\AdminController::class, 'terms'])->name('admin.terms');
    Route::get('/cms/page/affiliate-Network-Agreement', [App\Http\Controllers\Admin\AdminController::class, 'affiliateNetworkAgreement'])->name('admin.affiliate-Network-Agreement');
    Route::get('/cms/page/authors-Contract', [App\Http\Controllers\Admin\AdminController::class, 'authorsContract'])->name('admin.authors-Contract');
    Route::get('/cms/page/marketers-Network-Agreement', [App\Http\Controllers\Admin\AdminController::class, 'marketersNetworkAgreement'])->name('admin.marketers-Network-Agreement');
    Route::get('/cms/page/referred-Customers-Agreement', [App\Http\Controllers\Admin\AdminController::class, 'referredCustomersAgreement'])->name('admin.referred-Customers-Agreement');
    Route::get('/cms/page/sellers-Contract-For-Authors', [App\Http\Controllers\Admin\AdminController::class, 'sellersContractForAuthors'])->name('admin.sellers-Contract-For-Authors');
    Route::get('/cms/page/sellers-Contract-For-Publishers', [App\Http\Controllers\Admin\AdminController::class, 'sellersContractForPublishers'])->name('admin.sellers-Contract-For-Publishers');
    Route::get('/cms/banks', [App\Http\Controllers\Admin\AdminController::class, 'banks'])->name('admin.banks');
    Route::get('/cms/delete-marketing/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_marketing'])->name('admin.delete-marketing');
    Route::get('/cms/delete-banner/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_banner'])->name('admin.delete-banner');
    
    Route::post('/cms/add-genre/{any}', [App\Http\Controllers\Admin\GenreController::class, 'store'])->name('admin.add-genre');
    Route::get('/cms/delete-genre/{any}', [App\Http\Controllers\Admin\GenreController::class, 'delete'])->name('admin.delete-genre');
    Route::post('/cms/add-sub-genre/{any}', [App\Http\Controllers\Admin\SubGenreController::class, 'store'])->name('admin.add-sub-genre');
    Route::get('/cms/delete-sub-genre/{any}', [App\Http\Controllers\Admin\SubGenreController::class, 'delete'])->name('admin.delete-sub-genre');
});

//Author Routes
Route::group(['middleware' => 'author'], function () {
    // Route::get('/author', [App\Http\Controllers\Author\AuthorController::class, 'index'])->name('author');

    Route::get('/author/books', [App\Http\Controllers\User\UserController::class, 'author_books'])->name('author.books');
    Route::get('/author/strategies', [App\Http\Controllers\User\UserController::class, 'author_marketing'])->name('author.marketing');
    Route::get('/author/sales', [App\Http\Controllers\User\UserController::class, 'author_sales'])->name('author.sales');
    Route::get('/author/add-book', [App\Http\Controllers\BookController::class, 'add_book'])->name('add-book');
    Route::post('/author/insert-book/{any}', [App\Http\Controllers\BookController::class, 'insert_book'])->name('insert-book');
    Route::get('/author/delete-book/{any}', [App\Http\Controllers\BookController::class, 'delete_book'])->name('delete-book');
    Route::get('/author/edit-book/{any}', [App\Http\Controllers\BookController::class, 'edit_book'])->name('edit-book');
});

//Publisher Routes
Route::group(['middleware' => 'publisher'], function () {
    Route::get('/publisher', [App\Http\Controllers\Publisher\PublisherController::class, 'index'])->name('publisher');
});

//AFFILIATE Routes
Route::group(['middleware' => 'affiliate'], function () {
    Route::get('/affiliate', [App\Http\Controllers\Affiliate\AffiliateController::class, 'index'])->name('affiliate');
});

//POS Routes
Route::group(['middleware' => 'pos'], function () {
    Route::get('/pos', [App\Http\Controllers\Pos\PosController::class, 'index'])->name('pos');
});

//Consultant Routes
Route::group(['middleware' => 'consultant'], function () {
    Route::get('/consultant', [App\Http\Controllers\Consultant\ConsultantController::class, 'index'])->name('consultant');
});

//User Routes
// Route::group(['middleware' => 'user'], function () {
    Route::get('/user', [App\Http\Controllers\User\UserController::class, 'index'])->name('user');
    Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
    Route::get('/author/edit', [App\Http\Controllers\User\UserController::class, 'author_profile_edit'])->name('author.profile.edit')->middleware('auth');
    Route::post('/author/update', [App\Http\Controllers\User\UserController::class, 'author_profile_update'])->name('update-author-profile')->middleware('auth');
    Route::get('/author/autocomplete', [App\Http\Controllers\User\UserController::class, 'autocomplete'])->name('autocomplete')->middleware('auth');


    Route::get('/order-received', [App\Http\Controllers\HomeController::class, 'order_received'])->name('order-received');
    Route::get('/order-tracking', [App\Http\Controllers\HomeController::class, 'order_tracking'])->name('order-tracking');
    Route::get('/author', [App\Http\Controllers\User\UserController::class, 'author_account'])->name('user.author-account');
    Route::get('/publisher', [App\Http\Controllers\User\UserController::class, 'publisher_account'])->name('user.publisher-account');
    Route::get('/affiliate', [App\Http\Controllers\User\UserController::class, 'affiliate_account'])->name('user.affiliate-account');
    Route::get('/consultant', [App\Http\Controllers\User\UserController::class, 'consultant_account'])->name('user.consultant-account');
    Route::get('/pos', [App\Http\Controllers\User\UserController::class, 'pos'])->name('user.pos-account');
// });

Route::get('/auth/facebook', [SocialiteController::class, 'redirectToFB']);
Route::get('/callback/facebook', [SocialiteController::class, 'handleCallback']);
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('/callback/google', [SocialiteController::class, 'handleGoogleCallback']);
Route::get('/send-mail-using-mailchimp', [SocialiteController::class, 'mailchimp'])->name('send.mail.using.mailchimp.index');

Route::get('pay', function () {
    return view('pay');
});
Route::post('/pay-now/{any}', [PaymentController::class, 'initialize'])->name('pay-now');
Route::get('/rave/callback/{any}', [PaymentController::class, 'callback'])->name('flutterwave-callback');
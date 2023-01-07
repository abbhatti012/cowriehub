<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SocialiteController;



//Front Routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);
Route::get('/email/verif/{id}/{hash}', function (Request $request, $id) {
    $user = User::find($id);
    $user->markEmailAsVerified();
    $user->save();
    return redirect(route('login'))->with('registrationSuccessfull', 'Please login to continue!');
})->name('email.verification');

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
// Route::get('/blog-detail', [App\Http\Controllers\HomeController::class, 'blog_detail'])->name('blog-detail');
Route::get('/buy-marketing-package/{any}', [App\Http\Controllers\HomeController::class, 'buy_marketing_package'])->name('buy-marketing-package');
Route::post('/add-marketing-orders', [App\Http\Controllers\HomeController::class, 'add_marketing_orders'])->name('add-marketing-orders');
Route::post('/add-review', [App\Http\Controllers\HomeController::class, 'add_review'])->name('add-review');
Route::get('/front-autocomplete', [App\Http\Controllers\HomeController::class, 'front_autocomplete'])->name('front-autocomplete');
Route::get('/success-page', [App\Http\Controllers\HomeController::class, 'success_page'])->name('success-page');
Route::get('/blogs', [App\Http\Controllers\HomeController::class, 'blogs'])->name('blogs');
Route::get('/blog-detail/{any}', [App\Http\Controllers\HomeController::class, 'blog_detail'])->name('blog-detail');
Route::post('/insert-search-result', [App\Http\Controllers\HomeController::class, 'insert_search_result'])->name('insert-search-result');
Route::get('/update_currency_flag', [App\Http\Controllers\HomeController::class, 'update_currency_flag'])->name('update_currency_flag');

//Static Pages
Route::get('/privacy-policy', [App\Http\Controllers\HomeController::class, 'privacy_policy'])->name('front.privacy-policy');
Route::get('/content-policy', [App\Http\Controllers\HomeController::class, 'content_policy'])->name('front.content-policy');
Route::get('/affiliate-network-agreement', [App\Http\Controllers\HomeController::class, 'affiliate_network_agreement'])->name('front.affiliate-network-agreement');
Route::get('/authors-contract', [App\Http\Controllers\HomeController::class, 'authors_contract'])->name('front.authors-contract');
Route::get('/marketers-network-agreement', [App\Http\Controllers\HomeController::class, 'network_agreement'])->name('front.marketers-network-agreement');
Route::get('/customer-agreement', [App\Http\Controllers\HomeController::class, 'customer_agreement'])->name('front.customer-agreement');
Route::get('/contract-for-authors', [App\Http\Controllers\HomeController::class, 'contract_for_authors'])->name('front.contract-for-authors');
Route::get('/contract-for-publishers', [App\Http\Controllers\HomeController::class, 'contract_for_publishers'])->name('front.contract-for-publishers');
Route::post('/insert-contacts', [App\Http\Controllers\HomeController::class, 'insert_contacts'])->name('front.insert-contacts');
Route::post('/subscribe', [App\Http\Controllers\HomeController::class, 'subscribe'])->name('front.subscribe');

Route::post('/before-payment', [App\Http\Controllers\PaymentController::class, 'before_payment'])->name('before-payment');
Route::post('/pos-before-payment', [App\Http\Controllers\PaymentController::class, 'pos_before_payment'])->name('pos-before-payment');
Route::post('/preorder-before-payment', [App\Http\Controllers\PaymentController::class, 'preorder_before_payment'])->name('preorder-before-payment');

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
Route::get('/cms/book-field-detail/{any}', [App\Http\Controllers\Admin\AdminController::class, 'book_field_detail'])->name('book-field-detail')->middleware('auth');
Route::get('/cms/export-detail', [App\Http\Controllers\Admin\AdminController::class, 'export_detail'])->name('export-detail')->middleware('auth');
Route::group(['middleware' => 'admin'], function () {
    Route::get('/cms/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');
    Route::get('/cms/authors', [App\Http\Controllers\Admin\AdminController::class, 'author'])->name('admin.author');
    Route::get('/cms/author/{id}', [App\Http\Controllers\Admin\AdminController::class, 'edit_author'])->name('admin.edit.author');
    Route::get('/cms/delete-author/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_author'])->name('admin.delete-author');
    Route::get('/cms/delete-affiliate/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_affiliate'])->name('admin.delete-affiliate');
    Route::get('/cms/delete-pos/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_pos'])->name('admin.delete-pos');
    Route::post('/cms/author_profile_update/{any}', [App\Http\Controllers\Admin\AdminController::class, 'author_profile_update'])->name('admin.author_profile_update');
    Route::get('/cms/consultants', [App\Http\Controllers\Admin\AdminController::class, 'consultant'])->name('admin.consultant');
    Route::get('/cms/consultant/{id}', [App\Http\Controllers\Admin\AdminController::class, 'consultant'])->name('admin.edit.consultant');
    Route::get('/cms/users', [App\Http\Controllers\Admin\AdminController::class, 'general_user'])->name('admin.general-user');
    Route::get('/cms/delete-user/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_user'])->name('admin.delete-user');
    Route::get('/cms/publisher', [App\Http\Controllers\Admin\AdminController::class, 'publisher'])->name('admin.publisher');
    Route::get('/cms/pos', [App\Http\Controllers\Admin\AdminController::class, 'pos'])->name('admin.pos');
    Route::get('/cms/affiliate', [App\Http\Controllers\Admin\AdminController::class, 'affiliates'])->name('admin.affiliates');
    Route::get('/cms/referred-users', [App\Http\Controllers\Admin\AdminController::class, 'referred_users'])->name('admin.referred-users');
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
    Route::get('/cms/reports/order-reports', [App\Http\Controllers\Admin\AdminController::class, 'order_reports'])->name('admin.order-reports');
    Route::post('/cms/reports/order-reports', [App\Http\Controllers\Admin\AdminController::class, 'order_reports'])->name('admin.order-reports');
    Route::get('/cms/reports/book-reports', [App\Http\Controllers\Admin\AdminController::class, 'book_reports'])->name('admin.book-reports');
    Route::post('/cms/reports/book-reports', [App\Http\Controllers\Admin\AdminController::class, 'book_reports'])->name('admin.book-reports');
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
    Route::get('/cms/coupons', [App\Http\Controllers\Admin\AdminController::class, 'coupons'])->name('admin.coupons');
    Route::post('/cms/add-location', [App\Http\Controllers\Admin\AdminController::class, 'add_location'])->name('admin.add-location');
    Route::post('/cms/add-skills', [App\Http\Controllers\Admin\AdminController::class, 'add_skills'])->name('admin.add-skills');
    Route::get('/cms/delete-location/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_location'])->name('admin.delete-location');
    Route::get('/cms/delete-skill/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_skill'])->name('admin.delete-skill');
    Route::get('/cms/view-book-detail/{id}', [App\Http\Controllers\Admin\AdminController::class, 'view_book_detail'])->name('admin.view-book-detail');
    Route::get('/cms/view-order-detail/{id}', [App\Http\Controllers\Admin\AdminController::class, 'view_order_detail'])->name('admin.view-order-detail');    
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
    Route::get('/cms/skills', [App\Http\Controllers\Admin\AdminController::class, 'skills'])->name('admin.skills');
    
    Route::get('/cms/assign-job', [App\Http\Controllers\Admin\AdminController::class, 'assign_job'])->name('admin.assign-job');
    Route::get('/cms/active-jobs', [App\Http\Controllers\Admin\AdminController::class, 'active_jobs'])->name('admin.active-jobs');
    Route::get('/cms/completed-jobs', [App\Http\Controllers\Admin\AdminController::class, 'completed_jobs'])->name('admin.completed-jobs');
    Route::post('/cms/add-assign-job', [App\Http\Controllers\Admin\AdminController::class, 'add_assign_job'])->name('admin.add-assign-job');
    Route::get('/cms/remove-job/{any}', [App\Http\Controllers\Admin\AdminController::class, 'remove_job'])->name('admin.remove-job');
    
    Route::post('/cms/add-genre/{any}', [App\Http\Controllers\Admin\GenreController::class, 'store'])->name('admin.add-genre');
    Route::get('/cms/delete-genre/{any}', [App\Http\Controllers\Admin\GenreController::class, 'delete'])->name('admin.delete-genre');
    
    Route::post('/cms/add-sub-genre/{any}', [App\Http\Controllers\Admin\SubGenreController::class, 'store'])->name('admin.add-sub-genre');
    Route::get('/cms/delete-sub-genre/{any}', [App\Http\Controllers\Admin\SubGenreController::class, 'delete'])->name('admin.delete-sub-genre');
    Route::get('/cms/update-payment-status/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_payment_status'])->name('admin.update-payment-status');
    Route::get('/cms/disapprove-payment-status/{any}', [App\Http\Controllers\Admin\AdminController::class, 'disapprove_payment_status'])->name('admin.disapprove-payment-status');
    Route::get('/cms/get-revenue-per-order', [App\Http\Controllers\Admin\AdminController::class, 'get_revenue_per_order'])->name('admin.get-revenue-per-order');
    
    // Route::post('/cms/assign-jobs/', [App\Http\Controllers\Consultant\ConsultantController::class, 'assign_job'])->name('admin.assign-job');
    Route::post('/cms/submit-payment-proof/', [App\Http\Controllers\Consultant\ConsultantController::class, 'submit_payment_proof'])->name('admin.submit-payment-proof');
    Route::post('/cms/submit-author-payment-proof/', [App\Http\Controllers\Consultant\ConsultantController::class, 'submit_author_payment_proof'])->name('admin.submit-author-payment-proof');
    Route::get('/cms/update-publisher-status/{any}/{num}', [App\Http\Controllers\PublisherController::class, 'update_publisher_status'])->name('admin.update-publisher-status');
    
    Route::get('/cms/delete-publisher/{any}', [App\Http\Controllers\PublisherController::class, 'delete_publisher'])->name('admin.delete-publisher');
    Route::get('/cms/update-consultant/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_consultant'])->name('admin.update-consultant');
    Route::get('/cms/update-general-user/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_general_user'])->name('admin.update-general-user');
    Route::post('/cms/update-general-users/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_general_users'])->name('admin.update-general-users');
    Route::get('/cms/edit-publisher/{any}', [App\Http\Controllers\Admin\AdminController::class, 'edit_publisher'])->name('admin.edit-publisher');
    Route::post('/cms/update-publisher/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_publisher'])->name('admin.update-publisher');
    Route::get('/cms/edit-location/{any}', [App\Http\Controllers\Admin\AdminController::class, 'edit_location'])->name('admin.edit-location');
    Route::post('/cms/update-location/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_location'])->name('admin.update-location');
    Route::get('/cms/edit-skill/{any}', [App\Http\Controllers\Admin\AdminController::class, 'edit_skill'])->name('admin.edit-skill');
    Route::post('/cms/update-skill/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_skill'])->name('admin.update-skill');
    Route::get('/cms/edit-marketing/{any}', [App\Http\Controllers\Admin\AdminController::class, 'edit_marketing'])->name('admin.edit-marketing');
    Route::post('/cms/update-marketing/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_marketing'])->name('admin.update-marketing');
    Route::post('/cms/add-blog', [App\Http\Controllers\Admin\AdminController::class, 'add_blog'])->name('admin.add-blog');
    Route::get('/cms/edit-blog/{any}', [App\Http\Controllers\Admin\AdminController::class, 'edit_blog'])->name('admin.edit-blog');
    Route::post('/cms/update-blog/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_blog'])->name('admin.update-blog');
    Route::get('/cms/delete-blog/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_blog'])->name('admin.delete-blog');
    Route::get('/cms/approve-author/{any}', [App\Http\Controllers\Admin\AdminController::class, 'approve_author'])->name('admin.approve-author');
    Route::get('/cms/approve-affiliate/{any}', [App\Http\Controllers\Admin\AdminController::class, 'approve_affiliate'])->name('admin.approve-affiliate');
    Route::get('/cms/approve-pos/{any}', [App\Http\Controllers\Admin\AdminController::class, 'approve_pos'])->name('admin.approve-pos');
    Route::get('/cms/disapprove-pos/{any}', [App\Http\Controllers\Admin\AdminController::class, 'disapprove_pos'])->name('admin.disapprove-pos');
    Route::get('/cms/edit-pos/{any}', [App\Http\Controllers\Admin\AdminController::class, 'edit_pos'])->name('admin.edit-pos');
    Route::post('/cms/update-about-banner', [App\Http\Controllers\Admin\AdminController::class, 'update_about_banner'])->name('admin.update-about-banner');
    Route::get('/cms/all-subscribers', [App\Http\Controllers\Admin\AdminController::class, 'all_subscribers'])->name('admin.subscribers');
    Route::get('/cms/all-contacts', [App\Http\Controllers\Admin\AdminController::class, 'all_contacts'])->name('admin.contacts');
    Route::get('/cms/support', [App\Http\Controllers\Admin\AdminController::class, 'support'])->name('admin.support');
    Route::get('/cms/currency', [App\Http\Controllers\Admin\AdminController::class, 'currency'])->name('admin.currency');

    Route::post('/cms/add-currency/{any}', [App\Http\Controllers\Admin\AdminController::class, 'add_currency'])->name('admin.add-currency');
    Route::get('/cms/delete-currency/{any}', [App\Http\Controllers\Admin\AdminController::class, 'delete_currency'])->name('admin.delete-currency');
});
Route::get('/cms/edit-coupon/{any}', [App\Http\Controllers\Admin\AdminController::class, 'edit_coupon'])->name('admin.edit-coupon');
Route::post('/cms/update-coupon/{any}', [App\Http\Controllers\Admin\AdminController::class, 'update_coupon'])->name('admin.update-coupon');

Route::post('/cms/add-coupon', [App\Http\Controllers\Admin\AdminController::class, 'add_coupon'])->name('admin.add-coupon')->middleware('auth');
Route::get('/cms/delete-coupon/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete_coupon'])->name('admin.delete-coupon')->middleware('auth');
Route::get('/cms/update-coupon-status/{id}', [App\Http\Controllers\Admin\AdminController::class, 'update_coupon_status'])->name('admin.update-coupon-status')->middleware('auth');
Route::get('/cms/check-coupon', [App\Http\Controllers\CouponController::class, 'check_coupon'])->name('admin.check-coupon');
//Author Routes
Route::post('/author/insert-book/{any}', [App\Http\Controllers\BookController::class, 'insert_book'])->name('insert-book');
Route::group(['middleware' => 'author'], function () {
    // Route::get('/author', [App\Http\Controllers\Author\AuthorController::class, 'index'])->name('author');

    Route::get('/author/books', [App\Http\Controllers\User\UserController::class, 'author_books'])->name('author.books');
    Route::get('/author/strategies', [App\Http\Controllers\User\UserController::class, 'author_marketing'])->name('author.marketing');
    Route::get('/author/add-book', [App\Http\Controllers\BookController::class, 'add_book'])->name('add-book');
    Route::get('/author/delete-book/{any}', [App\Http\Controllers\BookController::class, 'delete_book'])->name('delete-book');
    Route::get('/author/coupons', [App\Http\Controllers\User\UserController::class, 'coupons'])->name('author.coupons');
    Route::get('/author/revenue', [App\Http\Controllers\User\UserController::class, 'revenue'])->name('author.revenue');
});
Route::get('/edit-book/{any}', [App\Http\Controllers\BookController::class, 'edit_book'])->name('edit-book');
Route::get('/logout', [App\Http\Controllers\User\UserController::class, 'logout'])->name('logout');
Route::get('/user-wishlist', [App\Http\Controllers\User\UserController::class, 'wishlist'])->name('user.wishlist');
Route::get('/recommended-books', [App\Http\Controllers\User\UserController::class, 'recommended_books'])->name('user.recommended-books');
Route::get('/pending-reviews', [App\Http\Controllers\User\UserController::class, 'pending_reviews'])->name('user.pending-reviews');

//Publisher Routes
Route::post('/publisher-register', [App\Http\Controllers\PublisherController::class, 'signup'])->name('publisher-register')->middleware('auth');
Route::get('/view-book-detail', [App\Http\Controllers\PublisherController::class, 'view_book_detail'])->name('view-book-detail')->middleware('auth');
Route::group(['middleware' => 'publisher'], function () {
    Route::get('/create-author', [App\Http\Controllers\PublisherController::class, 'create_author'])->name('publisher.create-author');
    Route::post('/register-author', [App\Http\Controllers\PublisherController::class, 'register_author'])->name('publisher.register-author');
    Route::get('/add-book-for-author', [App\Http\Controllers\PublisherController::class, 'add_book_for_author'])->name('publisher.add-book-for-author');
    Route::post('/author/insert-book-for-author/{any}', [App\Http\Controllers\PublisherController::class, 'insert_book'])->name('insert-book-for-author');
    Route::get('/all-books', [App\Http\Controllers\PublisherController::class, 'all_books'])->name('publisher.all-books');
    Route::get('/marketing', [App\Http\Controllers\PublisherController::class, 'marketing'])->name('publisher.marketing');
    Route::get('/payment-details', [App\Http\Controllers\PublisherController::class, 'payment_details'])->name('publisher.payment-details');
    Route::post('/update-payment-detail', [App\Http\Controllers\PublisherController::class, 'update_payment_detail'])->name('publisher.update-payment-detail');
    Route::get('/revenue', [App\Http\Controllers\PublisherController::class, 'revenue'])->name('publisher.revenue');
    Route::get('/publisher-dashboard', [App\Http\Controllers\PublisherController::class, 'dashboard'])->name('publishers.dashboard');
});
Route::get('/get-purchases', [App\Http\Controllers\User\UserController::class, 'get_purchases'])->name('get-purchases');
Route::get('/author/sales', [App\Http\Controllers\User\UserController::class, 'author_sales'])->name('author.sales');
Route::post('/author/sales', [App\Http\Controllers\User\UserController::class, 'author_sales'])->name('author.sales');
Route::get('/update-profile', [App\Http\Controllers\User\UserController::class, 'update_profile'])->name('update.profile')->middleware('auth');
Route::post('/update-profile-fields', [App\Http\Controllers\User\UserController::class, 'update_profile_fields'])->name('update-profile-fields')->middleware('auth');
Route::post('/send-verification-email', [App\Http\Controllers\User\UserController::class, 'send_verification_email'])->name('send-verification-email')->middleware('auth');
Route::post('/check-verification-email', [App\Http\Controllers\User\UserController::class, 'check_verification_email'])->name('check-verification-email')->middleware('auth');

Route::get('/my-sales', [App\Http\Controllers\PublisherController::class, 'my_sales'])->name('publisher.my-sales');
Route::post('/my-sales', [App\Http\Controllers\PublisherController::class, 'my_sales'])->name('publisher.my-sales');

//AFFILIATE Routes
// Route::get('/affiliate', [App\Http\Controllers\Affiliate\AffiliateController::class, 'index'])->name('user.affiliate-account');
Route::get('/affiliate', [App\Http\Controllers\Affiliate\AffiliateController::class, 'index'])->name('affiliate')->middleware('auth');
Route::post('/affiliate-signup/{any}', [App\Http\Controllers\Affiliate\AffiliateController::class, 'affiliate_signup'])->name('affiliate.affiliate-signup');
Route::group(['middleware' => 'affiliate'], function () {
    Route::get('/affiliate-payment-detail', [App\Http\Controllers\Affiliate\AffiliateController::class, 'payment_detail'])->name('affiliate.payment-details');
    Route::post('/update-affiliate-payment-detail', [App\Http\Controllers\Affiliate\AffiliateController::class, 'update_payment_detail'])->name('affiliate.update-payment-detail');
    Route::get('/affiliate-commissions', [App\Http\Controllers\Affiliate\AffiliateController::class, 'affiliate_commissions'])->name('affiliate.commissions');
    Route::get('/pos-referred', [App\Http\Controllers\Affiliate\AffiliateController::class, 'pos_referred'])->name('affiliate.pos-referred');
    Route::get('/user-referred', [App\Http\Controllers\Affiliate\AffiliateController::class, 'user_referred'])->name('affiliate.user-referred');
    Route::post('/send-link', [App\Http\Controllers\Affiliate\AffiliateController::class, 'send_link'])->name('affiliate.send-link');
});

//POS Routes
Route::get('/pos', [App\Http\Controllers\Pos\PosController::class, 'index'])->name('pos')->middleware('auth');
Route::post('/pos-signup/{any}', [App\Http\Controllers\Pos\PosController::class, 'pos_signup'])->name('pos.pos-signup');
Route::group(['middleware' => 'pos'], function () {
    Route::get('/payment-detail', [App\Http\Controllers\Pos\PosController::class, 'payment_detail'])->name('pos.payment-detail');
    Route::post('/update-pos-payment-detail', [App\Http\Controllers\Pos\PosController::class, 'update_payment_detail'])->name('pos.update-payment-detail');
    Route::get('/pending-invoices', [App\Http\Controllers\Pos\PosController::class, 'pending_invoices'])->name('pos.pending-invoices');
    Route::get('/paid-invoices', [App\Http\Controllers\Pos\PosController::class, 'paid_invoices'])->name('pos.paid-invoices');
});

//Consultant Routes
Route::group(['middleware' => 'consultant'], function () {
    Route::get('/consultant/payment-detail', [App\Http\Controllers\Consultant\ConsultantController::class, 'payment_detail'])->name('consultant.payment-detail');
    Route::post('/consultant/update-payment-detail', [App\Http\Controllers\Consultant\ConsultantController::class, 'update_payment_detail'])->name('consultant.update-payment-detail');
    Route::get('/consultant/jobs', [App\Http\Controllers\Consultant\ConsultantController::class, 'jobs'])->name('consultant.jobs');
    Route::get('/consultant/active-jobs', [App\Http\Controllers\Consultant\ConsultantController::class, 'active_jobs'])->name('consultant.active-jobs');
    Route::get('/consultant/completed-jobs', [App\Http\Controllers\Consultant\ConsultantController::class, 'completed_jobs'])->name('consultant.completed-jobs');
    Route::get('/consultant/get-author-detail', [App\Http\Controllers\Consultant\ConsultantController::class, 'get_author_detail'])->name('get-author-detail');
    Route::get('/consultant/get-marketing-detail', [App\Http\Controllers\Consultant\ConsultantController::class, 'get_marketing_detail'])->name('get-marketing-detail');
    Route::get('/consultant/approve-marketing-status/{any}/{num}', [App\Http\Controllers\Consultant\ConsultantController::class, 'approve_marketing_status'])->name('consultant.approve-marketing-status');
    Route::post('/consultant/upload-document/{any}', [App\Http\Controllers\Consultant\ConsultantController::class, 'upload_document'])->name('consultant.upload-document');
    Route::get('/consultant/sales', [App\Http\Controllers\Consultant\ConsultantController::class, 'stat'])->name('consultant.stat');
});

//User Routes
// Route::group(['middleware' => 'user'], function () {
    Route::get('/user', [App\Http\Controllers\User\UserController::class, 'index'])->name('user');
    Route::get('/checkout', [App\Http\Controllers\HomeController::class, 'checkout'])->name('checkout');
    Route::get('/order-received', [App\Http\Controllers\HomeController::class, 'order_received'])->name('order-received');
    Route::get('/order-tracking', [App\Http\Controllers\HomeController::class, 'order_tracking'])->name('order-tracking');
    Route::get('/get-filtered-data', [App\Http\Controllers\HomeController::class, 'get_filtered_data'])->name('get-filtered-data');
    Route::get('/my-account', [App\Http\Controllers\HomeController::class, 'my_account'])->name('my-account')->middleware('auth');
    Route::post('/billing-detail', [App\Http\Controllers\HomeController::class, 'billing_detail'])->name('billing-detail');
    Route::post('/shipping-detail', [App\Http\Controllers\HomeController::class, 'shipping_detail'])->name('shipping-detail');
    
    Route::get('/author/edit', [App\Http\Controllers\User\UserController::class, 'author_profile_edit'])->name('author.profile.edit')->middleware('auth');
    Route::post('/author/update', [App\Http\Controllers\User\UserController::class, 'author_profile_update'])->name('update-author-profile')->middleware('auth');
    Route::get('/author/autocomplete', [App\Http\Controllers\User\UserController::class, 'autocomplete'])->name('autocomplete')->middleware('auth');
    Route::get('/author', [App\Http\Controllers\User\UserController::class, 'author_account'])->name('user.author-account');
    Route::get('/publisher', [App\Http\Controllers\User\UserController::class, 'publisher_account'])->name('user.publisher-account')->middleware('auth');
    // Route::get('/pos', [App\Http\Controllers\User\UserController::class, 'pos'])->name('user.pos-account');
    Route::get('/consultant/search-author', [App\Http\Controllers\User\UserController::class, 'search_author'])->name('consultant.search-author');
    Route::get('/dashboard', [App\Http\Controllers\User\UserController::class, 'dashboard'])->name('dashboard');
    
    Route::get('/consultant', [App\Http\Controllers\Consultant\ConsultantController::class, 'index'])->name('consultant.dashboard')->middleware('auth');
    Route::get('/update-consultant-status/{num}/{any}', [App\Http\Controllers\Consultant\ConsultantController::class, 'update_consultant_status'])->name('consultant.update-consultant-status')->middleware('auth');
    Route::post('/update-consultant-signup/{num}', [App\Http\Controllers\Consultant\ConsultantController::class, 'update_consultant_signup'])->name('consultant.update-consultant-signup')->middleware('auth');
    Route::get('/delete-consultant/{num}', [App\Http\Controllers\Consultant\ConsultantController::class, 'delete_consultant'])->name('consultant.delete-consultant')->middleware('auth');
    Route::get('consultant/consultant-register', [App\Http\Controllers\Consultant\ConsultantController::class, 'consultant_account'])->name('user.consultant-account')->middleware('auth');
    Route::post('/consultant/consultant-signup', [App\Http\Controllers\Consultant\ConsultantController::class, 'consultant_signup'])->name('consultant.consultant-signup')->middleware('auth');
    Route::get('/save-address', [App\Http\Controllers\User\UserController::class, 'save_address'])->name('save-address')->middleware('auth');
// });

Route::get('/auth/facebook', [SocialiteController::class, 'redirectToFB']);
Route::get('/callback/facebook', [SocialiteController::class, 'handleCallback']);
Route::get('/auth/google', [SocialiteController::class, 'redirectToGoogle']);
Route::get('/callback/google', [SocialiteController::class, 'handleGoogleCallback']);
Route::get('/send-mail-using-mailchimp', [SocialiteController::class, 'mailchimp'])->name('send.mail.using.mailchimp.index');

Route::get('pay', function () {
    return view('pay');
});
Route::post('/pay-now', [PaymentController::class, 'add_payment'])->name('pay-now');
Route::post('/initialize-payment/{any}', [PaymentController::class, 'initialize'])->name('initialize-payment');
Route::get('/pos_payment_success/{any}', [PaymentController::class, 'pos_payment_success'])->name('pos_payment_success');
Route::get('/confirmation-page', [PaymentController::class, 'confirmation_page'])->name('confirmation-page');
Route::get('/payment-method', [PaymentController::class, 'payment_method'])->name('payment-method');
Route::get('/pos-pay-now/{any}', [PaymentController::class, 'pos_payment'])->name('pos.pay-now');
Route::get('/rave/callback/{any}', [PaymentController::class, 'callback'])->name('flutterwave-callback');
Route::get('/pos/callback/{any}', [PaymentController::class, 'pos_callback'])->name('pos-callback');
Route::get('/pos/close-window/', [PaymentController::class, 'close_window'])->name('pos.close-window');

Route::get('/home', function(){
    return view('home');
});
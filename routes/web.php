<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AiapplicationController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\ComponentpageController;
use App\Http\Controllers\CustomerAccountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PaymentGatewayController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ReloadController;
use App\Http\Controllers\RoleandaccessController;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CoinPromotionController;
use App\Http\Controllers\CoinPromotionDetailController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CoinController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\TruckController;

// Authentication Routes - No auth required
// Authentication
Route::prefix('authentication')->group(function () {
    Route::controller(AuthenticationController::class)->group(function () {
        Route::get('/forgotpassword', 'forgotPassword')->name('forgotPassword');
        Route::get('/signin', 'signin')->name('signin');
        Route::get('/signup', 'signup')->name('signup');
    });
});

// Authentication POST routes
Route::post('/login', 'App\Http\Controllers\AuthenticationController@postLogin')->name('login'); // Laravel default
Route::post('/signin', 'App\Http\Controllers\AuthenticationController@postLogin')->name('signin.post'); // Our app specific
Route::post('/logout', 'App\Http\Controllers\AuthenticationController@logout')->name('logout');

// Protected routes - Require authentication
Route::middleware(['auth'])->group(function () {
    // Dashboard root route
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('index');
    });

    // Home controller routes
    Route::controller(HomeController::class)->group(function () {
        Route::get('calendar','calendar')->name('calendar');
        Route::get('chatmessage','chatMessage')->name('chatMessage');
        Route::get('chatempty','chatempty')->name('chatempty');
        Route::get('email','email')->name('email');
        Route::get('error','error1')->name('error');
        Route::get('faq','faq')->name('faq');
        Route::get('gallery','gallery')->name('gallery');
        Route::get('kanban','kanban')->name('kanban');
        Route::get('pricing','pricing')->name('pricing');
        Route::get('termscondition','termsCondition')->name('termsCondition');
        Route::get('widgets','widgets')->name('widgets');
        Route::get('chatprofile','chatProfile')->name('chatProfile');
        Route::get('veiwdetails','veiwDetails')->name('veiwDetails');
        Route::get('blankPage','blankPage')->name('blankPage');
        Route::get('comingSoon','comingSoon')->name('comingSoon');
        Route::get('maintenance','maintenance')->name('maintenance');
        Route::get('starred','starred')->name('starred');
        Route::get('testimonials','testimonials')->name('testimonials');
    });

    // aiApplication
    Route::prefix('aiapplication')->group(function () {
        Route::controller(AiapplicationController::class)->group(function () {
            Route::get('/codegenerator', 'codeGenerator')->name('codeGenerator');
            Route::get('/codegeneratornew', 'codeGeneratorNew')->name('codeGeneratorNew');
            Route::get('/imagegenerator','imageGenerator')->name('imageGenerator');
            Route::get('/textgeneratornew','textGeneratorNew')->name('textGeneratorNew');
            Route::get('/textgenerator','textGenerator')->name('textGenerator');
            Route::get('/videogenerator','videoGenerator')->name('videoGenerator');
            Route::get('/voicegenerator','voiceGenerator')->name('voiceGenerator');
        });
    });
    
    // chart
    Route::prefix('chart')->group(function () {
        Route::controller(ChartController::class)->group(function () {
            Route::get('/columnchart', 'columnChart')->name('columnChart');
            Route::get('/linechart', 'lineChart')->name('lineChart');
            Route::get('/piechart', 'pieChart')->name('pieChart');
        });
    });

    // Business Prices and Zones
    Route::prefix('business')->group(function () {
        // Price item routes
        Route::get('/prices', 'App\Http\Controllers\PriceItemController@index')->name('business.prices');
        Route::get('/prices/tonne/{priceId}', 'App\Http\Controllers\PriceItemController@tonnePrices')->name('business.prices.tonne');
        Route::get('/prices/load/{priceId}', 'App\Http\Controllers\PriceItemController@loadPrices')->name('business.prices.load');
        Route::post('/prices/tonne/update', 'App\Http\Controllers\PriceItemController@updateTonnePrice')->name('business.prices.tonne.update');
        Route::post('/prices/load/update', 'App\Http\Controllers\PriceItemController@updateLoadPrice')->name('business.prices.load.update');
        Route::get('/zones', 'App\Http\Controllers\PriceItemController@zones')->name('business.zones');
        Route::post('/zones/postcodes/update', 'App\Http\Controllers\PriceItemController@updatePostcodes')->name('business.zones.postcodes.update');
        Route::post('/zones/postcodes/add', 'App\Http\Controllers\PriceItemController@addPostcode')->name('business.zones.postcodes.add');
        
        // Price Items CRUD routes
        Route::get('/price-items', 'App\Http\Controllers\PriceItemController@index')->name('price.items.index');
        Route::get('/price-items/create', 'App\Http\Controllers\PriceItemController@create')->name('price.items.create');
        Route::post('/price-items', 'App\Http\Controllers\PriceItemController@store')->name('price.items.store');
        Route::get('/price-items/{id}', 'App\Http\Controllers\PriceItemController@show')->name('price.items.show');
        Route::get('/price-items/{id}/edit', 'App\Http\Controllers\PriceItemController@edit')->name('price.items.edit');
        Route::put('/price-items/{id}', 'App\Http\Controllers\PriceItemController@update')->name('price.items.update');
        Route::delete('/price-items/{id}', 'App\Http\Controllers\PriceItemController@destroy')->name('price.items.destroy');
    });

    // Componentpage
    Route::prefix('componentspage')->group(function () {
        Route::controller(ComponentpageController::class)->group(function () {
            Route::get('/alert', 'alert')->name('alert');
            Route::get('/avatar', 'avatar')->name('avatar');
            Route::get('/badges', 'badges')->name('badges');
            Route::get('/button', 'button')->name('button');
            Route::get('/calendar', 'calendar')->name('calendar');
            Route::get('/card', 'card')->name('card');
            Route::get('/carousel', 'carousel')->name('carousel');
            Route::get('/colors', 'colors')->name('colors');
            Route::get('/dropdown', 'dropdown')->name('dropdown');
            Route::get('/imageupload', 'imageUpload')->name('imageUpload');
            Route::get('/list', 'list')->name('list');
            Route::get('/pagination', 'pagination')->name('pagination');
            Route::get('/progress', 'progress')->name('progress');
            Route::get('/radio', 'radio')->name('radio');
            Route::get('/starrating', 'starRating')->name('starRating');
            Route::get('/switch', 'switch')->name('switch');
            Route::get('/tabs', 'tabs')->name('tabs');
            Route::get('/tags', 'tags')->name('tags');
            Route::get('/tooltip', 'tooltip')->name('tooltip');
            Route::get('/typography', 'typography')->name('typography');
            Route::get('/videos', 'videos')->name('videos');
        });
    });

    // Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/index', 'index')->name('index');
            Route::get('/index2', 'index2')->name('index2');
            Route::get('/index3', 'index3')->name('index3');
            Route::get('/index4', 'index4')->name('index4');
            Route::get('/index5','index5')->name('index5');
            Route::get('/index6','index6')->name('index6');
            Route::get('/index7','index7')->name('index7');
            Route::get('/index8','index8')->name('index8');
            Route::get('/index9','index9')->name('index9');
            Route::get('/index10','index10')->name('index10');
            Route::get('/analyst','analyst')->name('dashboardAnalyst');
            Route::get('/wallet','wallet')->name('wallet');
        });
    });

    // Forms
    Route::prefix('forms')->group(function () {
        Route::controller(FormsController::class)->group(function () {
            Route::get('/form-layout', 'formLayout')->name('formLayout');
            Route::get('/form-validation', 'formValidation')->name('formValidation');
            Route::get('/form', 'form')->name('form');
            Route::get('/wizard', 'wizard')->name('wizard');
        });
    });

    // invoice/invoiceList
    Route::prefix('invoice')->group(function () {
        Route::controller(InvoiceController::class)->group(function () {
            Route::get('/invoice-add', 'invoiceAdd')->name('invoiceAdd');
            Route::get('/invoice-edit', 'invoiceEdit')->name('invoiceEdit');
            Route::get('/invoice-list', 'invoiceList')->name('invoiceList');
            Route::get('/invoice-preview', 'invoicePreview')->name('invoicePreview');
        });
    });

    // Settings
    Route::prefix('settings')->group(function () {
        Route::controller(SettingsController::class)->group(function () {
            Route::get('/company', 'company')->name('company');
            Route::get('/currencies', 'currencies')->name('currencies');
            Route::get('/language', 'language')->name('language');
            Route::get('/notification', 'notification')->name('notification');
            Route::get('/notification-alert', 'notificationAlert')->name('notificationAlert');
            Route::get('/payment-gateway', 'paymentGateway')->name('paymentGateway');
        });
        
        // Payment Gateway secure routes
        Route::controller(PaymentGatewayController::class)->group(function () {
            Route::get('/payment-gateway-secure', 'index')->name('paymentGatewaySecure');
            Route::post('/payment-gateway-secure', 'update')->name('paymentGatewayUpdate');
            Route::get('/payment-config', 'getPublicConfig')->name('paymentConfig');
            Route::get('/theme', 'theme')->name('theme');
        });
    });

    // Table
    Route::prefix('table')->group(function () {
        Route::controller(TableController::class)->group(function () {
            Route::get('/tablebasic', 'tableBasic')->name('tableBasic');
            Route::get('/tabledata', 'tableData')->name('tableData');
        });
    });

    // Users
    Route::prefix('users')->group(function () {
        Route::controller(UsersController::class)->group(function () {
            Route::get('/add-user', 'addUser')->name('addUser');
            Route::get('/users-grid', 'usersGrid')->name('usersGrid');
            Route::get('/users-list', 'usersList')->name('usersList');
            Route::get('/view-profile/{id?}', 'viewProfile')->name('viewProfile');
            Route::get('/edit-user/{id}', 'editUser')->name('editUser');
            Route::put('/update-user/{id}', 'updateUser')->name('updateUser');
            Route::delete('/delete-user/{id}', 'deleteUser')->name('deleteUser');
        });
    });

    // Blog
    Route::prefix('blog')->group(function () {
        Route::controller(BlogController::class)->group(function () {
            Route::get('/addBlog', 'addBlog')->name('addBlog');
            Route::get('/blog', 'blog')->name('blog');
            Route::get('/blogDetails', 'blogDetails')->name('blogDetails');
        });
    });

    // Role and access
    Route::prefix('roleandaccess')->group(function () {
        Route::controller(RoleandaccessController::class)->group(function () {
            Route::get('/assignRole', 'assignRole')->name('assignRole');
            Route::get('/roleAaccess', 'roleAaccess')->name('roleAaccess');
        });
    });

    // Cryptocurrency
    Route::prefix('cryptocurrency')->group(function () {
        Route::controller(CryptocurrencyController::class)->group(function () {
            Route::get('/marketplace', 'marketplace')->name('marketplace');
            Route::get('/marketplacedetails', 'marketplaceDetails')->name('marketplaceDetails');
            Route::get('/portfolio', 'portfolio')->name('portfolio');
            Route::get('/wallet', 'wallet')->name('wallet');
        });
    });

    // Orders
    Route::prefix('orders')->group(function () {
        Route::controller(OrderController::class)->group(function () {
            Route::get('/orders-list', 'orders')->name('ordersList');
            Route::get('/order-details/{id}', 'orderDetails')->name('orderDetails');
            Route::get('/order-statuses', 'orderStatuses')->name('orderStatuses');
            Route::get('/free-deliveries', 'freeDeliveries')->name('freeDeliveries');
            Route::get('/self-pickups', 'selfPickups')->name('selfPickups');
        });
    });

    // Jobs
    Route::prefix('jobs')->group(function () {
        Route::controller(JobController::class)->group(function () {
            Route::get('/jobs-list', 'jobs')->name('jobsList');
            Route::get('/job-details/{id}', 'jobDetails')->name('jobDetails');
            Route::get('/job-statuses', 'jobStatuses')->name('jobStatuses');
        });
    });

    // Trips
    Route::prefix('trips')->group(function () {
        Route::controller(TripController::class)->group(function () {
            Route::get('/trips-list', 'trips')->name('tripsList');
            Route::get('/trip-details/{id}', 'tripDetails')->name('tripDetails');
            Route::get('/trip-statuses', 'tripStatuses')->name('tripStatuses');
        });
    });

    // Products
    Route::prefix('products')->group(function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('/','index')->name('products.index');
            Route::get('/create','create')->name('products.create');
            Route::post('/store','store')->name('products.store');
        });
    });

    // Sites/Quarries
    Route::prefix('sites')->group(function () {
        Route::get('/', 'App\Http\Controllers\SiteController@index')->name('sites.index');
        Route::get('/create', 'App\Http\Controllers\SiteController@create')->name('sites.create');
        Route::post('/', 'App\Http\Controllers\SiteController@store')->name('sites.store');
        Route::get('/{id}', 'App\Http\Controllers\SiteController@show')->name('sites.show');
        Route::get('/{id}/edit', 'App\Http\Controllers\SiteController@edit')->name('sites.edit');
        Route::put('/{id}', 'App\Http\Controllers\SiteController@update')->name('sites.update');
        Route::delete('/{id}', 'App\Http\Controllers\SiteController@destroy')->name('sites.destroy');
    });
    
    // Accounts
    Route::prefix('accounts')->group(function () {
        Route::controller(AccountController::class)->group(function () {
            Route::get('/', 'index')->name('accounts.index');
            Route::get('/create', 'create')->name('accounts.create');
            Route::post('/', 'store')->name('accounts.store');
            Route::get('/{account}', 'show')->name('accounts.show');
            Route::get('/{account}/edit', 'edit')->name('accounts.edit');
            Route::put('/{account}', 'update')->name('accounts.update');
            Route::delete('/{account}', 'destroy')->name('accounts.destroy');
        });
    });
    
    // Customer Accounts
    Route::prefix('customer-accounts')->group(function () {
        Route::controller(CustomerAccountController::class)->group(function () {
            Route::get('/', 'index')->name('customer-accounts.index');
            Route::get('/create', 'create')->name('customer-accounts.create');
            Route::post('/', 'store')->name('customer-accounts.store');
            Route::get('/{customerAccount}', 'show')->name('customer-accounts.show');
            Route::get('/{customerAccount}/edit', 'edit')->name('customer-accounts.edit');
            Route::put('/{customerAccount}', 'update')->name('customer-accounts.update');
            Route::delete('/{customerAccount}', 'destroy')->name('customer-accounts.destroy');
            Route::get('/{customerAccount}/document', 'viewDocument')->name('customer-accounts.document');
        });
    });
    
    // Reloads
    Route::prefix('reloads')->group(function () {
        Route::controller(ReloadController::class)->group(function () {
            Route::get('/', 'index')->name('reloads.index');
            Route::get('/{reload}', 'show')->name('reloads.show');
        });
    });
    
    // Withdrawals
    Route::prefix('withdrawals')->group(function () {
        Route::controller(WithdrawalController::class)->group(function () {
            Route::get('/', 'index')->name('withdrawals.index');
            Route::get('/{withdrawal}/edit', 'edit')->name('withdrawals.edit');
            Route::post('/{withdrawal}', 'update')->name('withdrawals.update');
            Route::get('/{withdrawal}/bank-statement', 'viewBankStatement')->name('withdrawals.bank-statement');
        });
    });
    
    // Coins
    Route::prefix('coins')->group(function () {
        Route::controller(CoinController::class)->group(function () {
            Route::get('/', 'index')->name('coins.index');
            Route::get('/create', 'create')->name('coins.create');
            Route::post('/', 'store')->name('coins.store');
            Route::get('/{coin}/edit', 'edit')->name('coins.edit');
            Route::put('/{coin}', 'update')->name('coins.update');
            Route::delete('/{coin}', 'destroy')->name('coins.destroy');
        });
    });
    
    // Coin Promotions
    Route::prefix('coin-promotions')->group(function () {
        Route::controller(CoinPromotionController::class)->group(function () {
            Route::get('/', 'index')->name('coin-promotions.index');
            Route::get('/create', 'create')->name('coin-promotions.create');
            Route::post('/', 'store')->name('coin-promotions.store');
            Route::get('/{coinPromotion}/edit', 'edit')->name('coin-promotions.edit');
            Route::put('/{coinPromotion}', 'update')->name('coin-promotions.update');
            Route::delete('/{coinPromotion}', 'destroy')->name('coin-promotions.destroy');
        });
    });
    
    // Coin Promotion Details
    Route::prefix('coin-promotion-details')->group(function () {
        Route::controller(CoinPromotionDetailController::class)->group(function () {
            Route::get('/create', 'create')->name('coin-promotion-details.create');
            Route::post('/', 'store')->name('coin-promotion-details.store');
            Route::get('/{coinPromotionDetail}/edit', 'edit')->name('coin-promotion-details.edit');
            Route::put('/{coinPromotionDetail}', 'update')->name('coin-promotion-details.update');
            Route::delete('/{coinPromotionDetail}', 'destroy')->name('coin-promotion-details.destroy');
        });
    });
    
    // Assignments
    Route::prefix('assignments')->group(function () {
        Route::controller(AssignmentController::class)->group(function () {
            Route::get('/', 'index')->name('assignments.index');
            Route::get('/create', 'create')->name('assignments.create');
            Route::post('/', 'store')->name('assignments.store');
            Route::get('/{assignment}', 'show')->name('assignments.show');
            Route::get('/{assignment}/edit', 'edit')->name('assignments.edit');
            Route::put('/{assignment}', 'update')->name('assignments.update');
            Route::delete('/{assignment}', 'destroy')->name('assignments.destroy');
        });
    });
    
    // Payments
    Route::prefix('payments')->group(function () {
        Route::controller(PaymentController::class)->group(function () {
            Route::get('/', 'index')->name('payments.index');
            Route::get('/create', 'create')->name('payments.create');
            Route::post('/', 'store')->name('payments.store');
            Route::get('/{payment}', 'show')->name('payments.show');
            Route::get('/{payment}/edit', 'edit')->name('payments.edit');
            Route::put('/{payment}', 'update')->name('payments.update');
            Route::delete('/{payment}', 'destroy')->name('payments.destroy');
            Route::post('/{payment}/approve', 'approve')->name('payments.approve');
            Route::post('/{payment}/reject', 'reject')->name('payments.reject');
        });
    });

    // Drivers
    Route::prefix('drivers')->group(function () {
        Route::controller(DriverController::class)->group(function () {
            Route::get('/', 'index')->name('drivers.index');
            Route::get('/create', 'create')->name('drivers.create');
            Route::post('/', 'store')->name('drivers.store');
            Route::get('/{driver}', 'show')->name('drivers.show');
            Route::get('/{driver}/edit', 'edit')->name('drivers.edit');
            Route::put('/{driver}', 'update')->name('drivers.update');
            Route::delete('/{driver}', 'destroy')->name('drivers.destroy');
        });
    });
    
    // Trucks
    Route::prefix('trucks')->group(function () {
        Route::controller(TruckController::class)->group(function () {
            Route::get('/', 'index')->name('trucks.index');
            Route::get('/create', 'create')->name('trucks.create');
            Route::post('/', 'store')->name('trucks.store');
            Route::get('/{truck}', 'show')->name('trucks.show');
            Route::get('/{truck}/edit', 'edit')->name('trucks.edit');
            Route::put('/{truck}', 'update')->name('trucks.update');
            Route::delete('/{truck}', 'destroy')->name('trucks.destroy');
        });
    });
});

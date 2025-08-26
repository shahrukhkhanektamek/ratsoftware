<?php 

use Illuminate\Support\Facades\Route;





/*admin routes*/

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\Admin\ProjectTypeController;
use App\Http\Controllers\Admin\ProjectSubTypeController;





use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\StateController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\SettingController;



use App\Http\Controllers\Admin\AdminExcelController;


/*admin routes end*/













// for admin









Route::post('get-package-category', [WebController::class, 'get_package_category'])->name('get-package-category');



Route::group(['middleware' => ['admin']], function () {



    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('admin_earning_calendar', [DashboardController::class, 'admin_earning_calendar'])->name('admin_earning_calendar');
    

    Route::group(['prefix'=>'admin-change-password', 'as'=>'admin-change-password.'], function(){

        Route::get('/', [ChangePasswordController::class, 'index'])->name('index');
        Route::get('load_data', [ChangePasswordController::class, 'load_data'])->name('load_data');
        Route::get('edit/{id?}', [ChangePasswordController::class, 'edit'])->name('edit');
        Route::post('update', [ChangePasswordController::class, 'update'])->name('update');

    });



    Route::group(['prefix'=>'product', 'as'=>'product.'], function(){
        Route::get('/', [ProductController::class, 'index'])->name('list');
        Route::get('load_data', [ProductController::class, 'load_data'])->name('load_data');
        Route::get('add', [ProductController::class, 'add'])->name('add');
        Route::get('edit/{id?}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update', [ProductController::class, 'update'])->name('update');
        Route::post('delete/{id?}', [ProductController::class, 'delete'])->name('delete');
        Route::get('excel_import', [ProductController::class, 'excel_import'])->name('excel_import');
        Route::post('excel_import_action', [ProductController::class, 'excel_import_action'])->name('excel_import_action');
    });


    Route::group(['prefix'=>'item', 'as'=>'item.'], function(){
        Route::get('/', [ItemController::class, 'index'])->name('list');
        Route::get('load_data', [ItemController::class, 'load_data'])->name('load_data');
        Route::get('add', [ItemController::class, 'add'])->name('add');
        Route::get('edit/{id?}', [ItemController::class, 'edit'])->name('edit');
        Route::post('update', [ItemController::class, 'update'])->name('update');
        Route::post('delete/{id?}', [ItemController::class, 'delete'])->name('delete');
        Route::get('excel_import', [ItemController::class, 'excel_import'])->name('excel_import');
        Route::post('excel_import_action', [ItemController::class, 'excel_import_action'])->name('excel_import_action');
    });

    Route::group(['prefix'=>'project-type', 'as'=>'project-type.'], function(){
        Route::get('/', [ProjectTypeController::class, 'index'])->name('list');
        Route::get('load_data', [ProjectTypeController::class, 'load_data'])->name('load_data');
        Route::get('add', [ProjectTypeController::class, 'add'])->name('add');
        Route::get('edit/{id?}', [ProjectTypeController::class, 'edit'])->name('edit');
        Route::post('update', [ProjectTypeController::class, 'update'])->name('update');
        Route::post('delete/{id?}', [ProjectTypeController::class, 'delete'])->name('delete');
        Route::get('excel_import', [ProjectTypeController::class, 'excel_import'])->name('excel_import');
        Route::post('excel_import_action', [ProjectTypeController::class, 'excel_import_action'])->name('excel_import_action');
    });


    Route::group(['prefix'=>'project-sub-type', 'as'=>'project-sub-type.'], function(){
        Route::get('/', [ProjectSubTypeController::class, 'index'])->name('list');
        Route::get('load_data', [ProjectSubTypeController::class, 'load_data'])->name('load_data');
        Route::get('add', [ProjectSubTypeController::class, 'add'])->name('add');
        Route::get('edit/{id?}', [ProjectSubTypeController::class, 'edit'])->name('edit');
        Route::post('update', [ProjectSubTypeController::class, 'update'])->name('update');
        Route::post('delete/{id?}', [ProjectSubTypeController::class, 'delete'])->name('delete');
        Route::get('excel_import', [ProjectSubTypeController::class, 'excel_import'])->name('excel_import');
        Route::post('excel_import_action', [ProjectSubTypeController::class, 'excel_import_action'])->name('excel_import_action');
    });



    
  

 

    Route::group(['prefix'=>'user', 'as'=>'user.'], function(){

        Route::get('/', [UserController::class, 'index'])->name('list');
        Route::get('load_data', [UserController::class, 'load_data'])->name('load_data');
        Route::get('add', [UserController::class, 'add'])->name('add');
        Route::get('edit/{id?}', [UserController::class, 'edit'])->name('edit');
        Route::post('update', [UserController::class, 'update'])->name('update');
        Route::post('delete/{id?}', [UserController::class, 'delete'])->name('delete');
        Route::get('account-action/{id?}', [UserController::class, 'account_action'])->name('account-action');






        Route::get('change-password/{id?}', [UserController::class, 'change_password'])->name('change-password');

        Route::post('change-password-action', [UserController::class, 'change_password_action'])->name('change-password-action');



        Route::get('change-sponser/{id?}', [UserController::class, 'change_sponser'])->name('change-sponser');

        Route::post('change-sponser-action', [UserController::class, 'change_sponser_action'])->name('change-sponser-action');


        Route::get('activate-with-income/{id?}', [UserController::class, 'activate_with_income'])->name('activate-with-income');

        Route::post('activate-with-income-action', [UserController::class, 'activate_with_income_action'])->name('activate-with-income-action');



        Route::get('reffral/{id?}', [UserController::class, 'reffral'])->name('reffral');

        Route::get('load_reffral_data', [UserController::class, 'load_reffral_data'])->name('load_reffral_data');



        Route::get('team-reffral/{id?}', [UserController::class, 'team_reffral'])->name('team-reffral');

        Route::get('load_team_reffral_data', [UserController::class, 'load_team_reffral_data'])->name('load_team_reffral_data');



        Route::get('team/{id?}', [UserController::class, 'team'])->name('team');



        Route::get('dashboard/{id?}', [UserController::class, 'dashboard'])->name('dashboard');

        Route::get('earning_calendar', [UserController::class, 'earning_calendar'])->name('earning_calendar');



        



        

        // Route::post('leaderboard_show_hide', [UserController::class, 'leaderboard_show_hide'])->name('leaderboard_show_hide');

        Route::post('send_password', [UserController::class, 'send_password'])->name('send_password');

        Route::post('block_unblock', [UserController::class, 'block_unblock'])->name('block_unblock');



        Route::get('excel_export', [UserController::class, 'excel_export'])->name('excel_export');

    });



    
    Route::group(['prefix'=>'country', 'as'=>'country.'], function(){
        Route::get('/', [CountryController::class, 'index'])->name('list');
        Route::get('load_data', [CountryController::class, 'load_data'])->name('load_data');
        Route::get('add', [CountryController::class, 'add'])->name('add');
        Route::get('edit/{id?}', [CountryController::class, 'edit'])->name('edit');
        Route::post('update', [CountryController::class, 'update'])->name('update');
        Route::post('delete/{id?}', [CountryController::class, 'delete'])->name('delete');
        Route::get('excel_import', [CountryController::class, 'excel_import'])->name('excel_import');
        Route::post('excel_import_action', [CountryController::class, 'excel_import_action'])->name('excel_import_action');
    });    
    Route::group(['prefix'=>'state', 'as'=>'state.'], function(){
        Route::get('/', [StateController::class, 'index'])->name('list');
        Route::get('load_data', [StateController::class, 'load_data'])->name('load_data');
        Route::get('add', [StateController::class, 'add'])->name('add');
        Route::get('edit/{id?}', [StateController::class, 'edit'])->name('edit');
        Route::post('update', [StateController::class, 'update'])->name('update');
        Route::post('delete/{id?}', [StateController::class, 'delete'])->name('delete');
        Route::get('excel_import', [StateController::class, 'excel_import'])->name('excel_import');
        Route::post('excel_import_action', [StateController::class, 'excel_import_action'])->name('excel_import_action');
    });    
    Route::group(['prefix'=>'city', 'as'=>'city.'], function(){
        Route::get('/', [CityController::class, 'index'])->name('list');
        Route::get('load_data', [CityController::class, 'load_data'])->name('load_data');
        Route::get('add', [CityController::class, 'add'])->name('add');
        Route::get('edit/{id?}', [CityController::class, 'edit'])->name('edit');
        Route::post('update', [CityController::class, 'update'])->name('update');
        Route::post('delete/{id?}', [CityController::class, 'delete'])->name('delete');
        Route::get('excel_import', [CityController::class, 'excel_import'])->name('excel_import');
        Route::post('excel_import_action', [CityController::class, 'excel_import_action'])->name('excel_import_action');
    });




    Route::group(['prefix'=>'setting', 'as'=>'setting.'], function(){

        

        Route::get('main/{id?}', [SettingController::class, 'main'])->name('main');
        Route::post('main-update', [SettingController::class, 'main_update'])->name('main-update');



        Route::get('gst/{id?}', [SettingController::class, 'gst'])->name('gst');
        Route::post('gst-update', [SettingController::class, 'gst_update'])->name('gst-update');



        Route::get('payoutpin/{id?}', [SettingController::class, 'payoutpin'])->name('payoutpin');
        Route::post('payoutpin-update', [SettingController::class, 'payoutpin_update'])->name('payoutpin-update');



        Route::get('emails/{id?}', [SettingController::class, 'emails'])->name('emails');
        Route::post('emails-update', [SettingController::class, 'emails_update'])->name('emails-update');


        Route::get('plan/{id?}', [SettingController::class, 'plansetting'])->name('plan');
        Route::post('plan-update', [SettingController::class, 'plansetting_update'])->name('plan-update');



    });



    




    Route::group(['prefix'=>'payment-setting', 'as'=>'payment-setting.'], function(){
        Route::get('/', [PaymentSettingController::class, 'index'])->name('list');
        Route::get('load_data', [PaymentSettingController::class, 'load_data'])->name('load_data');
        Route::get('add', [PaymentSettingController::class, 'add'])->name('add');
        Route::get('edit/{id?}', [PaymentSettingController::class, 'edit'])->name('edit');
        Route::post('update', [PaymentSettingController::class, 'update'])->name('update');
        Route::post('delete/{id?}', [PaymentSettingController::class, 'delete'])->name('delete');
        Route::post('status-change/{id?}', [PaymentSettingController::class, 'status_change'])->name('status-change');
    });





});



// for admin end


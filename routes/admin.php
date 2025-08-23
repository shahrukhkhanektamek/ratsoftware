<?php 

use Illuminate\Support\Facades\Route;





/*admin routes*/

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;

use App\Http\Controllers\Admin\ItemController;

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


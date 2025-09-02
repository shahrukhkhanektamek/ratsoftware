<?php



use Illuminate\Support\Facades\Route;



date_default_timezone_set('Asia/Kolkata');

define("user_view_folder", 'user');

define("sort_name", 'SV');

define("brevo_api", '');











use App\Http\Controllers\Web\HomeController;




use App\Http\Controllers\TestingController;

use App\Http\Controllers\WebController;

use App\Http\Controllers\CronJobController;

use App\Http\Controllers\MailController;






/*test*/

Route::get('test_package', [TestingController::class, 'test_package'])->name('test_package');
Route::get('welcome_mail', [TestingController::class, 'welcome_mail']);

/*test end*/





/*cron jobs*/



Route::get('seven-day-mails', [CronJobController::class, 'seven_day_mails']);

Route::get('next-step', [CronJobController::class, 'next_step']);



/*cron jobs end*/









Route::get('export', [AdminExcelController::class, 'export'])->name('export');

Route::get('send-email', [MailController::class, 'sendEmail']);

Route::post('crop-image', [WebController::class, 'crop_image'])->name("crop-image");







Route::post('select-country', [WebController::class, 'search_country'])->name('select-country');
Route::post('select-state', [WebController::class, 'search_state'])->name('select-state');
Route::post('select-city', [WebController::class, 'search_city'])->name('select-city');
Route::post('search-category', [WebController::class, 'search_category'])->name('search-category');




Route::get('/{page?}', [HomeController::class, 'all'])->name('home');


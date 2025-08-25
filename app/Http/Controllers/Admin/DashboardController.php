<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helper\Helpers;
use Custom_model;

 
class DashboardController extends Controller
{
    public function index(Request $request)
    {        
        return view('admin.dashboard.index');
    }
    public function admin_earning_calendar(Request $request)
    {   
        $start = $request->start;
        $end = $request->end;
        $start_date = $start;
        $end_date = $end;
        $data = DB::table('transaction')
        ->select(
            DB::raw('CONCAT(YEAR(payment_date_time), "-", MONTH(payment_date_time), "-", DAY(payment_date_time)) as date'),
            DB::raw('SUM(final_amount) as total_amount')
        )
        ->whereBetween('transaction.payment_date_time', [$start_date, $end_date])
        ->where('status',1)
        ->groupBy('date')
        ->get();
        $events = [];
        foreach ($data as $key => $value) {
            $events[] = ["title"=>Helpers::price_formate($value->total_amount),"start"=>date("Y-m-d",strtotime($value->date)),];
        }        
        return response()->json(["events"=>$events], 200);
    }
}
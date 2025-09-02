<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use App\Models\MemberModel;
use App\Models\MailModel;
use App\Models\Package;
use App\Helper\Helpers;


class WebController extends Controller
{
    
    
    
    public function search_category(Request $request)
    {
        $search = $request->search;
        $list = DB::table("course_category")->select('name','id')->limit(50);
        if(!empty($search))
        {
            $search = explode(" ", $search);
            foreach ($search as $key => $value)
            {
                $list = $list->where('name','LIKE',"%{$value}%");
            }
        }
        $list = $list->get();
        $return_data = [];
        foreach ($list as $key => $value) {
            $return_data[] = array("id"=>$value->id,"text"=>$value->name,);
        }
        $data['results'] = $return_data;
        return response()->json($data, 200);
    }
    
   
    public function crop_image(Request $request)
    {
        $img_r = imagecreatefromjpeg($request->img);
        $dst_r = ImageCreateTrueColor( $request->w, $request->h ); 
        imagecopyresampled($dst_r, $img_r, 0, 0, $request->x, $request->y, $request->w, $request->h, $request->w,$request->h);
        header('Content-type: image/jpeg');
        imagejpeg($dst_r);
    }
   
    

    public function search_country(Request $request)
    {
        $return_data = [];        
        $search = $request->search;
        $list = DB::table("countries")->select('name','id')->limit(100);
        if(!empty($search))
        {        
            $list = $list->where('name','LIKE',"%{$search}%");
        }
        $list = $list->get();
        foreach ($list as $key => $value) {
            $return_data[] = array("id"=>$value->id,"text"=>$value->name,);
        }
        $data['results'] = $return_data;
        return response()->json($data, 200);
    }
    public function search_state(Request $request)
    {
        $return_data = [];        
        $search = $request->search;
        $id = $request->id;
        $list = DB::table("states")->where(["country_id"=>$id,])->select('name','id')->limit(100);
        if(!empty($search))
        {        
            $list = $list->where('name','LIKE',"%{$search}%");
        }
        $list = $list->get();
        foreach ($list as $key => $value) {
            $return_data[] = array("id"=>$value->id,"text"=>$value->name,);
        }
        $data['results'] = $return_data;
        return response()->json($data, 200);
    }
   
    
}
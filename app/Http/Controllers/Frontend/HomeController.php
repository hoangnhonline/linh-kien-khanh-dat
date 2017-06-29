<?php
namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\LoaiSp;
use App\Models\Cate;
use App\Models\Product;
use App\Models\Banner;
use App\Models\Settings;

use Helper, File, Session, Auth, Hash;

class HomeController extends Controller
{
    
    public static $loaiSp = []; 
    public static $loaiSpArrKey = [];    

    public function __construct(){
        
       

    }
    public function index(Request $request)
    {          
        $productArr = $totalArr = [];
        $hoverInfo = [];
        $loaiSp = LoaiSp::where('status', 1)->get();
        $bannerArr = [];          
        $loaiSpList = LoaiSp::where('status', 1)->orderBy('display_order', 'asc')->get();
        foreach($loaiSpList as $loaiSp){
            $query = Product::where('product.slug', '<>', '')
                    ->where('product.status', 1)
                    ->where('product.loai_id', $loaiSp->id)
                    ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')            
                    ->join('loai_sp', 'loai_sp.id', '=','product.loai_id')      
                    ->select('product_img.image_url as image_url', 'product.*', 'loai_sp.slug as slug_loai')                              
                    ->orderBy('product.id', 'desc');
            $totalArr[$loaiSp->id] = $query->count();
            $productArr[$loaiSp->id] = $query->limit(15)->get();
         }
        $newList = Product::where('product.slug', '<>', '')
                    ->where('product.status', 1)
                    ->where('product.is_hot', 1)                    
                    ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')            
                    ->join('loai_sp', 'loai_sp.id', '=','product.loai_id')      
                    ->select('product_img.image_url as image_url', 'product.*', 'loai_sp.slug as slug_loai')                              
                    ->orderBy('product.id', 'desc')->limit(20)->get();
        $settingArr = Settings::whereRaw('1')->lists('value', 'name');
        $seo = $settingArr;
        $seo['title'] = $settingArr['site_title'];
        $seo['description'] = $settingArr['site_description'];
        $seo['keywords'] = $settingArr['site_keywords'];
        $socialImage = $settingArr['banner'];                

        return view('frontend.home.index', compact('bannerArr', 'articlesArr', 'socialImage', 'seo', 'productArr', 'totalArr', 'newList'));

    }    
   
    /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function search(Request $request)
    {
        $tu_khoa = $request->keyword;       

        $productArr = Product::where('product.alias', 'LIKE', '%'.$tu_khoa.'%')->where('so_luong_ton', '>', 0)->where('price', '>', 0)->where('loai_sp.status', 1)                        
                        ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')                        
                        ->join('loai_sp', 'loai_sp.id', '=', 'product.loai_id')
                        ->select('product_img.image_url', 'product.*', 'thuoc_tinh')
                        ->orderBy('id', 'desc')->paginate(20);
        $seo['title'] = $seo['description'] =$seo['keywords'] = "Tìm kiếm sản phẩm theo từ khóa '".$tu_khoa."'";
        $hoverInfo = [];
        if($productArr->count() > 0){
            $hoverInfoTmp = HoverInfo::orderBy('display_order', 'asc')->orderBy('id', 'asc')->get();
            foreach($hoverInfoTmp as $value){
                $hoverInfo[$value->loai_id][] = $value;
            }
        }
        //var_dump("<pre>", $hoverInfo);die;
        return view('frontend.search.index', compact('productArr', 'tu_khoa', 'seo', 'hoverInfo'));
    }
     /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
    public function si(Request $request)
    {
       $query = Product::where('product.slug', '<>', '')
                    ->where('product.status', 1)                    
                    ->leftJoin('product_img', 'product_img.id', '=','product.thumbnail_id')            
                    ->join('loai_sp', 'loai_sp.id', '=','product.loai_id')      
                    ->select('product_img.image_url as image_url', 'product.*', 'loai_sp.slug as slug_loai')                              
                    ->orderBy('product.id', 'desc');            
        $productList = $query->limit(300)->get();
        $seo['title'] = $seo['description'] =$seo['keywords'] = "Báo giá bán sỉ";
       
        return view('frontend.pages.bao-gia-si', compact('seo', 'productList'));
    }
    public function ajaxTab(Request $request){
        $table = $request->type ? $request->type : 'category';
        $id = $request->id;

        $arr = Film::getFilmHomeTab( $table, $id);

        return view('frontend.index.ajax-tab', compact('arr'));
    }
    public function info(Request $request){        

        $seo['title'] = 'Hồ sơ công ty';
        $seo['description'] = 'Hồ sơ công ty';
        $seo['keywords'] = 'Hồ sơ công ty';
        $socialImage = '';
        return view('frontend.info.index', compact('seo', 'socialImage'));
    }

    public function contact(Request $request){        

        $seo['title'] = 'Liên hệ';
        $seo['description'] = 'Liên hệ';
        $seo['keywords'] = 'Liên hệ';
        $socialImage = '';
        return view('frontend.contact.index', compact('seo', 'socialImage'));
    }

    

    public function registerNews(Request $request)
    {

        $register = 0; 
        $email = $request->email;
        $newsletter = Newsletter::where('email', $email)->first();
        if(is_null($newsletter)) {
           $newsletter = new Newsletter;
           $newsletter->email = $email;
           $newsletter->is_member = Customer::where('email', $email)->first() ? 1 : 0;
           $newsletter->save();
           $register = 1;
        }

        return $register;
    }

}

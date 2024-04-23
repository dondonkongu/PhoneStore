<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminController extends Controller
{   
    public function index(){
        return view('layouts/content/Admin/dashboard');
    }
    public function create(){
        

        return view('layouts/content/Admin/create-product');
    }
    public function store(Request $request){
        $id =$request->id;
        $name =$request->name;
        $description =$request->description;
        $init_price =$request->init_price;
        $dis_price =$request->dis_price;
        $image =$request->image;
        $id_type =$request->id_type;
        $stock_quantity =$request->stock_quantity;
        $image_url =$request->image_url;
        $cpu =$request->cpu;
        $ram =$request->ram;
        $bo_nho_trong =$request->bo_nho_trong;
        $size_screen =$request->size_screen;
        $tech_screen =$request->tech_screen;
        $cam_sau =$request->cam_sau;
        $cam_truoc =$request->cam_truoc;
        $chipset =$request->chipset;
        $battery =$request->battery;
        $sim =$request->sim;
        $features =$request->features;
        $availability =$request->availability;
        $video_demo =$request->video_demo;      
        $title =$request->title;
        $image1 =$request->image1;
        $image2 =$request->image2;
        $image3 =$request->image3;
        $image4 =$request->image4;
        $image5 =$request->image5;
        $image6 =$request->image6;


        if($id > 0){
            DB::table('product')
            ->where('id',$id)
            ->update([
                'name'=>$name,
                'description'=>$description,
                'init_price'=>$init_price,
                'dis_price'=>$dis_price,
                'image'=>$image,
                'id_type'=>$request->id_type,
                'stock_quantity'=>$stock_quantity,
                'image_url'=>$image_url,
                'cpu'=>$cpu,
                'ram'=>$ram,
                'bo_nho_trong'=>$bo_nho_trong,
                'size_screen'=>$size_screen,
                'tech_screen'=>$tech_screen,
                'cam_sau'=>$cam_sau,
                'cam_truoc'=>$cam_truoc,
                'chipset'=>$chipset,
                'battery'=>$battery,
                'sim'=>$sim,
                'features'=>$features,
                'availability'=>$availability
    
            ]);
            DB::table('image_detail_product')
            ->where('id',$id)
            ->update([
                'id'=>$id,
                'video_demo'=>$video_demo,
                'title'=> $title,
                'image1'=>$image1,
                'image2'=>$image2,
                'image3'=>$image3,
                'image4'=>$image4,
                'image5'=>$image5,
                'image6'=>$image6,
            ]);

        }
        else{
            Db::table('product')->insert([
                'name'=>$name,
                'description'=>$description,
                'init_price'=>$init_price,
                'dis_price'=>$dis_price,
                'image'=>$image,
                'id_type'=>$request->id_type,
                'stock_quantity'=>$stock_quantity,
                'image_url'=>$image_url,
                'cpu'=>$cpu,
                'ram'=>$ram,
                'bo_nho_trong'=>$bo_nho_trong,
                'size_screen'=>$size_screen,
                'tech_screen'=>$tech_screen,
                'cam_sau'=>$cam_sau,
                'cam_truoc'=>$cam_truoc,
                'chipset'=>$chipset,
                'battery'=>$battery,
                'sim'=>$sim,
                'features'=>$features,
                'availability'=>$availability
            ]);
            Db::table('image_detail_product')
            ->insert([
                'video_demo'=>$video_demo,
                'title'=> $title,
                'image1'=>$image1,
                'image2'=>$image2,
                'image3'=>$image3,
                'image4'=>$image4,
                'image5'=>$image5,
                'image6'=>$image6,
            ]);
        }

        
        return redirect()->route('showProduct');

    }
    public function typeProductEdit(){
        $typeProductList=Db::table('type_product')->get();

        return view('layouts/content/Admin/type-product')->with([
            'typeProductList'=>$typeProductList,
        ]);
    }
   public function typeProductStore(Request $request){
        $name =$request->name;
        $description=$request->description;
        $image=$request->image;


        Db::table('type_product')->insert([
            'name'=>$name,
            'description'=>$description,
            'image'=>$image,
        ]);
       return redirect()->route('product');
    }
    public function show(){
        $productList = DB::table('product')->get();
        return view('layouts/content/Admin/display-product')->with([
            'productList'=>$productList,
        ]);
    }
    public function deleteProduct(Request $request){
        $id = $request->id;
        DB::table('product')->where('id',$id)->delete();
        DB::table('image_detail_product')->where('id',$id)->delete();
    }   
    public function editProduct(Request $request){
        $id = 0;
        $name=$description=$init_price=$dis_price=$image=$id_type=$stock_quantity=$image_url=$cpu=$ram=$bo_nho_trong=$size_screen=$tech_screen=$cam_sau=$cam_truoc=$chipset=$battery=$sim=$features=$availability="";
        $video_demo=$title=$image1=$image2=$image3=$image4=$image5=$image6="";
        if(isset($request->id)&& $request->id>0){
            $id = $request->id;

            $product = DB::table('product')->where('id',$id)->get();
            if($product!=null && count($product)>0){
                $name=$product[0]->name;
                $description=$product[0]->description;
                $init_price=$product[0]->init_price;
                $dis_price=$product[0]->dis_price;
                $image=$product[0]->image;
                $id_type=$product[0]->id_type;
                $stock_quantity=$product[0]->stock_quantity;
                $image_url=$product[0]->image_url;
                $cpu=$product[0]->cpu;
                $ram=$product[0]->ram;
                $bo_nho_trong=$product[0]->bo_nho_trong;
                $size_screen=$product[0]->size_screen;
                $tech_screen=$product[0]->tech_screen;
                $cam_sau=$product[0]->cam_sau;
                $cam_truoc=$product[0]->cam_truoc;
                $chipset=$product[0]->chipset;
                $battery=$product[0]->battery;
                $sim=$product[0]->sim;
                $features=$product[0]->features;
                $availability=$product[0]->availability;
    
            };
            $image_detail_product = DB::table('image_detail_product')->where('id',$id)->get();
            if($image_detail_product!=null && count($image_detail_product)>0){
                $video_demo=$image_detail_product[0]->video_demo;
                $title=$image_detail_product[0]->title;
                $image1=$image_detail_product[0]->image1;
                $image2=$image_detail_product[0]->image2;
                $image3=$image_detail_product[0]->image3;
                $image4=$image_detail_product[0]->image4;
                $image5=$image_detail_product[0]->image5;
                $image6=$image_detail_product[0]->image6;
            }


        }
       
        return view('layouts/content/Admin/create-product')->with([
                    'id'=>$id,
                    'name'=>$name,
                    'description'=>$description,
                    'init_price'=>$init_price,
                    'dis_price'=>$dis_price,
                    'image'=>$image,
                    'id_type'=>$id_type,
                    'stock_quantity'=>$stock_quantity,
                    'image_url'=>$image_url,
                    'cpu'=>$cpu,
                    'ram'=>$ram,
                    'bo_nho_trong'=>$bo_nho_trong,
                    'size_screen'=>$size_screen,
                    'tech_screen'=>$tech_screen,
                    'cam_sau'=>$cam_sau,
                    'cam_truoc'=>$cam_truoc,
                    'chipset'=>$chipset,
                    'battery'=>$battery,
                    'sim'=>$sim,
                    'features'=>$features,
                    'availability'=>$availability,
                    'video_demo'=>$video_demo,
                    'title'=>$title,
                    'image1'=>$image1,
                    'image2'=>$image2,
                    'image3'=>$image3,
                    'image4'=>$image4,
                    'image5'=>$image5,
                    'image6'=>$image6,

        ]);
    }
    public function displayUsers(Request $request){
        $userList = DB::table('users')->get();
        return view('layouts/content/Admin/manage-accounts')->with([
            'userList'=>$userList,
        ]);
    }
    public function displayBills(Request $request) {
        $billList = DB::table('bills')
        ->select(
            'bills.id as bill_id',
            'bills.date_order',
            'bills.total',	
            'bills.note',
            'customers.id as customers_id',
            'customers.name as customer_name',
            'customers.phone_number as phone_customer',
            'customers.address as address_customer',
            'customers.note as note_customer',
            'bill_detail.id as bill_detail_id',
            'bill_detail.id_product',
            'bill_detail.quantity',
            'bill_detail.price',
            'product.name as product_name',
            'product.image_url as product_image_url',
        )
        ->join('customers', 'bills.id_customer', '=', 'customers.id')
        ->join('bill_detail', 'bills.id', '=', 'bill_detail.id')
        ->join('product', 'bill_detail.id_product', '=', 'product.id')
        ->get();

       
        return view('layouts/content/Admin/manage-bills')->with('billList', $billList);
    }
    
}

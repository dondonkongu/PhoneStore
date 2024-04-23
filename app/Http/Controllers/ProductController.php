<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class ProductController extends Controller
{
    public function showProduct(Request $request){
        $product = DB::table('product');
        if($request->id && $request->id>0){
            $product =$product->where('id_type',$request->id);
        }
        $product = $product->get();

        return view('layouts/content/show-product')->with([
            'product'=>$product	,
        ]);
    }

    public function showDetailproduct(Request $request,$id){
        $detail = DB::table('product')->where('id',$id)->first();
        $image_product_detail = DB::table('image_detail_product')->where('id',$id)->first();
        $related_product = DB::table('product')->where('id_type',$detail->id_type)
        ->paginate(4);
        $category = DB::table('type_product')->where('id',$detail->id_type)->first();
        
        $faq = DB::table('faq_questions')
        ->where('id_product',$id)
        ->get();
        return view('layouts/content/show-detail-product')->with([
            'detail'=>$detail,
            'image_product_detail'=>$image_product_detail,
            'related_product'=>$related_product,
            'faq'=>$faq,
            'category'=>$category
        ]);
    }
   public function showCart(Request $request){
        $cartList =[];
        if(isset($_COOKIE['cartList'])){
            $cartList = $_COOKIE['cartList'];
            $arr = json_decode($cartList);
            $ids=[];
            foreach($arr as $item){
                $ids[] = $item->id;
            }
            $cartList = DB::table('product')->whereIn('id',$ids)
            ->select('id','name','init_price','dis_price')
            ->get();
            foreach($arr as $item){
                foreach($cartList as $product){
                    if($item->id == $product->id){
                        $item->name = $product->name;
                        $item->price = $product->dis_price;
                        if($item->price == 0){
                            $item->price = $product->init_price;
                        }
                        break;
                     
                    }

                }
            }
            return view('layouts/content/cart')->with([
                'cartList'=>$arr
            ]);
        }else
        {
            return view('layouts/content/cart')->with([
                'cartList'=>$cartList
            ]);
            
        }
       
   }
   public function payment(Request $request){
        $cartList =[];
        if(isset($_COOKIE['cartList'])){
            $cartList = $_COOKIE['cartList'];
            $arr = json_decode($cartList);
            $ids=[];
            foreach($arr as $item){
                $ids[] = $item->id;
            }
            $cartList = DB::table('product')->whereIn('id',$ids)
            ->select('id','name','init_price','dis_price','image_url')
            ->get();
            foreach($arr as $item){
                foreach($cartList as $product){
                    if($item->id == $product->id){
                        $item->name = $product->name;
                        $item->price = $product->dis_price;
                        $item->thumbnails = $product->image_url;
                        if($item->price == 0){
                            $item->price = $product->init_price;
                        }
                        break;
                     
                    }

                }
            }
            return view('layouts/content/payment')->with([
                'cartList'=>$arr
            ]);
        }
    

   }
   public function storePayment(Request $request){
    $cartList =[];

    if(isset($_COOKIE['cartList'])){
        $cartList = $_COOKIE['cartList'];
        $arr = json_decode($cartList);
        $ids=[];
        foreach($arr as $item){
            $ids[] = $item->id;
        }
        $cartList = DB::table('product')->whereIn('id',$ids)
        ->select('id','name','init_price','dis_price')
        ->get();
        $total=0;
        foreach($arr as $item){
            foreach($cartList as $product){
                if($item->id == $product->id){
                    $item->name = $product->name;
                    $item->price = $product->dis_price;
                    if($item->price == 0){
                        $item->price = $product->init_price;
                    }
                    $total += $item->price * $item->quantity;
                    break;
                 
                }

            }
        }
    }
    $name=$request->name;
    $email=$request->email;
    $phoneNumber=$request->phoneNumber;
    $address=$request->address;
    $note=$request->note;
    $today= date('Y-m-d H:i:s');
    
        DB::table('customers')->insert([
            'name'=>$name,
            'email'=>$request->email,
            'phone_number'=>$phoneNumber,
            'address'=>$address,
            'note'=>$note,
            'created_at'=>$today,
            'updated_at'=>$today,
        ]);
    $user = DB::table('customers')
    ->where('phone_number',$phoneNumber)
    ->where('created_at',$today)
    ->get();

    $id_customer = $user[0]->id;
    $payment=0;
    $date_order = Date('y-m-d');
    $status='Đang chờ xử lý';
    Db::table('bills')->insert([
        'id_customer'=>$id_customer,
        'date_order'=>$date_order,
        'total'=>$total,
        'payment'=>$payment,
        'note'=>$status,
        'created_at'=>$today,
        'updated_at'=>$today,
    ]);
    $bill = DB::table('bills')
    ->where('id_customer',$id_customer)
    ->where('created_at',$today)
    ->get();
    $id_bill = $bill[0]->id;

    foreach ($arr as $item) {
        Db::table('bill_detail')->insert([
            'id_bill'=>$id_bill,
            'id_product'=>$item->id,
            'quantity'=>$item->quantity,
            'price'=>$item->price,
            'created_at'=>$today,
            'updated_at'=>$today
        ]);
    }

    $response = new Response(redirect()->route('home'));
    $response->withCookie(cookie()->forget('cartList'));

    return $response;

   }

}

<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ category;
use DB;



class DataController extends Controller
{
//        public function __construct()
//    {
//        header('Access-Control-Allow-Origin: *');
//        header('Access-Control-Allow-Credentials: true');
//        header('Access-Control-Allow-Headers: Origin, Content-Type, Accept');
//        header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
//
//
//    }


    public function open()
    {
        $data = "This data is open and can be accessed without the client being authenticated";
        return response()->json(compact('data'),200);

    }

    public function closed()
    {
        $data = "Only authorized users can see this";
        return response()->json(compact('data'),200);
    }

    public function getcategory()
    {
//       $data=category::all();
        $data=DB::table('categories')->select('*')->get();
        return response()->json(['data'=>$data,'success'=>true]);
    }

    public function addCategory(Request $request)
    {

         $name=$request->name;
         $description= $request->description;
         $category = new category();
          $data ['category_name'] =$name;
          $data ['category_description']= $description;
           $category->create($data);
        //  $description=$request->event_title_description;
          return response()->json(
              ["data"=>   $data,
               "success"=>true
              ]);

    }

    public function delete(Request $request )
    {
        $id=$request->id;
        $update=category::where('id','=',$id)
                ->delete();
        return response()->json([
            "data"=>$id,
            "success"=>$update
        ]);
    }

    public function categoryById(Request $request)
    {
        $id=$request->id;
        $data=DB::table('categories')
            ->select('*')
            ->where('id','=',$id)
            ->get();

        return response()->json([
            'data'=>$data,
            "success"=>true
        ]);
    }
        public function addProduct(Request $request)
            {
                $data=$request->all();
//            $data=$request->name;

                return response()->json([
                    'data'=>$data,
                    "success"=>true
                ]);
            }



}
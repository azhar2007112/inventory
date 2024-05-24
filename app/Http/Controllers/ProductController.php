<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\BrandModel;

use App\Models\ColorModel;
use App\Models\SubCategoryModel;
class ProductController extends Controller
{

public function getProductSearch(Request $request)
{

    
  
 
    $data['meta_title'] = 'Search';
            $data['meta_description'] = '';
            $data['meta_keywords'] = '';
            $getProduct = ProductModel::getProduct();

            $page = 0;
            if(!empty($getProduct->nextPageUrl()))
            {
                $parse_url = parse_url($getProduct->nextPageUrl());
                if(!empty($parse_url['query']))
                {
                    parse_str($parse_url['query'],$get_array);
                    $page = !empty($get_array['page']) ? $get_array['page'] : 0;
                }
            }
            $data['page']= $page;
            

            $data['getProduct'] = $getProduct;
            $data['getBrand'] = BrandModel::getRecordActive();

            $data['getColor'] = ColorModel::getRecordActive();
    return view('product.list',$data);

}


    public function getCategory($slug,$subslug = '')
    {
        
        $getProductSingle = ProductModel::getSingleSlug($slug);

        $getCategory = CategoryModel::getSingleSlug($slug);
        $getSubCategory = SubCategoryModel::getSingleSlug($subslug);
      

        $data['getBrand'] = BrandModel::getRecordActive();

        $data['getColor'] = ColorModel::getRecordActive();

if(!empty($getProductSingle))
{
    $data['meta_title'] = $getProductSingle->title;
    $data['meta_description'] = $getProductSingle->short_description;


   
    $data['getProduct'] = $getProductSingle;
    
    return view('product.detail',$data);
}


     else if(!empty($getCategory) && !empty($getSubCategory ))      
        {
            $data['meta_title'] = $getSubCategory->meta_title;
            $data['meta_description'] = $getSubCategory->meta_description;
            $data['meta_keywords'] = $getSubCategory->meta_keywords;

            $data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);

            $data['getProduct'] = ProductModel::getProduct($getCategory->id,$getSubCategory->id);
            $data['getCategory'] = $getCategory;
            $data['getSubCategory'] = $getSubCategory;
            return view('product.list',$data);
        } 
else if(!empty($getCategory))
{
$data['getSubCategoryFilter'] = SubCategoryModel::getRecordSubCategory($getCategory->id);

    $data['getCategory'] = $getCategory;
    $data['meta_title'] = $getCategory->meta_title;
            $data['meta_description'] = $getCategory->meta_description;
            $data['meta_keywords'] = $getCategory->meta_keywords;
            $data['getProduct'] = ProductModel::getProduct($getCategory->id);
    return view('product.list',$data);
}
else{
    abort(404);
}

    }

public function getFilterProductAjax(Request $request)
{
    
    
    $getProduct = ProductModel::getProduct();
   
    return response()->json([
        "status"=>true,
        "success"=>view("product._list",[
            "getProduct"=>$getProduct,
        ])->render(),
        ],200);
}

}

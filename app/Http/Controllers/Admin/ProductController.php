<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\BrandModel;
use App\Models\ColorModel;
use App\Models\ProductColorModel;
use App\Models\ProductImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;


use Illuminate\Support\Facades\Auth as FacadesAuth;

class ProductController extends Controller
{
    public function list()
    {
        $data['getRecord'] = ProductModel::getRecord();
        $data['getPhoto'] = ProductImageModel::all();
        $data['header_title'] = 'Product';
        return view('admin.product.list', $data);
    }
    public function add()
    {

        $data['header_title'] = 'Add New Product';
        $data['getCat'] = CategoryModel::getRecord();
        $data['getSubCat'] = SubCategoryModel::all();
        $data['getColor'] = ColorModel::all();
        return view('admin.product.add', $data);
    }

    public function insert(Request $request)

    {
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $title = trim($request->title);


        $product = new ProductModel();
        $product_photo = new ProductImageModel();
        $product->title = $title;
        $product->created_by = FacadesAuth::user()->id;
        $product->price = $request->price;
        $product->category_id = $request->category;
        $product->sub_category_id = $request->sub_category;
        $product->save();
        // Uploading image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/upload/product'); // public/uploads/photos
            $image->move($destinationPath, $imageName);

            $product_photo->product_id = $product->id;
            $product_photo->image_name = $imageName;
            $product_photo->image_extension = $image->getClientOriginalExtension();
            $product_photo->order_by = Auth::user()->id;
            $product_photo->save();
        }

        $color = new ProductColorModel();
        $color->product_id = $product->id;
        $color->color_id = $request->color;
        $color->save();


        $slug = Str::slug($title, "-");
        $checkSlug = ProductModel::checkSlug($slug);
        if (!empty($checkSlug)) {
            $product->slug = $slug;
            $product->save();
        } else {
            $new_slug = $slug . '-' . $product->id;
            $product->slug = $new_slug;
            $product->save();
        }
        return redirect('/admin/product/list');
    }

    public function edit($product_id)
    {
        $product = ProductModel::getSingle($product_id);
        if (!empty($product)) {
            $data['getCategory'] = CategoryModel::getRecordActive();
            $data['getBrand'] = BrandModel::getRecordActive();
            $data['getColor'] = ColorModel::getRecordActive();
            $data['product'] = $product;

            $data['getSubCategory'] = SubCategoryModel::all();
            $data['header_title'] = 'Edit Product';
            return view('admin.product.edit', $data);
        }
    }

    public function update($product_id, Request $request)
    {
        $product = ProductModel::getSingle($product_id);
        if (!empty($product)) {
            if ($request->hasFile('photo')) {
                $image = $request->file('photo');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('/upload/product'); // public/uploads/photos
                $image->move($destinationPath, $imageName);

                $product_photo = ProductImageModel::where('product_id', $product_id)->first();
                $product_photo->product_id = $product->id;
                $product_photo->image_name = $imageName;
                $product_photo->image_extension = $image->getClientOriginalExtension();
                $product_photo->order_by = Auth::user()->id;
                $product_photo->save();
            }

            $product->title = trim($request->title);
            $product->sku = trim($request->sku);
            $product->category_id = trim($request->category_id);
            $product->sub_category_id = trim($request->sub_category_id);
            $product->brand_id = trim($request->brand_id);
            $product->price = trim($request->price);
            $product->old_price = trim($request->old_price);
            $product->short_description = trim($request->short_description);
            $product->status = trim($request->status);
            $product->save();

            ProductColorModel::DeleteRecord($product->id);

            if (!empty($request->color_id)) {
                foreach ($request->color_id as $color_id) {
                    $color = new ProductColorModel;
                    $color->color_id = $color_id;
                    $color->product_id = $product->id;
                    $color->save();
                }
            }
            Alert::success('Success', 'Product Updated');
            return redirect()->back();
        } else {
            abort(404);
        }
    }

    public function image_delete($id)
    {
        $image = ProductImageModel::getSingle($id);
        if (!empty($image->getLogo())) {
            unlink('upload/product/' . $image->image_name);
        }
        $image->delete();
        Alert::success('Success', 'Product Deleted');
        return redirect()->back();
    }
    public function product_image_sortable(Request $request)
    {
        $i = 1;
        foreach ($request->photo_id as $photo_id) {
            $image = ProductImageModel::getSingle($photo_id);
            $image->order_by = $i;
            $image->save();

            $i++;
        }
        $json['success'] = true;
        echo json_encode($json);
    }
}

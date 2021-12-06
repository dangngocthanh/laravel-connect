<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function create()
    {
        try {
            $category = Category::all();
            $data = [
                'status' => 'success',
                'data' => $category,
            ];
        } catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => 'loi he thong'
            ];
        }
        return response()->json($data);
    }

    function store(Request $request)
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->categoryId = $request->categoryId;
            $product->save();
            $data = [
                'status' => 'success',
                'message' => 'them moi thanh cong'
            ];
        } catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => 'them moi khong thanh cong'
            ];
        }
        return response()->json($data);
    }

    function update(Request $request)
    {
        try {
            $product = Product::findOrFail($request->id);
            $product->name = $request->name;
            $product->quantity = $request->quantity;
            $product->price = $request->price;
            $product->categoryId = $request->categoryId;
            $product->save();
            $data = [
                'status' => 'success',
                'message' => 'cap nhat thanh cong'
            ];
        } catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => 'cap nhat khong thanh cong'
            ];
        }
        return response()->json($data);
    }

    function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
            $data = [
                'status' => 'success',
                'data' => $product
            ];
        } catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => 'khong co san pham nay'
            ];
        }
        return response()->json($data);
    }

    function index(): \Illuminate\Http\JsonResponse
    {
        try {
            $product = Product::with('category')->get();
            $data = [
                'status' => 'success',
                'data' => $product
            ];
        } catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => $exception->getMessage()
            ];
        }
        return response()->json($data);
    }

    function delete($id)
    {
        try {
            Product::destroy($id);
            $data = [
                'status' => 'success',
                'data' => 'xoa thanh cong'
            ];
        } catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => 'xoa khong thanh cong'
            ];
        }
        return response()->json($data);
    }


}

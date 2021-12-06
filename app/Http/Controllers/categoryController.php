<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    function index()
    {
        try {
            $categories = Category::all();
            $data = [
                'status' => 'success',
                'data' => $categories,
                'message' => 'them moi thanh cong'
            ];
        }catch (\Exception $exception){
            $data = [
                'status' => 'error',
                'data' => [],
                'message' => 'them moi khong thanh cong'
            ];
        }
        return response()->json($data);
    }

    function store(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;
            $category->save();
            $data = [
                'status' => 'success',
                'message' => 'Them moi thanh cong ^^'
            ];
        }catch (\Exception $exception){
            $data = [
                'status' => 'error',
                'message' => 'Them moi khong thanh cong ^^'
            ];
        }
        return response()->json($data);

    }

    function edit($id)
    {
        try{
            $category = Category::findOrFail($id);
            $data = [
                'status' => 'success',
                'data' => $category
            ];
        }catch (\Exception $exception){
            $data =[
                'status' => 'error',
                'message' => 'khong co the loai nay'
            ];
        }
        return response()->json($data);
    }

    function update(Request $request)
    {
        try {
            $category = Category::findOrFail($request->id);
            $category->name = $request->name;
            $category->save();
            $data = [
                'status' => 'success',
                'message' => 'cap nhat thanh cong'
            ];
        }catch (\Exception $exception){
            $data = [
                'status' => 'error',
                'message' => 'chp nhat khong thanh cong'
            ];
        }
       return response()->json($data);

    }

    function delete($id)
    {
        try {
            Category::destroy($id);
            $data = [
                'status' => 'success',
                'message' => 'xoa thanh cong'
            ];
        }catch (\Exception $exception){
            $data = [
                'status' => 'error',
                'message' => 'xoa khong thanh cong'
            ];
        }
        return response()->json($data);
    }
}

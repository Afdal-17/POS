<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        return view('Category.index', compact('data'));
    }

    public function create()
    {
        $category = Category::all();
        return view('Category.form', compact('category'));

    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            Category::create($request->all());
            DB::commit();
            return redirect('Category')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('Category')->with('error', 'Data gagal untuk disimpan!');
        }
    }

    public function edit(Category $Category)
    {
        $category = Category::all();
        return view('Category.form_edit', compact('Category', 'category'));
    }

    public function update(Request $request, Category $Category)
    {
        DB::beginTransaction();
        try {
            $Category->update($request->all());
            DB::commit();
            return redirect('Category')->with('success', 'Data berhasil disimpan');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect('Category')->with('error', $e->getMessage());
        }
    }

    public function destroy(Category $Category)
    {
        try{
            $Category->delete();
            return redirect('Category')->with('success', ' Data berhasil dihapus');
            
                }catch (\Exception $e) {
                    return redirect('Category')->with('error', $e->getMessage());
                }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customer::all();
        return view('Customer.index', compact('data'));
    }

    public function create()
    {
        $category = Category::all();
        return view('Customer.form', compact('category'));

    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try{
            Customer::create($request->all());
            DB::commit();
            return redirect('Customer')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect('Customer')->with('error', 'Data gagal untuk disimpan!');
        }
    }

    public function edit(Customer $Customer)
    {
        $category = Category::all();
        return view('Customer.form_edit', compact('Customer', 'category'));
    }

    public function update(Request $request, Customer $Customer)
    {
        DB::beginTransaction();
        try {
            $Customer->update($request->all());
            DB::commit();
            return redirect('Customer')->with('success', 'Data berhasil disimpan');

        }catch (\Exception $e) {
            DB::rollBack();
            return redirect('Customer')->with('error', $e->getMessage());
        }
    }

    public function destroy(Customer $Customer)
    {
        try{
            $Customer->delete();
            return redirect('Customer')->with('success', ' Data berhasil dihapus');
            
                }catch (\Exception $e) {
                    return redirect('Customer')->with('error', $e->getMessage());
                }
    }
}

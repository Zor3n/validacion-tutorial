<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('form.form', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'bail|required|string|max:20',
            'category' => ['bail', 'required', Rule::in(Category::all('id')->pluck('id'))],
            'price' => 'bail|required|numeric|integer|max_digits:8',
            'stock' => 'bail|required|numeric|integer|max_digits:4',
            'expire' => 'bail|required|date_format:Y-m-d',
            'details' => 'bail|nullable|string|max:200',
        ]);

        if ($validator->fails()) {
            return redirect(route('form.index'))
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $product = new Product();

            $product->name = $request->name;
            $product->category_id = $request->category;
            $product->price = $request->price;
            $product->stock = $request->stock;
            $product->expire = $request->expire;
            $product->details = $request->details;

            $product->save();

            return redirect(route('form.index'));
        } catch (\Throwable $th) {
            // throw $th;
            return redirect(route('form.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

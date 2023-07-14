<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(ProductCategory $productCategory)
  {
    return view('product-categories.index', [
      'product_categories' => $productCategory::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(ProductCategory $productCategory)
  {
    return view('product-categories.create', [
      'product_categories' => $productCategory::all()
    ]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreProductCategoryRequest $request)
  {
    $validated = arrayToObject($request->validated());
    $productCategory = ProductCategory::create([
      'name' => $validated->name,
      'code' => $validated->code,
      'parent_id' => $validated->parent
    ]);

    return to_route('product-categories.edit', $productCategory);
  }

  /**
   * Display the specified resource.
   */
  public function show(ProductCategory $productCategory)
  {
    return view('product-categories.show', [
      'product_category' => $productCategory
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(ProductCategory $productCategory)
  {
    return view('product-categories.edit', [
      'product_category' => $productCategory
    ]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
  {
    $validated = arrayToObject($request->validated());
    $productCategory->update([
      'name' => $validated->name,
      'code' => $validated->code,
      'parent_id' => $validated->parent
    ]);

    return to_route('product-categories.edit', $productCategory);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(ProductCategory $productCategory)
  {
    $productCategory->delete();

    return to_route('product-categories.index');
  }
}

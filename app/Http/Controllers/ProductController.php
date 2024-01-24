<?php

namespace App\Http\Controllers;

use App\Http\Requests\API\Product\AddProductRequest;
use App\Models\Product;
use App\SOLID\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $data = Product::latest()->paginate(100);
        return view('products.index', compact('data'));
    }

    public function store(AddProductRequest $r)
    {
        return $this->productService->create($r->all());
    }
}

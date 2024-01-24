<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
        return $this->productService->getAll();
    }

    public function getGrategerThan()
    {
        return $this->productService->getGrategerThan();
    }

    public function update($id,Request $r)
    {
        return $this->productService->update($id,$r->all());
    }

    public function destroy($id)
    {
        return $this->productService->delete($id);
    }

}

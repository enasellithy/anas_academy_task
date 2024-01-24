<?php

namespace App\SOLID\Repositories;

use App\Http\Resources\API\ProductResource;
use App\Models\Product;
use App\SOLID\Traits\JsonTrait;

class ProductRepository
{
    use JsonTrait;
    public function getAll()
    {
        $products = ProductResource::collection(Product::latest()->paginate(10));
        $data['products'] = $products->response()->getData();
        return $this->whenDone($data);
    }

    public function getGrategerThan()
    {
        $products = ProductResource::collection(Product::getGreateThan()->latest('price')->paginate(10));
        $data['products'] = $products->response()->getData();
        return $this->whenDone($data);
    }

    public function create(array $data)
    {
        $products = Product::create($data);
        $data['products'] = new ProductResource(Product::find($products->id));
        return $this->whenDone($data);
    }

    public function update(array $data,$id)
    {
        $this->authorize('update', $id);
        Product::where('id',$id)->update($data);
        return $this->whenDone('');
    }

    public function delete($id)
    {
        $this->authorize('delete', $id);
        Product::find($id)->delete();
        return $this->whenDone('');
    }
}

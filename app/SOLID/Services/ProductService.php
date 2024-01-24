<?php

namespace App\SOLID\Services;

use App\SOLID\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    public function getGrategerThan()
    {
        return $this->productRepository->getGrategerThan();
    }

    public function create($data)
    {
        return $this->productRepository->create($data);
    }

    public function update($id,$data)
    {
        return $this->productRepository->update($id,$data);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}

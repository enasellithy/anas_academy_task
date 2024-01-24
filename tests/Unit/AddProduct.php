<?php

namespace Tests\Unit;

use App\Http\Controllers\ProductController;
use Tests\TestCase;

class AddProduct extends TestCase
{
    public function test_example(): void
    {
        $controller = new ProductController();
        $controller->store(['name' => 'test', 'price' => 15, 'quantity' => 7, 'category_id' => rand(1,100)]);
        $this->assertTrue(true);
    }
}

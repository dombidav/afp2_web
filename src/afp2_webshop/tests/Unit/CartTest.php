<?php

namespace Tests\Unit;

use App\Http\Controllers;
//use PHPUnit\Framework\TestCase;
use App\Order;
use App\Package;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class CartTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testStatusIsOk(){
        //Set up
        $response = $this->get('/cart');

        //Execute
        $response->assertStatus(200);
    }

    public function testShowMethod(){
        $table_count = Order::all()->count();
        $response = $this->get("/cart/add/5");

        $response->assertStatus(200);
        $this->assertEquals($table_count + 1, Order::all()->count());
    }
}

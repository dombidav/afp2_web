<?php

namespace Tests\Unit;

use App\Http\Controllers;
//use PHPUnit\Framework\TestCase;
use App\Order;
use App\Package;
use App\User;
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

    public function testCartStatus(){
        $response = $this->get('/cart');
        $response->assertStatus(200);
    }

    public function testCartIndexAsGuest(){
        $response = $this->call('GET', '/cart', [], ['guest_id' => '0']);
        $response->assertStatus(200);

        $response->assertSeeText(':');
    }

    public function testCartIndexAsUser(){
        Order::emptyForTest();
        $response = $this->actingAs(User::testUser())->get('/cart');
        $response->assertStatus(200);

        $response->assertSeeText(':');
    }

    public function testCartShow(){
        $user_id = 0;
        $order_id = '0000000000000000';
        $book_id = 1;
        Order::CreateCart($user_id, $order_id);
        Package::IncrementQuantityOrInsertNew($order_id, $book_id);
        $response = $this->get("/cart/$user_id");
        $response->assertStatus(200);

        $response->assertSeeText(':');
    }

    public function testCartAddAsGuest(){
        Order::emptyForTest();
        $book = '5';
        $cookies = ['guest_id' => encrypt('0', true)];
        $response = $this->call('GET', "cart/add/$book", [], $cookies);
        $response->assertStatus(200);

        $response->assertSeeText(':');
    }

    public function testCartAddAsUser(){
        Order::emptyForTest();
        $book = '5';
        $user = User::testUser();
        $response = $this->actingAs($user)->get("cart/add/$book");
        $response->assertSeeText(':');
    }
}

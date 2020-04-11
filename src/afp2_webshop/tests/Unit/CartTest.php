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
        $response = $this->get('/cart')->assertStatus(200);
        $content = json_decode($response->content());
        $this->assertNotNull($content);
        $this->assertEmpty($content);
    }

    public function testCartIndexAsGuest(){
         $response = $this->call('GET', '/cart', [], ['guest_id' => '0']);
         $response->assertStatus(200);

         $content = json_decode($response->content());
         $this->assertNotNull($content);
         $this->assertEmpty($content);
    }

    public function testCartIndexAsUser(){
        Order::emptyForTest();
        $response = $this->actingAs(User::testUser())->get('/cart');
        $response->assertStatus(200);

        $content = json_decode($response->content());
        $this->assertNotNull($content);
        $this->assertEmpty($content);
    }

    public function testCartAddAsGuest(){
        Order::emptyForTest();
        $book = '5';
        $cookies = ['guest_id' => encrypt('0', true)];
        $response = $this->call('GET', "/cart/add/$book", [], $cookies);
        $response->assertStatus(200);

        $content = json_decode($response->content());
        $this->assertNotEmpty($content);
        $this->assertEquals(true, $content->Success);
        $this->assertEquals(Order::getCartIDFor(0), $content->Order);
        $this->assertEquals($book, $content->Book);
    }
}

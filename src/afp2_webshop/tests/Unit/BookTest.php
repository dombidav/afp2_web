<?php

namespace Tests\Unit;

use App\Book;
//use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class BookTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfBookStatusIsOkay()
    {
        $response = $this->get('/shop');
        $response->assertStatus(200);
    }

    public function testMultipleBookShow(){
        $response = $this->get('/shop');
        $response->assertStatus(200);

        $content = json_decode($this->get('/shop')->content());
        factory(Book::class, 2)->create();
        $this->assertNotEmpty($content[1]->id);
    }

    public function testSingleBookShow(){
        $response = $this->get('/shop/5');
        $response->assertStatus(200);

        $content = json_decode($this->get('/shop/5')->content());
        factory(Book::class)->create();
        $this->assertNotEmpty($content->id);
    }

    public function testBookFactory(){
        $table_count = Book::all()->count();
        factory(Book::class)->create();

        $this->assertEquals($table_count + 1, Book::all()->count());
    }
}

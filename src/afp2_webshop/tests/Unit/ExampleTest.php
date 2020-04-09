<?php

namespace Tests\Unit;

use App\Book;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfStatusIsOkay()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }


        /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testGetBooksFromDatabase(){
        // Set up
        $books = Book::all();

        //Execute
        $this->assertNotEmpty($books);
        $this->assertNotEquals($books, "asd");
    }
}

<?php

namespace Tests\Unit;

use App\Author;
use App\Book;
//use PHPUnit\Framework\TestCase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthorTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfAuthorStatusIsOkay()
    {
        $response = $this->get('/author');
        $response->assertStatus(200);
    }

    public function testMultipleAuthorShow(){
        $response = $this->get('/author');
        $response->assertStatus(200);

        $content = json_decode($this->get('/author')->content());
        $this->assertNotEmpty($content[1]->id);
    }

    public function testSingleAuthorShow(){
        $response = $this->get('/author/5');
        $response->assertStatus(200);

        $content = json_decode($this->get('/author/5')->content());
        $this->assertNotEmpty($content->id);
    }

    public function testAuthorAdd(){
        $table_count = Author::all()->count();
        factory(Author::class)->create();

        $this->assertEquals($table_count + 1, Author::all()->count());
    }
}

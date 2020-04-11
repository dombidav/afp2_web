<?php

namespace Tests\Unit;

use App\Author;
use App\Book;
//use PHPUnit\Framework\TestCase;
use App\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
//use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    public function testIfProfileStatusIsOkay()
    {
        $response = $this->get('/profile');
        $response->assertStatus(403);
    }

    /*public function testUserFactory(){
        $table_count = User::all()->count();
        factory(User::class)->create();

        $this->assertEquals($table_count + 1, User::all());
    }*/

    public function testIfProfileShowsData(){
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/profile');

        $response->assertStatus(200);
        $this->assertNotEmpty(json_decode($response->content())->name);
    }
}

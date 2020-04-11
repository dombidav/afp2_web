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
}

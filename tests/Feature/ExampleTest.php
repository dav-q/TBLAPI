<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\TypeDocuments;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    // use RefreshDatabase;
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

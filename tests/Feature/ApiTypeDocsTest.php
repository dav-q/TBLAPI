<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\TypeDocuments;

class ApiTypeDocsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_without_header_api_request()
    {
        $response =
        $this->getJson('/api/type_documents');
        $response->assertOk();
        $response->assertStatus(200);
    }

    public function test_get_all_api_request()
    {
        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->getJson('/api/type_documents');

        $response->assertOk();
        $response->assertStatus(200);
    }

    public function test_store_api_request()
    {
        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->postJson('/api/type_documents', ['name' => 'Unit Test','short_name'=>'U.Ts']);

        $response->assertOk();

        $response->assertStatus(200);
    }

    public function test_show_api_request()
    {
        $new=TypeDocuments::create(['name'=>'Test Created','short_name'=>'Ts.C']);
        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->getJson('/api/type_documents/'.$new->id);

        $response->assertOk();

        $response->assertStatus(200);
    }

    public function test_update_api_request()
    {
        $new=TypeDocuments::create(['name'=>'Test Created','short_name'=>'Ts.C']);
        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->putJson('/api/type_documents/'.$new->id,['name'=>'Test Created Update','short_name'=>'Ts.U']);

        $response->assertOk();

        $response->assertStatus(200);
    }

    public function test_delete_api_request()
    {
        $new=TypeDocuments::create(['name'=>'Test Delete','short_name'=>'Ts.D']);
        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->deleteJson('/api/type_documents/'.$new->id);

        $response->assertOk();

        $response->assertStatus(200);
    }



}

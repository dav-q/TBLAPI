<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class ApiUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_without_header_api_request()
    {
        $response =
        $this->getJson('/api/users');
        $response->assertOk();
        $response->assertStatus(200);
    }

    public function test_get_all_api_request()
    {
        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->getJson('/api/users');

        $response->assertOk();
        $response->assertStatus(200);
    }

    public function test_store_api_request()
    {
        $dataStore=[
            "names"=>"Unit",
            "last_names"=>"Test",
            "number_document"=>"123546",
            "type_document_id"=>"1",
            "birthday"=>"1999-01-19",
            "email"=>"unit@test.com",
            "password"=>"UT123546",
        ];

        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->postJson('/api/users',$dataStore);

        $response->assertOk();

        $response->assertStatus(200);
    }

    public function test_show_api_request()
    {
        $dataStore=[
            "names"=>"UnitShow",
            "last_names"=>"TestShow",
            "number_document"=>"123546",
            "type_document_id"=>"1",
            "birthday"=>"1999-01-19",
            "email"=>"unitShow@test.com",
            "password"=>"UT123546",
        ];
        $new=User::create($dataStore);
        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->getJson('/api/users/'.$new->id);

        $response->assertOk();

        $response->assertStatus(200);
    }

    public function test_update_api_request()
    {
        $dataStore=[
            "names"=>"UnitUpdate",
            "last_names"=>"TestUpdate",
            "number_document"=>"123546",
            "type_document_id"=>"1",
            "birthday"=>"1999-01-19",
            "email"=>"unitUpdate@test.com",
            "password"=>"UT123546",
        ];
        $new=User::create($dataStore);
        $dataStore["number_document"]="987654";
        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->putJson('/api/users/'.$new->id,$dataStore);

        $response->assertOk();

        $response->assertStatus(200);
    }

    public function test_delete_api_request()
    {
        $dataStore=[
            "names"=>"UnitDelete",
            "last_names"=>"TestDelete",
            "number_document"=>"123546",
            "type_document_id"=>"1",
            "birthday"=>"1999-01-19",
            "email"=>"unitDelete@test.com",
            "password"=>"UT123546",
        ];
        $new=User::create($dataStore);
        $response =
        $this->withHeaders([
            'api-key-laika' => 'FullAcces',
        ])->deleteJson('/api/users/'.$new->id);

        $response->assertOk();

        $response->assertStatus(200);
    }
}

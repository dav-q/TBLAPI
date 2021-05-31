<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use GuzzleHttp\Client;

class EndPointsController extends Controller
{
    //

    public $client='';

    public function __construct(){
        $this->client = new Client(['base_uri' => env('API_ENDPOINT'),'headers'=>['Content-Type'=>'application/json','Accept'=>'application/json','api-key-laika'=>'FullAccess']]);
    }

    public function get_all_users()
    {
        $response = $this->client->request('GET', 'users');
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        return view('users.index',compact('array_data'));
    }

    public function create_users(Request $request)
    {
        $response = $this->client->request('GET', 'type_documents');
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        $type_docs=[];
        foreach ($array_data as $key => $value) {
            $type_docs[$value["id"]]=$value["name"].' - '.$value["short_name"];
        }
        return view('users.create',compact('type_docs'));
    }

    public function store_users(Request $request)
    {
        $body_send=collect($request->all())->toJson();
        $response = $this->client->request('POST', 'users',['body'=>$body_send]);
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        return redirect()->route('create_users')->with('success','Add!');
    }

    public function edit_users(Request $request,$id)
    {
        $response = $this->client->request('GET', 'users/'.$id);
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);

        $response_type_docs = $this->client->request('GET', 'type_documents');
        $body_type_docs = $response_type_docs->getBody();
        $content =$body_type_docs->getContents();
        $array_data_docs = json_decode($content,TRUE);
        $type_docs=[];
        foreach ($array_data_docs as $key => $value) {
            $type_docs[$value["id"]]=$value["name"].' - '.$value["short_name"];
        }
        return view('users.edit',compact('array_data','type_docs'));
    }

    public function update_user(Request $request,$id)
    {
        $body_send=collect($request->all())->toJson();
        $response = $this->client->request('PUT', 'users/'.$id,['body'=>$body_send]);
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        return redirect()->route('edit_user',$id)->with('success','Update!');
    }

    public function delete_user(Request $request,$id)
    {
        $body_send=collect($request->all())->toJson();
        $response = $this->client->request('DELETE', 'users/'.$id);
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        return redirect()->route('all_users')->with('success','Delete!');
    }

    public function get_all_typeDocs()
    {
        $response = $this->client->request('GET', 'type_documents');
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        return view('type_docs.index',compact('array_data'));
    }

    public function create_type_docs(Request $request)
    {
        return view('type_docs.create');
    }

    public function store_type_docs(Request $request)
    {
        $body_send=collect($request->all())->toJson();
        $response = $this->client->request('POST', 'type_documents',['body'=>$body_send]);
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        return redirect()->route('create_type_docs')->with('success','Add!');
    }

    public function edit_type_docs(Request $request,$id)
    {
        $response = $this->client->request('GET', 'type_documents/'.$id);
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        return view('type_docs.edit',compact('array_data'));
    }

    public function update_type_docs(Request $request,$id)
    {
        $body_send=collect($request->all())->toJson();
        $response = $this->client->request('PUT', 'type_documents/'.$id,['body'=>$body_send]);
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        return redirect()->route('edit_type_docs',$id)->with('success','Update!');
    }

    public function delete_type_docs(Request $request,$id)
    {
        $body_send=collect($request->all())->toJson();
        $response = $this->client->request('DELETE', 'type_documents/'.$id);
        $body = $response->getBody();
        $content =$body->getContents();
        $array_data = json_decode($content,TRUE);
        return redirect()->route('all_type_docs')->with('success','Delete!');
    }


}

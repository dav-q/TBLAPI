<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TypeDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            // Hacemos el Llamado al procedimiento de busqueda general
            $all_data=DB::select("CALL all_type_documents");
            return response()->json($all_data, 200, []);
        } catch (\Throwable $th) {
            return response()->json('Server error, contact support', 500, []);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'short_name' => 'required'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return $errors->toJson();
            }

            $data=[$request->name,$request->short_name];
            // Hacemos el Llamado al procedimiento de inserción
            $store_type=DB::select("CALL insert_type_document(?,?)",$data);
            return response()->json($store_type, 200, []);
        } catch (\Throwable $th) {
            return response()->json('Server error, contact support', 500, []);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            // Hacemos el Llamado al procedimiento de busqueda por ID
            $search_data=DB::select("CALL search_type_document(?)",[$id]);
            if ($search_data) {
                return response()->json($search_data, 200, []);
            }else{
                return response()->json('TypeDoc not exist!', 422, []);
            }
        } catch (\Throwable $th) {
            return response()->json('Server error, contact support', 500, []);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $validator = \Validator::make($request->all(), [
                'name' => 'required',
                'short_name' => 'required'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return $errors->toJson();
            }

            $data=[(int)$id,$request->name,$request->short_name];

            // Hacemos el Llamado al procedimiento de actualización
            $store_type=DB::select("CALL update_type_document(?,?,?)",$data);
            return response()->json($store_type, 200, []);
        } catch (\Throwable $th) {
            return response()->json('Server error, contact support', 500, []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $delete_data=DB::select("CALL delete_type_document(?)",[$id]);
            return response()->json(true, 200, []);
        } catch (\Throwable $th) {
            return response()->json('Server error, contact support', 500, []);
        }
    }
}

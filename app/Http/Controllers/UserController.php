<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $all_users=User::with('has_type_doc')->get();
            return response()->json($all_users, 200, []);
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
                'email' => 'required|email|unique:users',
                'names' => 'required',
                'last_names' => 'required',
                'number_document' => 'required',
                'type_document_id' => 'required|numeric',
                'birthday' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return $errors->toJson();
            }

            $data=$request->only('email','names','last_names','number_document','type_document_id','birthday','password');
            $data['password']=Hash::make($data['password']);  // --> Hash a la password
            $new_user=User::create($data);

            if($new_user){
                return response()->json($new_user, 200);
            }else{
                return response()->json('Error create, contact support', 422, []);
            }
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

            $user_find=User::with('has_type_doc')->find($id);

            if ($user_find) {
                return response()->json($user_find, 200);
            }
            else{
                return response()->json('User not exist!', 422, []);
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
        try {

            $validator = \Validator::make($request->all(), [
                'names' => 'required',
                'last_names' => 'required',
                'number_document' => 'required',
                'type_document_id' => 'required|numeric',
                'birthday' => 'required',
                'password' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                return $errors->toJson();
            }

            $user_find=User::find($id);

            if ($user_find) {
                $data=$request->only('names','last_names','number_document','type_document_id','birthday','password');
                $data['password']=Hash::make($data['password']);  // --> Hash a la password
                $user_update=User::where('id',$id)->update($data);
                return response()->json(true, 200);
            }else{
                return response()->json('User not exist!', 422, []);
            }

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
            $user_find=User::find($id);

            if ($user_find) {
                $user_delete=User::destroy($id);
                return response()->json(true, 200);
            }else{
                return response()->json('User not exist!', 422, []);
            }

        } catch (\Throwable $th) {
            return response()->json('Server error, contact support', 500, []);
        }
    }
}

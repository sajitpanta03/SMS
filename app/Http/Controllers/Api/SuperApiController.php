<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperApiController extends Controller
{
    protected static $whichModel;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->whichModel::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = $this->whichModel::create($request->validated());
        if ($user) {
            return response()->json([
                'user' => $user,
                'status' => 1
            ]);
        } else {
            return response()->json([
                'user' => $user,
                'status' => 0
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->whichModel::find($id);
        if ($user) {
            return response()->json([
                'user' => $user,
                'status' => 1
            ]);
        } else {
            return response()->json([
                'user' => null,
                'message' => 'no user found',
                'status' => 0
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = $this->whichModel::find($id);
        if ($user) {
            $user->update($request->validated());
            return response()->json([
                'user' => $user,
                'message' => 'user updated successfully',
                'status' => 1
            ]);
        } else {
            return response()->json([
                'message' => 'no user found',
                'status' => 0
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->whichModel::find($id);
        if($user){
            if($user->delete()){
                return response()->json([
                    'message' => 'user deleted successfully',
                    'status' => 1
                ]);
            }else{
                return response()->json([
                    'message' => 'user deleted successfully',
                    'status' => 0
                ]);
            }
        }else{
            return response()->json([
                'message' => 'user do not exists',
                'status' => 0
            ]);
        }
    }
}

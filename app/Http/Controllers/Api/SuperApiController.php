<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperApiController extends Controller
{
    protected $whichModel;

    public function __construct($whichModel)
    {
        $this->whichModel = $whichModel;
    }

    public function index()
    {
        $data = $this->whichModel::all();
        return response()->json([
            'data' => $data,
            'status' => 1
        ]);
    }

    public function store(Request $request)
    {
        $data = $this->whichModel::create($request->all());
        return response()->json([
            'data' => $data,
            'status' => 1
        ]);
    }

    public function show($id)
    {
        $data = $this->whichModel::find($id);
        if ($data) {
            return response()->json([
                'data' => $data,
                'status' => 1
            ]);
        } else {
            return response()->json([
                'data' => null,
                'message' => 'No data found',
                'status' => 0
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $data = $this->whichModel::find($id);
        if ($data) {
            $data->update($request->all());
            return response()->json([
                'data' => $data,
                'message' => 'Data updated successfully',
                'status' => 1
            ]);
        } else {
            return response()->json([
                'message' => 'No data found',
                'status' => 0
            ]);
        }
    }

    public function destroy($id)
    {
        $data = $this->whichModel::find($id);
        if ($data) {
            $data->delete();
            return response()->json([
                'message' => 'Data deleted successfully',
                'status' => 1
            ]);
        } else {
            return response()->json([
                'message' => 'No data found',
                'status' => 0
            ]);
        }
    }
}

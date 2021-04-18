<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Test::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Test;
        $item->todo = $request->todo;
        $item->save();
        return response()->json([
            'message' => 'Created successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        $item = Test::where('id', $test->id)->first();
        if ($item) {
            return response()->json([
                'message' => 'OK',
                'data' => $item
            ],
                200
            );
        } else {
            return response()->json([
                'message' => 'Not found',
            ],
                404
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        $item = Test::where('id', $test->id)->first();
        $item->todo = $request->todo;
        $item->save();
        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $item = Test::where('id', $test->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Deleted successfully',
            ],
                200
            );
        } else {
            return response()->json([
                'message' => 'Not found',
            ],
                404
            );
        }
    }
}

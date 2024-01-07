<?php

namespace App\Http\Controllers\Frontend\User\Order;

use App\Http\Controllers\Controller;
use App\Models\Order\OrderFile;
use Illuminate\Http\Request;

class OrderFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {

        $request->validate([
            'file' => 'required|mimes:jpeg,jpg,png,zip|max:50000'
        ]);

        $file = $request->file('file');
        $fileName = generate_file_name('order_delivery', $file);

        try {
            $file->storeAs(get_temp_path(), $fileName);
            return response()->json([
                'success' => 'Uploaded Successfully',
                'fileName' => $fileName
            ]);
        } catch (\Exception $exception) {
            return response()->json([
                'error' => 'couldn\'t save the file'
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderFile  $orderFile
     * @return \Illuminate\Http\Response
     */
    public function show(OrderFile $orderFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderFile  $orderFile
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderFile $orderFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderFile  $orderFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderFile $orderFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderFile  $orderFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderFile $orderFile)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subcat;
class SubcatController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $subcategory = new  Subcat();
       $subcategory->category_id = $request->category_id;
       $subcategory->subcategory_name = $request->subcategory_name;
       $subcategory->subcategory_description  = $request->subcategory_description;
       $subcategory->publication_status = $request->publication_status;
       $result = $subcategory->save();
       if ($result){
           return  response()->json([
               "message" => "Data Inserted Succesfully",
               "Status" => 200
           ]);
       }else
           {
               return  response()->json([
                   "message" => "Internal Server Error",
                   "Status" => 500
               ]);
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

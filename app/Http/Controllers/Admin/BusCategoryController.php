<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BusCategory\BusCategoryRepository;
use App\Repositories\Bus\BusRepository;

class BusCategoryController extends Controller
{
    public function __construct(BusCategoryRepository $category,BusRepository $bus){
        $this->category=$category;
        $this->bus=$bus;
    }
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
        $categories=$this->category->all();
        return view('admin.busType.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);
        $this->category->create($request->all());
        return redirect()->back()->with('message','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=$this->category->findOrFail($id);
        $details=$this->bus->where('bus_category',$id)->where('status','approved')->get();
        return view('admin.busType.list',compact('details','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail=$this->category->find($id);
        $categories=$this->category->all();
        return view('admin.busType.edit',compact('detail','categories'));
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
        
        
        $this->category->update($request->all(),$id);
        return redirect()->route('bus-type.create')->with('message','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->category->destroy($id);
        return redirect()->route('bus-type.create')->with('message','Category Deleted Successfully');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $houses = House::orderBy('created_at', 'desc')->paginate(10);
        return view('enumerator.houses.index')->with('houses', $houses);
    }


    public function create()
    {
        return view('enumerator.houses.create');
    }


    public function store(Request $request)
    {
        //
    }


    public function show(House $house)
    {
        //
    }


    public function edit(House $house)
    {
        //
    }


    public function update(Request $request, House $house)
    {
        //
    }


    public function destroy(House $house)
    {
        //
    }
}

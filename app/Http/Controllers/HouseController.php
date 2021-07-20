<?php

namespace App\Http\Controllers;

use App\Models\Death;
use App\Models\House;
use App\Models\Member;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $houses = [];
        $searchHouseNumber = '';
        if (isset($_GET['house_number']) && !empty($_GET['house_number'])) {
            $searchHouseNumber = $_GET['house_number'];
            $houses = House::with(['region', 'members', 'deceased'])->orderBy('created_at', 'desc')->where('houses.house_number', $searchHouseNumber)->paginate(10);
        } else {
            $houses = House::with(['region', 'members', 'deceased'])->orderBy('created_at', 'desc')->paginate(10);
        }
        // dd($houses);
        return view('enumerator.houses.index')->with([
            'houses' => $houses,
            'searchHouseNumber' => $searchHouseNumber
        ]);
    }


    public function create()
    {
        return view('enumerator.houses.create');
    }


    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'house_number' => 'required',
            'number_of_room' => 'required',
            'house_level' => 'required',
            'number_of_son' => 'required',
            'number_of_daughter' => 'required',
            // 'region_id' => 'required',
            'zone' => 'required',
            'wereda' => 'required',
            'town' => 'required',
            'kebele' => 'required',
        ]);


        // Create house
        $house = new House;
        $house->user_id = auth()->user()->id;
        $house->region_id = auth()->user()->region_id;
        $house->house_number = $request->input('house_number');
        $house->number_of_room = $request->input('number_of_room');
        $house->house_level = $request->input('house_level');
        $house->number_of_son = $request->input('number_of_son');
        $house->number_of_daughter = $request->input('number_of_daughter');
        $house->zone = $request->input('zone');
        $house->wereda = $request->input('wereda');
        $house->town = $request->input('town');
        $house->kebele = $request->input('kebele');
        $house->save();

        return redirect('/houses')->with('success', 'House Created');
    }


    public function show(House $house)
    {
        return view('enumerator.houses.show')->with([
            'house' => $house
        ]);
    }


    public function add_memeber(House $house, $memeberType)
    {
        // alive familly memebers
        if ($memeberType === 'alive') {
            return view('enumerator.houses.add-alive', [
                'house' => $house
            ]);
        }
        // deceased familly memebers
        if ($memeberType === 'deceased') {
            return view('enumerator.houses.add-deceased', [
                'house' => $house
            ]);
        }

        return back();
    }

    // Add alive memeber to db
    public function store_alive(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'region_id' => 'required|integer',
            'house_id' => 'required|integer',
            'name' => 'required',
            'kebele_id_number' => 'integer|nullable',
            'birth_date' => 'required|date',
            'sex' => 'required',
            'religion_id' => 'required|integer',
            'mother_tongue_language_id' => 'required|integer',
            'is_disable' => 'required|boolean',
            'disability_cause' => 'string|nullable',
            'is_migrant' => 'required|boolean',
            'p_region_id' => 'integer|nullable',
            'p_zone' => 'string|nullable',
            'p_wereda' => 'string|nullable',
            'p_town' => 'string|nullable',
            'p_kebele' => 'string|nullable',
            'is_orphan' => 'required|boolean',
            'is_literate' => 'required|boolean',
            'education_level_id' => 'integer|nullable',
            'marital_status' => 'string',
            'have_income' => 'required|boolean',
        ]);
        Member::create($data);
        return back()->with('success', 'Alive memeber added');
    }
    // Add deceased memeber to db
    public function store_deceased(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer',
            'region_id' => 'required|integer',
            'house_id' => 'required|integer',
            'name' => 'required',
            'sex' => 'required',
            'date_of_birth' => 'required|date',
            'date_of_death' => 'required|date',
        ]);
        Death::create($data);
        return back()->with('success', 'Deceased memeber added');
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

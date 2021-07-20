<?php

namespace App\Http\Controllers;

use App\Models\Death;
use App\Models\House;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EnumeratorReportForSupervisor extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Check user is supervisor
        $user_type = auth()->user()->user_type;
        if ($user_type != 'supervisor') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        $supervisor_region_id = auth()->user()->region_id;
        $searchEnumeratorEmail = '';
        $enumerators = [];
        $searchEnumeratorEmail = '';
        if (isset($_GET['enumerator_email']) && !empty($_GET['enumerator_email'])) {
            $searchEnumeratorEmail = $_GET['enumerator_email'];
            $enumerators =
                User::where('user_type', 'enumerator')->where('region_id', $supervisor_region_id)->where('email', $searchEnumeratorEmail)->orderBy('created_at', 'DESC')->paginate(10);
        } else {
            $enumerators =
                User::where('user_type', 'enumerator')->where('region_id', $supervisor_region_id)->orderBy('created_at', 'DESC')->paginate(10);
        }

        return view('supervisor.enumerator.list', [
            'enumerators' => $enumerators,
            'searchEnumeratorEmail' => $searchEnumeratorEmail
        ]);
    }


    public function show(User $user)
    {
        // Check user is supervisor
        // $user_type = auth()->user()->user_type;
        // if ($user_type != 'supervisor') {
        //     return redirect('/')->with('error', 'Your are not allowed to see this page');
        // }

        // dd($user->houses->count());
        // $persons =
        //     Member::where('user_type', 'enumerator')->orderBy('created_at', 'DESC')->paginate(10);

        // return view('supervisor.enumerator.list', [
        //     'persons' => $persons
        // ]);
    }


    public function total_report_in_my_region()
    {
        $user_type = auth()->user()->user_type;
        if ($user_type != 'supervisor') {
            return redirect('/')->with('error', 'Your are not allowed to see this page');
        }
        // Total users
        $total_female_death = Death::where('sex', 'F')->get()->count();
        $total_male_death = Death::where('sex', 'M')->get()->count();

        $total_male_alive = Member::where('sex', 'M')->get()->count();
        $total_female_alive = Member::where('sex', 'F')->get()->count();

        // House level
        $total_house = House::all()->count();
        $low_level = House::where('house_level', 'low')->get()->count();
        $medium_level = House::where('house_level', 'medium')->get()->count();
        $high_level = House::where('house_level', 'high')->get()->count();

        return view('supervisor.enumerator.total_report', [
            'enumerators' => '$enumerators',
            'total_male' => $total_male_alive + $total_male_death,
            'total_female' => $total_female_alive + $total_female_death,
            // House level
            'total_house' => $total_house,
            'low_level' => $low_level,
            'medium_level' => $medium_level,
            'high_level' => $high_level,
            // Disability
            'total_disabled' => Member::where('is_disable', true)->get()->count(),
            'total_not_disabled' => Member::where('is_disable', true)->get()->count(),
            // Literacy
            'total_literate' => Member::where('is_literate', true)->get()->count(),
            'total_ilitrate' => Member::where('is_literate', false)->get()->count(),
            // Martial Status
            'total_single' => Member::where('marital_status', 'single')->get()->count(),
            'total_married' => Member::where('marital_status', 'married')->get()->count(),
            'total_separated' => Member::where('marital_status', 'separated')->get()->count(),
            'total_divorced' => Member::where('marital_status', 'divorced')->get()->count(),
            'total_widowed' => Member::where('marital_status', 'widowed')->get()->count(),
            // Literacy
            'total_orphan' => Member::where('is_orphan', true)->get()->count(),
            'total_not_orphan' => Member::where('is_orphan', false)->get()->count(),
            // have_income
            'have_income' => Member::where('have_income', true)->get()->count(),
            'have_not_income' => Member::where('have_income', false)->get()->count(),

            // 2, 5, 8. 10 year birth from now
            'two_year_birth' => Member::where('birth_date', '>', Carbon::now()->subYears(2))->get()->count(),
            'five_year_birth' => Member::where('birth_date', '>', Carbon::now()->subYears(5))->get()->count(),
            'eight_year_birth' => Member::where('birth_date', '>', Carbon::now()->subYears(8))->get()->count(),
            'ten_year_birth' => Member::where('birth_date', '>', Carbon::now()->subYears(10))->get()->count(),

            // 2, 5, 8. 10 year deat from now
            'two_year_death' => Death::where('date_of_death', '>', Carbon::now()->subYears(2))->get()->count(),
            'five_year_death' => Death::where('date_of_death', '>', Carbon::now()->subYears(5))->get()->count(),
            'eight_year_death' => Death::where('date_of_death', '>', Carbon::now()->subYears(8))->get()->count(),
            'ten_year_death' => Death::where('date_of_death', '>', Carbon::now()->subYears(10))->get()->count(),

        ]);
    }
}

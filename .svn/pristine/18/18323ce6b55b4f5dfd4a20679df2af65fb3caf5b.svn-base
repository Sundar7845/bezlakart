<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Traits\Common;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    use Common;

    public function __construct()
    {
        ini_set('max_execution_time', 3000);
    }

    public function city()
    {
        return view('backend.admin.master.city.city');
    }

    public function getCityData()
    {
        try {
            $city = City::select('states.state_name', 'cities.*')
                ->join('states', 'states.id', 'cities.state_id')
                ->orderBy('cities.id', 'ASC')
                ->get();

            return datatables()->of($city)
                ->addColumn('action', function ($row) {
                    $html = "";
                    $html = '<label class="switch">
                            <input type="checkbox" onclick="doStatus(' . $row->id . ');" id="chkCity' . $row->id . '" name="chkCity"
                            class="switch-input" ' . ($row->is_active == 1 ? "checked" : "") . '/>
                            <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                            </span>
                        </label>';
                    return $html;
                })->toJson();
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function syncCity()
    {
        try {
            // $country = Country::where('id', 1)->first();
            $states = State::get();

            if ($states->isEmpty()) {
                $notification = array(
                    'message' => 'Please sync states first!',
                    'alert-type' => 'error'
                );
            } else {
                foreach ($states as $state) {
                    $cities = Http::withHeaders([
                        'X-CSCAPI-KEY' => 'WVo5c0hpUWVGNGhkRWNTSzZ2bmpVZkZYWmZFUHNjaENsSm16djE0UQ=='
                    ])->get("https://api.countrystatecity.in/v1/countries/" . $state['country_code'] . "/states/" . $state['state_code'] . "/cities")->collect();
                    $allcities =  json_decode($cities);
                    foreach ($allcities as $city) {
                        // $is_value_entered = City::where('city_name', $city['name'])->where('state_id', $state->id)->first();
                        // if ($is_value_entered == null) {
                        City::create([
                            'id'         => $city->id,
                            'city_name'  => $city->name,
                            'state_id'   => $state->id,
                            'created_by' => Auth::user()->id
                        ]);
                        // }
                    }
                }
                $notification = array(
                    'message' => 'Cities Synced Successfully',
                    'alert' => 'success'
                );
                return redirect()->route('city')->with($notification);
            }
        } catch (\Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function activeCityStatus($id, $status)
    {
        try {
            City::findorfail($id)->update([
                'is_active' => $status,
                'updated_by' => Auth::user()->id
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'POST', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    function getCity(Request $request)
    {
        try {
            $city = City::where('state_id', $request->state_id)->get();
            return response()->json($city);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, $request->method(), $e->getMessage(), Auth::user()->id, $request->ip(), gethostname());
        }
    }
}

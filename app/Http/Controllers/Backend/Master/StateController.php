<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Traits\Common;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class StateController extends Controller
{
    use Common;

    public function __construct()
    {
        ini_set('max_execution_time', 3000);
    }

    public function state()
    {
        return view('backend.admin.master.state.state');
    }

    public function getStatesData()
    {
        try {
            // $state = $this->getStates(101, 1);
            $state = State::get();
            return datatables()->of($state)
                ->addColumn('action', function ($row) {
                    $html = "";
                    $html = '<label class="switch">
                                <input onclick="doStatus(' . $row->id . ');" id="chkState' . $row->id . '" type="checkbox" class="switch-input"
                                name="chkState" ' . ($row->is_active == 1 ? "checked" : "") . ' />
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

    public function syncState()
    {
        try {
            // $country = Country::get();
            $states = Http::withHeaders([
                'X-CSCAPI-KEY' => 'WVo5c0hpUWVGNGhkRWNTSzZ2bmpVZkZYWmZFUHNjaENsSm16djE0UQ=='
            ])->get("https://api.countrystatecity.in/v1/states")->collect();
            foreach ($states as $state) {
                // $is_value_entered = State::where('state_name', $state['name'])->where('country_id', $country->id)->first();
                // if ($is_value_entered == null) {
                State::create([
                    'id'          => $state['id'],
                    'state_name'  => $state['name'],
                    'state_code'  => $state['iso2'],
                    'country_id'  => $state['country_id'],
                    'country_code'  => $state['country_code'],
                    'created_by'  => Auth::user()->id
                ]);
                // }
            }

            $notification = array(
                'message' => 'States Synced Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('state')->with($notification);
        } catch (\Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function activeStateStatus($id, $status)
    {
        try {
            State::findorfail($id)->update([
                'is_active' => $status,
                'updated_by' => Auth::user()->id
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'POST', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    function getState(Request $request)
    {
        try {
            $state = State::where('country_id', $request->country_id)->get();
            return response()->json($state);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, $request->method(), $e->getMessage(), Auth::user()->id, $request->ip(), gethostname());
        }
    }
}

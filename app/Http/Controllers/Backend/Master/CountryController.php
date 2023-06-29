<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Traits\Common;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CountryController extends Controller
{
    use Common;

    function country()
    {
        return view('backend.admin.master.country.country');
    }

    public function getCountryData()
    {
        try {
            $country = $this->getCountries();
            return datatables()->of($country)
                ->addColumn('action', function ($row) {
                    $html = "";
                    $html = '<label class="switch">
                                <input onclick="doStatus(' . $row->id . ');" id="chkCountry' . $row->id . '" type="checkbox" class="switch-input"
                                name="chkCountry" ' . ($row->is_active == 1 ? "checked" : "") . ' />
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

    public function syncCountry()
    {
        try {
            $countries = Http::withHeaders([
                'X-CSCAPI-KEY' => 'WVo5c0hpUWVGNGhkRWNTSzZ2bmpVZkZYWmZFUHNjaENsSm16djE0UQ=='
            ])->get("https://api.countrystatecity.in/v1/countries")->collect();
            foreach ($countries as $country) {
                Country::create([
                    'country_name'  => $country['name'],
                    'country_code'  => $country['iso2'],
                    'created_by'    => Auth::user()->id
                ]);
            }

            $notification = array(
                'message' => 'Countries Synced Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('country')->with($notification);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function activeCountryStatus($id, $status)
    {
        try {
            Country::findorfail($id)->update([
                'is_active' => $status,
                'updated_by' => Auth::user()->id
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'POST', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }
}

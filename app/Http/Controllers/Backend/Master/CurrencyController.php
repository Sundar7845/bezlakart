<?php

namespace App\Http\Controllers\Backend\Master;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Currency;
use App\Traits\Common;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    use Common;

    public function __construct()
    {
        ini_set('max_execution_time', 3000);
    }

    function currency()
    {
        try {
            return view('backend.admin.master.currency.currency');
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function getCurrencyData()
    {
        try {
            $currency = Currency::select('currencies.*', 'countries.country_name')
                ->join('countries', 'countries.id', 'currencies.country_id')
                ->orderBy('currencies.id', 'ASC')
                ->get();
            return datatables()->of($currency)
                ->addColumn('action', function ($row) {
                    $html = "";
                    $html = '<label class="switch">
                                <input onclick="doStatus(' . $row->id . ');" id="chkCurrency' . $row->id . '" type="checkbox" class="switch-input"
                                name="chkCurrency" ' . ($row->is_active == 1 ? "checked" : "") . ' />
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

    public function syncCurrency()
    {
        DB::beginTransaction();
        try {
            $countries = Country::get();
            foreach ($countries as $country) {
                $currencies = Http::withHeaders([
                    'X-CSCAPI-KEY' => 'WVo5c0hpUWVGNGhkRWNTSzZ2bmpVZkZYWmZFUHNjaENsSm16djE0UQ=='
                ])->get("https://api.countrystatecity.in/v1/countries/" . $country->country_code . "")->collect();

                Currency::Create([
                    'country_id'  => $currencies['id'],
                    'currency_symbol'  => $currencies['currency_symbol'],
                    'created_by'    => Auth::user()->id
                ]);
            }
            $notification = array(
                'message' => 'Currencies Synced Successfully',
                'alert-type' => 'success'
            );
            DB::commit();
            return redirect()->route('currency')->with($notification);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function activeCurrencyStatus($id, $status)
    {
        try {
            Currency::findorfail($id)->update([
                'is_active' => $status,
                'updated_by' => Auth::user()->id
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'POST', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }
}

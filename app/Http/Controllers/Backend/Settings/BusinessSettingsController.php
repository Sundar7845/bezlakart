<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use App\Models\Country;
use App\Models\Currency;
use App\Traits\Common;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BusinessSettingsController extends Controller
{
    use Common;
    public function businessSettings()
    {
        try {
            $businesssetting = BusinessSetting::first();
            $country = Country::where('is_active', 1)->get();
            return view('backend.admin.settings.business_setup.business_setup', compact('businesssetting', 'country'));
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function businessSettingsStore(Request $request)
    {
        $request->validate([
            'txtBusinessName' => 'required',
            'txtOtpLength' => 'required',
            'txtExpiryDuration' => 'required',
            'txtEmailExpiryDuration' => 'required',
            'txtRefferalCodeLength' => 'required',
            'txtPlaystoreUrl' => 'required',
            'txtAppstoreUrl' => 'required',
            'ddlCountry' => 'required',
            'txtCurrencySymbol' => 'required',
            'rdStoreCancelOrder' => 'required',
            'rdDeliveryManCancel' => 'required',
            'rdShowEarning' => 'required',
            'rdAdminOrderNotify' => 'required',
            'rdStoreSelfRegistration' => 'required',
            'rdOtpLogin' => 'required',
            'rdGoogleLogin' => 'required',
            'rdFacebookLogin' => 'required',
            'rdGoldModule' => 'required',
            'rdEcommerceModule' => 'required',
            'txtAdminCommission' => 'required',
            // 'chkFreeDeliveryOver' => 'required',
            'txtFreeDeliveryOver' => 'required',
            'txtCompanyPhone' => 'required',
            'txtCompanyEmail' => 'required',
            'txtCompanyWebsite' => 'required',
            'txtCompanyAddress' => 'required',
            'fileLogo' => $request->hdBusineesSettingsId == null ? 'required' : '',
            'fileFavIcon' => $request->hdBusineesSettingsId == null ? 'required' : '',
            'fileAppLogo' => $request->hdBusineesSettingsId == null ? 'required' : ''
        ], [
            'txtBusinessName.required' => 'The Business Name is required',
            'txtOtpLength.required.required' => 'The OTP length is required',
            'txtExpiryDuration.required' => 'The OTP Expiry Duration is required',
            'txtEmailExpiryDuration.required' => 'The Email Expiry Duration is required',
            'txtRefferalCodeLength.required' => 'The Refferal Code lenght is required',
            'txtPlaystoreUrl.required' => 'The Playstore URL is required',
            'txtAppstoreUrl.required' => 'The Appstore URL is required',
            'ddlCountry.required' => 'The Country Name is required',
            'txtCurrencySymbol.required' => 'The Currency Symbol is required',
            'rdStoreCancelOrder.required' => 'Please Check yes or no',
            'rdDeliveryManCancel.required' => 'Please Check yes or no',
            'rdShowEarning.required' => 'Please Check yes or no',
            'rdAdminOrderNotify.required' => 'Please Check yes or no',
            'rdStoreSelfRegistration.required' => 'Please Check yes or no',
            'rdOtpLogin.required' => 'Please Check yes or no',
            'rdGoogleLogin.required' => 'Please Check yes or no',
            'rdFacebookLogin.required' => 'Please Check yes or no',
            'rdGoldModule.required' => 'Please Check yes or no',
            'rdEcommerceModule.required' => 'Please Check yes or no',
            'txtAdminCommission.required' => 'Please Check yes or no',
            'txtAdminCommission.required' => 'Please Check yes or no',
            // 'chkFreeDeliveryOver.required' => 'Please Check yes or no',
            'txtFreeDeliveryOver.required' => 'The Free delivery over amount is required',
            'txtCompanyPhone.required' => 'The Phone Number is required',
            'txtCompanyEmail.required' => 'The Email Address is required',
            'txtCompanyWebsite.required' => 'The Company Wesite is required',
            'txtCompanyAddress.required' => 'The Company Address is required',
            'fileLogo.required' => 'The Company Logo is required',
            'fileFavIcon.required' => 'The Favicon is required',
            'fileAppLogo.required' => 'The App Logo is required'
        ]);
        DB::beginTransaction();
        try {
            if ($request->hdBusineesSettingsId == null) {

                $businesssetting = BusinessSetting::Create([
                    'otp_length' => $request->txtOtpLength,
                    'otp_expiry_duration' => $request->txtExpiryDuration,
                    'email_expiry_duration' => $request->txtEmailExpiryDuration,
                    'referral_code_length' => $request->txtRefferalCodeLength,
                    'is_maintenace_mode' => $request->chkMaintenanceMode == 1 ? $request->chkMaintenanceMode : 0,
                    'company_name' => $request->txtBusinessName,
                    'company_address' => $request->txtCompanyAddress,
                    'company_phone' => $request->txtCompanyPhone,
                    'company_email' => $request->txtCompanyEmail,
                    'country_id'  => $request->ddlCountry,
                    'currency_symbol' => $request->txtCurrencySymbol,
                    'is_free_delivery' => $request->chkFreeDeliveryOver == 1 ? $request->chkFreeDeliveryOver : 0,
                    'free_delivery_amount' => $request->txtFreeDeliveryOver,
                    'play_store_url' => $request->txtPlaystoreUrl,
                    'app_store_url' => $request->txtAppstoreUrl,
                    'store_cancel_order' => $request->rdStoreCancelOrder,
                    'deliveryman_cancel_order' => $request->rdDeliveryManCancel,
                    'show_earning_for_order' => $request->rdShowEarning,
                    'admin_order_notification' => $request->rdAdminOrderNotify,
                    'otp_login' => $request->rdOtpLogin,
                    'google_signup' => $request->rdGoogleLogin,
                    'facebook_signup' => $request->rdFacebookLogin,
                    'gold_module' => $request->rdGoldModule,
                    'ecommerce' => $request->rdEcommerceModule,
                    'store_self_registration' => $request->rdStoreSelfRegistration,
                    'admin_commission' => $request->txtAdminCommission,
                    'company_website' => $request->txtCompanyWebsite,
                    'created_by' => Auth::user()->id
                ]);

                if ($request->hasFile('fileLogo')) {
                    $logoFile = $request->file('fileLogo');
                    $extension = $logoFile->getClientOriginalExtension();
                    $logoFileName = $this->generateRandom(16) . '.' . $extension;

                    BusinessSetting::findorfail($businesssetting->id)->update([
                        'company_logo' => $this->fileUpload($logoFile, 'upload/businesssetting/' . $businesssetting->id, $logoFileName)
                    ]);
                }

                if ($request->hasFile('fileAppLogo')) {
                    $appLogoFile = $request->file('fileAppLogo');
                    $extension = $appLogoFile->getClientOriginalExtension();
                    $appLogoFileName = $this->generateRandom(16) . '.' . $extension;

                    BusinessSetting::findorfail($businesssetting->id)->update([
                        'app_logo' => $this->fileUpload($appLogoFile, 'upload/businesssetting/' . $businesssetting->id, $appLogoFileName)
                    ]);
                }

                if ($request->hasFile('fileFavIcon')) {
                    $favIconFile = $request->file('fileFavIcon');
                    $extension = $favIconFile->getClientOriginalExtension();
                    $favIconFileName = $this->generateRandom(16) . '.' . $extension;

                    BusinessSetting::findorfail($businesssetting->id)->update([
                        'favicon' => $this->fileUpload($favIconFile, 'upload/businesssetting/' . $businesssetting->id, $favIconFileName)
                    ]);
                }
                $notification = array(
                    'message' => 'Business Settings Created Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);
            } else {

                $oldLogo = $request->hdLogo;
                if ($request->hasFile('fileLogo')) {
                    @unlink($oldLogo);
                    $logoFile = $request->file('fileLogo');
                    $extensions = $logoFile->getClientOriginalExtension();
                    $logoFileName = $this->generateRandom(16) . '.' . $extensions;
                }

                $oldAppLogo = $request->hdAppLogo;
                if ($request->hasFile('fileAppLogo')) {
                    @unlink($oldAppLogo);
                    $appLogoFile = $request->file('fileAppLogo');
                    $extensions = $appLogoFile->getClientOriginalExtension();
                    $appLogoFileName = $this->generateRandom(16) . '.' . $extensions;
                }

                $oldFavIcon = $request->hdFavIcon;
                if ($request->hasFile('fileFavIcon')) {
                    @unlink($oldAppLogo);
                    $favIconFile = $request->file('fileFavIcon');
                    $extensions = $favIconFile->getClientOriginalExtension();
                    $favIconFileName = $this->generateRandom(16) . '.' . $extensions;
                }

                BusinessSetting::findOrFail($request->hdBusineesSettingsId)->update([
                    'otp_length' => $request->txtOtpLength,
                    'otp_expiry_duration' => $request->txtExpiryDuration,
                    'email_expiry_duration' => $request->txtEmailExpiryDuration,
                    'referral_code_length' => $request->txtRefferalCodeLength,
                    'is_maintenace_mode' => $request->chkMaintenanceMode == 1 ? $request->chkMaintenanceMode : 0,
                    'company_name' => $request->txtBusinessName,
                    'company_address' => $request->txtCompanyAddress,
                    'company_phone' => $request->txtCompanyPhone,
                    'company_email' => $request->txtCompanyEmail,
                    'country_id'  => $request->ddlCountry,
                    'currency_symbol' => $request->txtCurrencySymbol,
                    'is_free_delivery' => $request->chkFreeDeliveryOver == 1 ? $request->chkFreeDeliveryOver : 0,
                    'free_delivery_amount' => $request->txtFreeDeliveryOver,
                    'play_store_url' => $request->txtPlaystoreUrl,
                    'app_store_url' => $request->txtAppstoreUrl,
                    'store_cancel_order' => $request->rdStoreCancelOrder,
                    'deliveryman_cancel_order' => $request->rdDeliveryManCancel,
                    'show_earning_for_order' => $request->rdShowEarning,
                    'admin_order_notification' => $request->rdAdminOrderNotify,
                    'otp_login' => $request->rdOtpLogin,
                    'google_signup' => $request->rdGoogleLogin,
                    'facebook_signup' => $request->rdFacebookLogin,
                    'gold_module' => $request->rdGoldModule,
                    'ecommerce' => $request->rdEcommerceModule,
                    'store_self_registration' => $request->rdStoreSelfRegistration,
                    'admin_commission' => $request->txtAdminCommission,
                    'company_website' => $request->txtCompanyWebsite,
                    'company_logo' => ($request->hasFile('fileLogo')) ? $this->fileUpload($request->file('fileLogo'), 'upload/businesssetting/' . $request->hdBusineesSettingsId, $logoFileName) : $oldLogo,
                    'app_logo' => ($request->hasFile('fileAppLogo')) ? $this->fileUpload($request->file('fileAppLogo'), 'upload/businesssetting/' . $request->hdBusineesSettingsId, $appLogoFileName) : $oldAppLogo,
                    'favicon' => ($request->hasFile('fileFavIcon')) ? $this->fileUpload($request->file('fileFavIcon'), 'upload/businesssetting/' . $request->hdBusineesSettingsId, $favIconFileName) : $oldFavIcon,
                    'updated_by' => Auth::user()->id
                ]);

                $notification = array(
                    'message' => 'Business Settings Updated Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);
            }
        } catch (Exception $e) {
            DB::rollback();
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            $this->Log(__FUNCTION__, $request->method(), $e->getMessage(), Auth::user()->id, $request->ip(), gethostname());
            return redirect()->back()->with($notification);
        }
    }

    function getCountrySymbol(Request $request)
    {
        try {
            $symbol = Currency::where('country_id', $request->country_id)->first();
            return response()->json([
                'symbol' => $symbol
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }
}

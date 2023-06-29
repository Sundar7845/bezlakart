<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\MailConfigSettings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MailConfigController extends Controller
{
    public function mailConfig()
    {
        $mailconfig = MailConfigSettings::find(1);
        return view('backend.admin.settings.mail_config.mail_config', compact('mailconfig'));
    }

    function mailConfigCreate(Request $request)
    {
        $request->validate([
            'txtMailerName' => 'required',
            'txtHost' => 'required',
            'txtDriver' => 'required',
            'txtPort' => 'required',
            'txtUsername' => 'required',
            'txtemail' => 'required',
            'txtEncryption' => 'required',
            'txtPassword' => 'required'
        ], [
            'txtMailerName.required' => 'The Mailer Name is required',
            'txtHost.required' => 'The Host is required',
            'txtDriver.required' => 'The Driver is required',
            'txtPort.required' => 'The Port is required',
            'txtUsername.required' => 'The Username is required',
            'txtemail.required' => 'The Email is required',
            'txtEncryption.required' => 'The Encryption is required',
            'txtPassword.required' => 'The Password is required'
        ]);

        DB::beginTransaction();
        try {
            if ($request->hdMailConfigId == null) {
                MailConfigSettings::Create([
                    'status' => $request->rdStatus,
                    'mailer_name' => $request->txtMailerName,
                    'host' => $request->txtHost,
                    'driver' => $request->txtDriver,
                    'port' => $request->txtPort,
                    'username' => $request->txtUsername,
                    'email' => $request->txtemail,
                    'encryption' => $request->txtEncryption,
                    'password' => $request->txtPassword
                ]);

                $notification = array(
                    'message' => 'Mail Config Settings Created Successfully',
                    'alert-type' => 'success'
                );

                DB::commit();
                return redirect()->route('mailconfig')->with($notification);
            } else {
                MailConfigSettings::findorfail($request->hdMailConfigId)->update([
                    'status' => $request->rdStatus,
                    'mailer_name' => $request->txtMailerName,
                    'host' => $request->txtHost,
                    'driver' => $request->txtDriver,
                    'port' => $request->txtPort,
                    'username' => $request->txtUsername,
                    'email' => $request->txtemail,
                    'encryption' => $request->txtEncryption,
                    'password' => $request->txtPassword
                ]);

                $notification = array(
                    'message' => 'Mail Config Settings Updated Successfully',
                    'alert-type' => 'success'
                );

                DB::commit();
                return redirect()->route('mailconfig')->with($notification);
            }
        } catch (Exception $e) {
            DB::rollBack();
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'error'
            );
            $this->Log(__FUNCTION__, "POST", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
            return redirect()->route('mailconfig')->with($notification);
        }
    }
}

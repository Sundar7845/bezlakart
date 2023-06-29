<?php

namespace App\Http\Controllers\Backend\Settings;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use App\Models\SocialMediaSetting;
use App\Traits\Common;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class SocialMediaController extends Controller
{
    use Common;
    public function socialMedia()
    {
        try {
            $socialmedia = SocialMedia::get();
            return view('backend.admin.settings.social_media.social_media', compact('socialmedia'));
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, "GET", $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    function socialMediaCreate(Request $request)
    {
        $request->validate([
            'ddlSocialMedia' => [
                'required',
                Rule::unique('social_media_settings', 'social_media_id')->ignore($request->hdSocialMediaId, 'social_media_id'),
            ],
            'txtSocialMediaUrl' => 'required'
        ], [
            'ddlSocialMedia.required' => 'Please Select Social Media Platform',
            'txtSocialMediaUrl.required' => 'The Social Media Url is required'
        ]);

        DB::beginTransaction();
        try {
            if ($request->hdSocialMediaId == null) {
                SocialMediaSetting::Create([
                    'social_media_id' => $request->ddlSocialMedia,
                    'social_media_url' => $request->txtSocialMediaUrl,
                    'created_by' => Auth::user()->id
                ]);

                $notification = array(
                    'message' => 'Social Media Created Successfully!',
                    'alert-type' => 'success'
                );
                DB::commit();
                return redirect()->back()->with($notification);
            } else {
                SocialMediaSetting::findorfail($request->hdSocialMediaId)->update([
                    'social_media_id' => $request->ddlSocialMedia,
                    'social_media_url' => $request->txtSocialMediaUrl,
                    'updated_by' => Auth::user()->id
                ]);

                $notification = array(
                    'message' => 'Social Media Updated Successfully!',
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

    function socialMediaData()
    {
        $socialmedia = SocialMediaSetting::select('social_media_settings.*', 'social_media.social_media_name')
            ->join('social_media', 'social_media.id', 'social_media_settings.social_media_id')
            ->get();
        return datatables()->of($socialmedia)
            ->addColumn('action', function ($row) {
                $html = "";
                $html = '<i class="text-primary ri-pencil-line"
                onclick="doEdit(' . $row->id . ');"></i> ';
                return $html;
            })->toJson();
    }

    function socialMediaById($id)
    {
        try {
            $socialmedia = SocialMediaSetting::where('id', $id)->first();
            return response()->json([
                'socialmedia' => $socialmedia
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'GET', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }

    public function activateSocilMedia($id, $status)
    {
        try {
            SocialMediaSetting::findorfail($id)->update([
                'is_active' => $status,
                'updated_by' => Auth::user()->id
            ]);
        } catch (Exception $e) {
            $this->Log(__FUNCTION__, 'POST', $e->getMessage(), Auth::user()->id, request()->ip(), gethostname());
        }
    }
}

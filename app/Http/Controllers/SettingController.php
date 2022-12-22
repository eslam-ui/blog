<?php

namespace App\Http\Controllers;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::get()->keyBy('key')->all();
        return view('admin.settings.settings', compact('settings'));
    }


    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'facebook' => ['required', 'string', 'max:255'],
            'twitter' => ['required','string','max:255'],
            'github' => ['required','max:255'],
            'about'=> ['required','string','max:30000'],
            ]);
            $arr =['sdf',$request->facebook, $request->twitter, $request->github, $request->about];

            $setting = Setting::get()->keyBy('key')->all();
            for ($i=1; $i < count($setting)+1 ; $i++) {
                $did = Setting::find($i);

                $did->update([
                    'value' => $arr[$i],
                ]);
            }


        return redirect()->back()->with('edit', 'category was updated');
    }
}

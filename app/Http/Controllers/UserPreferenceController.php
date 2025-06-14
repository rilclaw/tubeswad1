<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\UserPreference;
use App\Models\User;

class UserPreferenceController extends Controller
{
    public function edit()
    {
        $pref = UserPreference::firstOrCreate(
            ['user_id' => Auth::id()],
            ['reminder_time' => '08:00', 'theme' => 'light']
        );

        return view('account.settings', compact('pref'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'reminder_time' => 'nullable|date_format:H:i',
            'theme' => 'required|in:light,dark',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $pref = UserPreference::firstOrCreate(['user_id' => Auth::id()]);

        $pref->reminder_time = $request->reminder_time;
        $pref->theme = $request->theme;

        if ($request->hasFile('photo')) {
            if ($pref->photo_path && Storage::disk('public')->exists($pref->photo_path)) {
                Storage::disk('public')->delete($pref->photo_path);
            }
            $pref->photo_path = $request->file('photo')->store('profile_photos', 'public');
        }

        $pref->save();

        if ($request->filled('password')) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->route('account.settings')->with('success', 'Pengaturan berhasil disimpan.');
    }
}

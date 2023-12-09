<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Mail\ScreenshotEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // dd($request->all());
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $request->user()->profile_picture = $path;
        }

        $request->user()->save();
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function credit(): View
    {
        return view('credit');
    }

    public function creditSubmit(Request $request)
    {
        // dd($request->all());
        $email = Auth::user()->email;

        if ($request->hasFile('credit_image')) {
            $creditImage = $request->file('credit_image');
            // dd($request->all());
            $creditImageContent = file_get_contents($creditImage->getRealPath());
            $user = Auth::user();
            $user->credit_image = $creditImageContent;
            $user->save();
        }
        $user = Auth::user();
        // dd(base64_encode($user->credit_image));
        Mail::to($email)->send(new ScreenshotEmail($request->screenshot));
        return Redirect::route('credit')->with('success', 'Please check your mail for issued credit card');
    }
    public function debit(): View
    {
        return view('debit');
    }
    public function debitSubmit(Request $request)
    {
        $email = Auth::user()->email;
        if ($request->hasFile('debit_image')) {
            $debitImage = $request->file('debit_image');
            // dd($request->all());
            $debitImageContent = file_get_contents($debitImage->getRealPath());
            $user = Auth::user();
            $user->debit_image = $debitImageContent;
            $user->save();
        }
        $user = Auth::user();
        Mail::to($email)->send(new ScreenshotEmail($request->screenshot));
        return Redirect::route('debit')->with('success', 'Please check your mail for issued debit card');
    }

    // public function debitSubmit(Request $request)
    // {
    //     dd($request->all());
    //     $email = Auth::user()->email;
    //     Mail::to($email)->send(new ScreenshotEmail($request->screenshot));
    //     return Redirect::route('debit')->with('success', 'Please check your mail for issued debit card');
    // }

    public function about(): View
    {
        return view('about');
    }
}

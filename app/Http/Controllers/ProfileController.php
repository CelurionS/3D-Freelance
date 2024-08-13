<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Menampilkan form profil pengguna.
     * @param Request $request
     * @return View
     */
    public function edit(Request $request): View
    {
        // Mengembalikan tampilan edit profil dengan data pengguna
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Memperbarui informasi profil pengguna.
     * @param ProfileUpdateRequest $request
     * @return RedirectResponse
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Mengisi data pengguna dengan data yang divalidasi
        $request->user()->fill($request->validated());

        // Memeriksa apakah email berubah dan mengatur verifikasi email menjadi null jika berubah
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Menyimpan data pengguna
        $request->user()->save();

        // Mengarahkan kembali ke halaman edit profil dengan status pembaruan
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Menghapus akun pengguna.
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Memvalidasi kata sandi untuk penghapusan akun
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Mendapatkan pengguna
        $user = $request->user();

        // Menghapus pengguna dari database
        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Mengarahkan ke halaman utama setelah penghapusan akun
        return Redirect::to('/');
    }
}

?>

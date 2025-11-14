<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index()
    {
        return view('pages/profil');
    }
    
    public function update(Request $request) {

            $profil_pict = User::findOrFail($request->id);

            if ($request->profil_pict != null) {
                $path = public_path().'/uploads/images/';
  
                // //code for remove old file
                if($profil_pict->file != '-'  && $profil_pict->file != null){
                    $file_old = $path.$profil_pict->file;
                    unlink($file_old);
                }
    
                //upload new file
                $file = $request->profil_pict;
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
    
                //for update in table
                $profil_pict->update(['profil_pict' => $filename]);
            }
            
            if ($request->name != null) {
                $profil_pict->update(['name' => $request->name]);
            }

            if ($request->email != null) {
                $profil_pict->update(['email' => $request->email]);
            }

            if ($request->no_whatsapp != null) {
                $profil_pict->update(['no_whatsapp' => $request->no_whatsapp]);
            }

            Alert::success('Berhasil', 'Perubahan berhasil disimpan!');       

        return back();
    }

    public function password(Request $request) {

        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        Alert::success('Berhasil', 'Perubahan berhasil disimpan!');       

        return back();

    }

}

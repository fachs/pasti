<?php

namespace App\Http\Controllers;
use App\Models\Bidang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class BidangController extends Controller
{
    public function show() {
        
        return view('bidang');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
        ]);

        $validated = $validator->validated();

        $rab = Bidang::create([
            'nama' => $validated["nama"],
        ]);
        
        Alert::success('Congrats', 'You\'ve Successfully Registered');

        return back();
    }


}

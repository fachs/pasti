<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string'],
            'proker_id' => ['required', 'integer'],
            'prioritas' => ['required', 'integer'],
            'deadline' => ['required','string'],
        ]);

        $validated = $validator->validated();

        $proker = Task::create([
            'nama' => $validated["nama"],
            "proker_id" => $validated["proker_id"],
            "prioritas" => $validated["prioritas"],
            'deadline' => $validated["deadline"],
        ]);

        Alert::success('Berhasil', 'Task berhasil ditambahkan!');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bidang = \Auth::user()->bidang;
        $prokers = DB::table('program_kerjas')->where('id', $id)->select('id','nama','progress','tanggal_pelaksanaan', 'pic_1','nama_bidang')->get();
        $tasks = DB::table('tasks')->where('proker_id', $id)->select('id','nama','proker_id','prioritas', 'deadline', 'isDone')->get();

        return view('pages/proker-detail')->with('prokers', $prokers)->with('tasks', $tasks);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $updateTask = Task::findOrFail($request->id);
        $updateTask->update($request->all());

        return back();
    }

    public function update2(Request $request)
    {

        $updateTask = Task::findOrFail($request->id);
        $updateTask->update($request->all());

        Alert::success('Berhasil', 'Perubahan berhasil disimpan!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $task = Task::findOrFail($request->id);
        $task->delete();

        Alert::success('Berhasil', 'Task berhasil disimpan!');

        return back();
    }
}

// CHECKBOX

// + SORTING PRIORITY
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeEntry;

class TimeEntryController extends Controller
{

    //index view
    public function index()
    {
      $timeentry = TimeEntry::all();
      return view('timeentries.index',compact('timeentry'));
    
    }

    //create timeentry
    public function create()
    {
      return view('timeentries.create');

    }

    //Store timeentry
    public function store(Request $request)
    {
      $timeentry = new TimeEntry();
      $timeentry->project_id = $request->project_id;
      $timeentry->user_id = $request->user_id;
      $timeentry->task_id = $request->task_id;
      $timeentry->duration = $request->duration;
      $timeentry->save();
    }

    //show timeentry
    public function show(TimeEntry $timeentry)
    {
      return view('timeentries.show', compact('timeentry'));
    }

    //edit timeentry
    public function edit(TimeEntry $timeentry)
    {
      return view('timeentries.edit', compact('timeentry'));
    }

    //update timeentry
    public function update(Request $request, TimeEntry $timeentry)
    {
        $timeentry->project_id = $request->project_id;
        $timeentry->user_id = $request->user_id;
        $timeentry->task_id = $request->task_id;
        $timeentry->duration = $request->duration;
        $timeentry->save();
    }

    //destroy timeentry
    public function destroy(TimeEntry $timeentry)
    {
      $timeentry->delete();
    }

}

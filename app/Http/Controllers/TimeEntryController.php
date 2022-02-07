<?php

namespace App\Http\Controllers;

use App\Models\TimeEntry;
use Illuminate\Http\Request;
use App\Http\Requests\TimeEntryRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class TimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user=Auth::user()->id;
      $date= Carbon::now()->format('Y-m-d');
      $timeEntries=TimeEntry::where('user_id',$user)->where('date',$date)->get();
      $clients=Client::all();
      $projects=Project::all();
      $tasks=Task::all();
      return view('time-entries.index',compact('timeEntries','clients','projects','tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('time-entries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TimeEntryRequest $request)
    {
      $timeEntry = TimeEntry::create($request->validated());
      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function show(TimeEntry $timeEntry)
    {
      return view('time-entries.show', compact('timeEntry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeEntry $timeEntry)
    {
      return view('time-entries.edit', compact('timeEntry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function update(TimeEntryRequest $request, TimeEntry $timeEntry)
    {
      $timeEntry->update($request->validated());
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeEntry $timeEntry)
    {
      $timeEntry->delete();
    }

    public function getTimeEntryByDate(Request $request){
      $user=Auth::user()->id;
      $date= $request->date;
      $timeEntries=TimeEntry::where('user_id',$user)->where('date',$date)->get();
      $clients=Client::all();
      $projects=Project::all();
      $tasks=Task::all();
      return view('time-entries.index',compact('timeEntries','clients','projects','tasks'));
    }
}

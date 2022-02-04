<?php

namespace App\Http\Controllers;

use App\Models\TimeEntry;
use Illuminate\Http\Request;
use App\Http\Requests\TimeEntryRequest;
use App\Models\Client;
use App\Models\Task;
use Carbon\Carbon;

class TimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $today =Carbon::now()->format('Y-m-d');
      $filteredTimeEntries =TimeEntry::where('date',$request->query('date'))->get();

      $currentTimeEntries = TimeEntry::where('date', Carbon::today())->get();
      $tasks =Task::all();
      $clients = Client::all();

      return view('time-entries.index', compact('currentTimeEntries','clients', 'tasks', 'filteredTimeEntries'));
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
      return redirect()->back()->with("success", "Time-Entry ({$timeEntry->name}) created successfully");
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
      return redirect()->back()->with("success", "time-entry ({$timeEntry->name}) updated successfully");
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
      return redirect()->route("projects.index")->with("projects-message-true", "time-entry ({$timeEntry->name}) deleted successfully");
    }
}

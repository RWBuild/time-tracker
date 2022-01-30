<?php

namespace App\Http\Controllers;

use App\Models\TimeEntry;
use Illuminate\Http\Request;

class TimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $time_entries = TimeEntry::all();
        // return view('time_entries.index', compact('time_entries'));
        return "i am time entries";

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('time_entries.create', compact('time_entries'));
        return "create time entry here";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $timeEntry = new TimeEntry();
        $timeEntry->project_id=$request->project_id;
        $timeEntry->user_id = $request->user_id;
        $timeEntry->task_id = $request->task_id;
        $timeEntry->duration = $request->duration;
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function show(TimeEntry $timeEntry)
    {
        //
        // return view('time_entries.show', compact('time_entry'));

        return "show one time_entry here";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeEntry $timeEntry)
    {
        //
        // return view('time_entries.edit', compact('time_entry'));
        return "edit your time entry here";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TimeEntry  $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeEntry $timeEntry)
    {
        //
        $timeEntry->project_id=$request->project_id;
        $timeEntry->user_id = $request->user_id;
        $timeEntry->task_id = $request->task_id;
        $timeEntry->duration = $request->duration;
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
}

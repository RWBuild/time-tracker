<?php

namespace App\Http\Controllers;

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
        $time_entry = TimeEntry::all();
        return "Hi there am time entry";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Create time entry";
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
        $timeEntry->user_id=$request->user_id;
        $timeEntry->task_id=$request->task_id;
        $timeEntry->duration=$request->duration;
    }

    /**
     * Display the specified resource.
     *
     * @param  TimeEntry $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function show(TimeEntry $timeEntry)
    {
        return "Show time entry";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  TimeEntry $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeEntry $timeEntry)
    {
        return "Edit time entry";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  TimeEntry $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeEntry $timeEntry)
    {
        // $timeEntry = new TimeEntry();
        $timeEntry->project_id=$request->project_id;
        $timeEntry->user_id=$request->user_id;
        $timeEntry->task_id=$request->task_id;
        $timeEntry->duration=$request->duration;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  TimeEntry $timeEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeEntry $timeEntry)
    {
        $timeEntry->delete();
    }
}

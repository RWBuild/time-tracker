<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeEntry;
use App\Http\Requests\TimeEntryRequest;
use auth;

class TimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $timeEntries = TimeEntry::all();
      
      return view('time-entries.index', compact('timeEntries'));
    
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

      // $request->validate([

      //   'project_id' => ['required','numeric'],
      //   'task_id' => ['required','numeric'],
      //   'duration' => ['numeric'],
      // ]);

      $timeEntry = TimeEntry::create($request->validated());

      // $timeEntry = new TimeEntry();
      // $timeEntry->project_id = $request->project_id;
      // $timeEntry->user_id = auth()->user()->id;
      // $timeEntry->task_id = $request->task_id;
      // $timeEntry->duration= $request->duration;
      // $timeEntry->date= $request->date;
      // $timeEntry->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TimeEntry $timeEntry)
    {
    
      return view('time-entries.show', compact('timeEntry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TimeEntryRequest $request, TimeEntry $timeEntry)
    {
        $timeEntry->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeEntry $timeEntry)
    {
        $timeEntry->delete();
    }
}

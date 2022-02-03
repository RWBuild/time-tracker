<?php

namespace App\Http\Controllers;

use App\Models\TimeEntry;
use Illuminate\Http\Request;
use App\Http\Requests\TimeEntryRequest;
use App\Models\Client;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class TimeEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::all();
        $tasks = Task::all();

        if($request->query('client')){
          $client_id = $request->query('client');
          return Project::where('client_id', '=', $client_id)->get()->toJson();
        }elseif($request->query('project')){
            return Task::all()->toJson();
        }else if($request->date){
            $date = $request->date;
            $time_entries = TimeEntry::where('date', '=', $date)->where('user_id', '=', Auth::user()->id)->get();
            return view('time-entries.index', compact('time_entries', 'clients','tasks'));
        }else{
            $time_entries = TimeEntry::whereDate('created_at', Carbon::today())->get();
            return view('time-entries.index',compact('clients', 'time_entries'));
        }
    }

    public function search(Request $request)
    {
        $clients = Client::all();
        $date = $request->date;
        $time_entries = TimeEntry::where('date', '=', $date)->where('user_id', '=', Auth::user()->id)->get();
        $tasks = Task::all();
        return view('time-entries.index', compact('time_entries', 'clients','tasks'));
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
        dd($timeEntry);
        return redirect()->back()->with('time-entry-message-true', 'time-entry created successfully');
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
      return redirect()->back()->with('time-entry-message-true', 'time-entry updated successfully');
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
      return redirect()->back()->with('time-entry-message-true', 'time-entry deleted successfully');
    }
}

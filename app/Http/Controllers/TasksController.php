<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Carbon\Carbon;
use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('updated_at', 'desc')->get();
        $username = Auth::user()->username;

        return view('dashboard', [
            'tasks' => $tasks,
            'username' => $username,
            'edittask' => null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // returning view for create forms
        // GET method
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // POST method
        $task = new Task;

        $task->name = $request->name;
        $task->duedate = $request->duedate;
        $task->user_id = Auth::id();

        $task->save();

        $tasks = Task::all();
        return response()->json([
            'status' => 'success',
            'msg' => 'Added Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Showing indiviudal data / rows
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // returns view for editing form
        // GET method
        $task = Task::find($id);
        if ($task->duedate != null)
            $task->duedate = Carbon::parse($task->duedate)->isoFormat('YYYY-MM-DDThh:mm');

        return response()->json([
            'task' => $task
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // POST method
        $task = Task::find($id);

        $task->name = $request->name;
        $task->duedate = $request->duedate;

        $task->save();

        return response()->json([
            'status' => 'success',
            'msg' => 'Updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // GET/POST method
        $task = Task::find($id);

        $task->delete();
        
        return response()->json([
            'status' => 'success',
            'msg' => 'Deleted Successfully!'
        ]);
    }
}

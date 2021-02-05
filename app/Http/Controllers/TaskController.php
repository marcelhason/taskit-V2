<?php

namespace App\Http\Controllers;



use App\User;
use App\Task;

class TaskController extends Controller
{
	public function index()
	{
			$task = Task::find(1);;
//$user = User::all();
//return $user->tasks;
            return $task->users->id;

		return view('task.index')
			->with('tasks', $tasks);
	}

}

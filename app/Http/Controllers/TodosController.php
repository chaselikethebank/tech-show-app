<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Support\Facades\Log;

class TodosController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    public function startTimer(Todo $todo)
    {
        $todo->update([
            'timer_running' => true,
            'timer_started_at' => now(),
        ]);

        return response()->json([
            'timer_running' => true,
            'seconds_worked' => $todo->minutes_worked,
            'timer_started_at' => $todo->timer_started_at->toIso8601String(),
        ]);
    }

    public function stopTimer(Todo $todo)
    {
        if (!$todo->timer_started_at) {
            return response()->json(['error' => 'Timer was not started'], 400);
        }

        $elapsedSeconds = max(0, now()->diffInSeconds($todo->timer_started_at));

        $todo->update([
            'timer_running' => false,
            'minutes_worked' => $todo->minutes_worked + $elapsedSeconds,
            'timer_started_at' => null,
        ]);

        return response()->json([
            'timer_running' => false,
            'seconds_worked' => $todo->minutes_worked,
            'timer_started_at' => null,
        ]);
    }
}

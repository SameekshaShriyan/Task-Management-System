<?php

namespace App\Http\Controllers;

use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalTasks' => Task::count(),
            'pendingTasks' => Task::where('status', 'pending')->count(),
            'completedTasks' => Task::where('status', 'completed')->count(),
        ]);
    }
}

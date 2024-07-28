<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    public function activityLogs()
    {
        $activityLogs = DB::table('activity_logs')
                          ->join('users', 'activity_logs.user_id', '=', 'users.user_id')
                          ->select('activity_logs.*', 'users.username')
                          ->orderBy('log_time', 'desc')
                          ->get();

        return view('logs.activity_logs', compact('activityLogs'));
    }

    public function auditItems()
    {
        $auditItems = DB::table('audit_items')
                        ->join('users', 'audit_items.user_id', '=', 'users.user_id')
                        ->join('items', 'audit_items.item_id', '=', 'items.item_id')
                        ->select('audit_items.*', 'users.username', 'items.item_name as original_item_name')
                        ->orderBy('updated_at', 'desc')
                        ->get();

        return view('logs.audit_items', compact('auditItems'));
    }
}

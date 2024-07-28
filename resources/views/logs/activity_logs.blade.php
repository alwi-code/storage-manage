@extends('layouts.app')

@section('title', 'Activity Logs')

@section('content')
<div class="container">
    <h1 class="mt-4">Activity Logs</h1>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Log ID</th>
                <th>User</th>
                <th>Action</th>
                <th>Log Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activityLogs as $log)
                <tr>
                    <td>{{ $log->log_id }}</td>
                    <td>{{ $log->username }}</td>
                    <td>{{ $log->action }}</td>
                    <td>{{ $log->log_time }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

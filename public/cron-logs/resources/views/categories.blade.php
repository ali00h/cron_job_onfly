@extends('layouts.app')

@section('content')
<h1>Cron Logs Categories</h1>
<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cron_logs as $cron_log)
    <tr>
      <td>{{ $cron_log->id }}</td>
      <td>{{ $cron_log->title }}</td>
      <td><a href="{{ route('cron_logs.show', $cron_log->id) }}">View Details</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
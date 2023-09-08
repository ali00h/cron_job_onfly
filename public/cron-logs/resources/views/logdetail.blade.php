@extends('layouts.app')

@section('content')
<h1>Cron Logs Details</h1>
<h2>{{ $cron_log->title }}</h2>
<table>
  <thead>
    <tr>
      <th>Set Date</th>
      <th>Content</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cron_log->logs as $log)
    <tr>
      <td>{{ $log['set_date'] }}</td>
      <td>{{ $log['content'] }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
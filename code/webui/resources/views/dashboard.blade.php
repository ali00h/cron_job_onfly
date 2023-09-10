@extends('layout')

@section('title')
Dashbord
@endsection

@section('content')
<div class="box">
    <h1 class="title">Cron Job List</h1>

    <table class="table is-fullwidth">
    <thead>
        <tr>
            <th><abbr title="Index">#</abbr></th>
            <th><abbr title="Cron Job">Cron Job</abbr></th>
            <th><abbr title="Last Action">Last Action</abbr></th>
            <th><abbr title="Detail">Detail</abbr></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th><abbr title="Index">#</abbr></th>
            <th><abbr title="Cron Job">Cron Job</abbr></th>
            <th><abbr title="Last Action">Last Action</abbr></th>
            <th><abbr title="Detail">Detail</abbr></th>
        </tr>
    </tfoot>
    <tbody>
        @foreach($loglist as $item)
            <tr>
                <td>1</td>
                <td>{{ $item['job'] }}</td>
                <td>{{ $item['last_change'] }}</td>
                <td>
                    <a href="https://en.wikipedia.org/wiki/?p={{ $item['id'] }}" title="Leicester City F.C.">Detail</a>
                </td>
            </tr>            
        @endforeach        
              

    </tbody>
    </table>

</div>


@endsection


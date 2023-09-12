@extends('layout')

@section('title')
Dashbord
@endsection

@section('content')
<div class="box">
    <h1 class="title">Cron Job List</h1>
    
    <div class="table-container">
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
                @foreach($loglist as $index => $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item['job'] }}</td>
                        <td>{{ $item['last_change'] }}</td>
                        <td>
                            <a href="{{ route('log.detail', ['id' => $item['id'],'pagenumber' => 1]) }}" title="Detail">Detail</a>
                        </td>
                    </tr>            
                @endforeach        
                    

            </tbody>
        </table>
    </div>

</div>


@endsection


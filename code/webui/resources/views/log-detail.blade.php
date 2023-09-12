@extends('layout')

@section('title')
Log Detail
@endsection

@section('content')
<div class="box">
    <h1 class="title">{{ $title }}</h1>

    @foreach($loglist as $index => $item)
        <div class="box">
            <div class="block">
                <span class="tag is-info">{{ $index+1 }}</span>
                <span class="tag is-info is-light">{{ $item['set_date'] }}</span>
            </div>    
            <pre>{!! $item['content'] !!}</pre>
            
        </div>    
         
    @endforeach        
            


</div>


@endsection


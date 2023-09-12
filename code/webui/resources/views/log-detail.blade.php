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
                <span class="tag is-info">{{ $item['index'] }}</span>
                <span class="tag is-info is-light">{{ $item['set_date'] }}</span>
            </div>    
            <pre>{!! $item['content'] !!}</pre>
            
        </div>    
         
    @endforeach        
    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        <a class="pagination-previous"  @if($previous_page_disable) href="#" disabled @else href="{{ route('log.detail', ['id' => $id,'pagenumber' => $page_number-1]) }}" @endif>Previous</a>
        <a class="pagination-next"  @if($next_page_disable) href="#" disabled @else href="{{ route('log.detail', ['id' => $id,'pagenumber' => $page_number+1]) }}" @endif>Next page</a>
    </nav>           


</div>


@endsection


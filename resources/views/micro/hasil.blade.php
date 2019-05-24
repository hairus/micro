@extends('layouts.app')

@section('content')
<ul>
    @foreach ( $data as $gg)
    <li>{{  $gg->rfid }}</li>    
    @endforeach
</ul>
@endsection
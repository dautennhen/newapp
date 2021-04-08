@extends('index')
@php
    function getVal($input) {
        return empty($_REQUEST[$input]) ? '' : $_REQUEST[$input];
    }
@endphp
@section('content')
<div class="table-display-list">
<div>
    <span class="text-danger">* All fields is required</span>
    <form method="post">
        @csrf()
        <input name="lat" placeholder="latitude" value="{{ getVal('lat') }}" />
        <input name="long" placeholder="longitude" value="{{ getVal('long') }}" />
        <input name="distance" placeholder="radius(m)" value="{{ getVal('distance') }}" />
        <input type="text" class="datetimepicker" name="starttime" placeholder="start time" readonly value="{{ getVal('starttime') }}" />
        <input type="text" class="datetimepicker" name="endtime" placeholder="end time" readonly value="{{ getVal('endtime') }}" />
        <input type="submit" value="Filter">
    </form>
</div>

<div class="box-body table-responsive no-padding company-offered-service">
    <table class="table table-hover" data-delurl="" >
        @if(count($items) > 0)
        <thead class="thead-dark">
        <tr>
            <th scope="col"><a></a></th>
            <th scope="col"><span>fullname</span></th>
            <th scope="col"><span>latitude</span></th>
            <th scope="col"><span>longitude</span></th>
            <th scope="col">date time</th>
            <th scope="col"></th>
        </tr>
        </thead>
        @endif
        <tbody>
        @foreach ($items as $item)
            <tr>	
                <td></td>
                <td>{{ $people[$item->person_id]->firstname }} {{ $people[$item->person_id]->lastname }}</td>
                <td>{{$item->lat}}</td>
                <td>{{$item->long}}</td>
                <td>{{$item->datetime}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        @if(count($items)>0)
            {{ $items->links() }}
        @endif
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.datetimepicker').datetimepicker({format:'Y-m-d H:i'});
    })
</script>
@endsection
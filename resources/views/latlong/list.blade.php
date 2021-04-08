@extends('index')

@section('content')
<div class="table-display-list">
<div>
     <a href="{{ route('latlong-new') }}">new lat long</a>
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
                <td>{{$item->firstname}} {{$item->lastname}}</td>
                <td>{{$item->lat}}</td>
                <td>{{$item->long}}</td>
                <td>{{$item->datetime}}</td>
                <td>
                    <span class="glyphicon glyphicon-remove icon remove-item" data-url="{{ route('latlong-remove', ['id' => $item->id]) }}"></span> | 
                    <a href="{{ route('latlong-detail', ['id' => $item->id]) }}"><span class="glyphicon glyphicon-eye-open icon"></span></a>
                    <a href="{{ route('latlong-edit', ['id' => $item->id]) }}"><span class="glyphicon glyphicon-edit icon"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>{{ $items->links() }}</div>
</div>
</div>

<script>
    
    $('.table-display-list .remove-item').bind('click', function(){
        if(!confirm('Do you really want to delete')) 
            return
        var url = $(this).data('url');
        $.ajax({
            url: url,
            data: {_token: $('meta[name="csrf-token"]').attr('content')},                    
            type: 'POST',
            success:function(data) {
                location.reload()
            }
        })
    })
</script>
@endsection
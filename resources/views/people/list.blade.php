@extends('index')

@section('content')
<div class="table-display-list">
<div>
     <a href="{{ route('people-new') }}">new people</a>
</div>

<div class="box-body table-responsive no-padding company-offered-service">
    <table class="table table-hover" data-delurl="" >
        @if(count($items) > 0)
        <thead class="thead-dark">
        <tr>
            <th scope="col"><a></a></th>
            <th scope="col"><span data-field="firstname" class="reorderlist {{ getdirection('firstname') }}">firstname</span></th>
            <th scope="col"><span data-field="lastname" class="reorderlist {{ getdirection('lastname') }}">lastname</span></th>
            <th scope="col"></th>
        </tr>
        </thead>
        @endif
        <tbody>
        @foreach ($items as $item)
            <tr>	
                <td></td>
                <td>{{$item->firstname}}</td>
                <td>{{$item->lastname}}</td>
                <td>
                    <span class="glyphicon glyphicon-remove icon remove-item" data-url="{{ route('people-remove', ['id' => $item->id]) }}"></span> | 
                    <a href="{{ route('people-detail', ['id' => $item->id]) }}"><span class="glyphicon glyphicon-eye-open icon"></span></a>
                    <a href="{{ route('people-edit', ['id' => $item->id]) }}"><span class="glyphicon glyphicon-edit icon"></span></a>
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
@extends('index')

@section('content')
<div class="text-center text-danger form-edit-msg"></div>
<form name="form-zipcode-edit" action="{{ route('people-save',['id' => $item->id ]) }}">
  <div class="form-group">
    <label>Firstname:</label>
    <input type="text" class="form-control" name="firstname" value="{{ $item->firstname }}" />
    <span class="error_firstname text-danger text-error"></span>
  </div>
  <div class="form-group">
    <label >Lastname:</label>
    <input type="text" class="form-control" name="lastname" value="{{ $item->lastname }}">
    <span class="error_lastname text-danger text-error"></span>
  </div>
  <button type="button" class="btn btn-default btn-save">Save</button>
  <button type="button" class="btn btn-dark btn-back" onClick="window.location.href='/people'">Back</button>
</form>

<script type="text/javascript">
    $('.btn-save').bind('click', function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var $form = $('form[name="form-zipcode-edit"]')
        var data = $form.serialize() + '&_token=' + CSRF_TOKEN
        
        $.ajax({
            url: $form.attr('action'),
            data: data,                    
            type: 'POST',
            beforeSend: function () {
                showLoading()
            },complete: function (response) {
                hideLoading()
            },error: function (xhr) {
                if (xhr.status == 422) {
                    var objs = JSON.parse(xhr.responseText)
                    objs = objs.errors
                    $('.text-error').html('')
                    $.each(objs, function (i, error) {
                        var obj = eval('objs.'+i)
                        $('.error_'+i).html(obj[0])
                    });
                }
            },
            success:function(response) {
                (response.success) ? 
                    $('.form-edit-msg').html('sucess') :
                    $('.form-edit-msg').html('failed')
        
            }
        });
    })
</script>
@endsection
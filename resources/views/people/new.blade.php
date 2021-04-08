@extends('index')

@section('content')
<div class="text-center text-danger form-edit-msg"></div>
<form name="form-edit" action="{{ route('people-save',['id' => 0 ]) }}">
  <div class="form-group">
    <label for="firstname">Firstname:</label>
    <input type="text" class="form-control" id="firstname" name="firstname" />
    <span class="error_firstname text-danger text-error"></span>
  </div>
  <div class="form-group">
    <label for="lastname">Lastname:</label>
    <input type="text" class="form-control" id="lastname" name="lastname" />
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
        var $form = $('form[name="form-edit"]')
        var data = $form.serialize() + '&_token=' + CSRF_TOKEN
        var $me = $(this)
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
                    $('.form-edit-msg').html('Created new item') :
                    $('.form-edit-msg').html('failed')
                    $me.attr('disabled','disabled')
            }
        });
    })
</script>
@endsection

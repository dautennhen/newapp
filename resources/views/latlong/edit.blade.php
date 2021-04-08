@extends('index')

@section('content')
<div class="text-center text-danger form-edit-msg"></div>
<form name="form-zipcode-edit" action="{{ route('latlong-save',['id' => $item->id ]) }}">
  <div class="form-group">
    <label>Full name:</label>
    <select name="person_id" class="form-control">
        <option value=""></option>
        @php 
            echo App\Repositories\PeopleRepository::optionPeople($item->person_id);
        @endphp
    </select>
    <span class="error_person_id text-danger text-error"></span>
  </div>
  <div class="form-group">
    <label>Latitude:</label>
    <input type="text" class="form-control" name="lat" value="{{ $item->lat }}" />
    <span class="error_lat text-danger text-error"></span>
  </div>
  <div class="form-group">
    <label>Longitude:</label>
    <input type="text" class="form-control" name="long" value="{{ $item->long }}">
    <span class="error_long text-danger text-error"></span>
  </div>
  <div class="form-group">
    <label>Date time:</label>
    <input type="text" class="form-control datetimepicker" name="datetime" value="{{ $item->datetime }}" readonly />
    <span class="error_datetime text-danger text-error"></span>
  </div>
  <button type="button" class="btn btn-default btn-save">Save</button>
  <button type="button" class="btn btn-dark btn-back" onClick="window.location.href='/latlong'">Back</button>
</form>

<script type="text/javascript">
    $(document).ready(function(){
        $('.datetimepicker').datetimepicker({format:'Y-m-d H:i'});
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
    })
</script>
@endsection
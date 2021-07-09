<form action="{{route('pickuppoint.update')}}" method="POST" id="edit_form">
    @csrf

    <div class="modal-body">
        <div class="form-group">
            <label for="pickup_point_name">Name</label>
            <input type="text" value="{{$data->pickup_point_name}}" class="form-control"  name="pickup_point_name" required>
            <input type="hidden" name="id" value="{{ $data->id }}">
        </div>
        <div class="form-group">
            <label for="pickup_point_address">Address</label>
            <input type="text" value="{{$data->pickup_point_address}}" class="form-control"  name="pickup_point_address" required>
        </div>
        <div class="form-group">
            <label for="pickup_point_phone">Phone #1</label>
            <input type="text" value="{{$data->pickup_point_phone}}" class="form-control"  name="pickup_point_phone" required>
        </div>
        <div class="form-group">
            <label for="pickup_point_phone_two">Phone #2</label>
            <input type="text" value="{{$data->pickup_point_phone_two}}" class="form-control"  name="pickup_point_phone_two" required>
        </div>
    </div>
    <div class="modal-footer">
        {{--                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
        <button type="submit" class="btn btn-primary"> Submit</button>
    </div>

</form>

<script>
    $('#edit_form').submit(function(e){
        e.preventDefault();
        var url = $(this).attr('action');
        var request =$(this).serialize();
        $.ajax({
            url:url,
            type:'POST',
            async:false,
            data:request,
            success:function(data){
                toastr.success(data);
                $('#edit_form')[0].reset();
                $('#editModal').modal('hide');
                table.ajax.reload();
            }
        });
    });
</script>

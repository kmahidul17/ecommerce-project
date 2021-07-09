<form action="{{route('coupon.update')}}" method="POST" id="edit_form">
    @csrf

    <div class="modal-body">
        <div class="form-group">
            <label for="coupon_code">Coupon Code</label>
            <input type="text" class="form-control" value="{{$data->coupon_code}}"  name="coupon_code" required>
            <input type="hidden" name="id" value="{{$data->id}}">
        </div>
        <div class="form-group">
            <label for="type">Coupon Type: </label>
            <label>
                <select name="type" class="form-control" required>
                    <option value="1" @if($data->type == 1) selected @endif>Fixed</option>
                    <option value="2"@if($data->type == 2) selected @endif>Percentage</option>
                </select>
            </label>
        </div>
        <div class="form-group">
            <label for="coupon_amount">Coupon Amount</label>
            <input type="text" value="{{$data->coupon_amount}}" class="form-control"  name="coupon_amount" required>
        </div>
        <div class="form-group">
            <label for="valid_date">Valid Date</label>
            <input type="date" value="{{$data->valid_date}}" class="form-control"  name="valid_date" required>
        </div>
        <div class="form-group">
            <label for="type">Status: </label>
            <label>
                <select name="status" class="form-control" required>
                    <option value="Active" @if($data->status == "Active") selected @endif>Active</option>
                    <option value="Inactive"@if($data->status == "Inactive") selected @endif>Inactive</option>
                </select>
            </label>
        </div>
    </div>
    <div class="modal-footer">
        {{--                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
        <button type="Submit" class="btn btn-primary"> <span class="loading d-none"> Loading...</span>Submit</button>
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

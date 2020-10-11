@extends('admin.master')
@section('body')
    <h1 style="text-align: center"> Sub Category  Crud</h1>
    <div align="right">
        <a class="btn btn-success btn-sm" href="javascript:void(0)" id="createNewProduct"> Create New SubCategory</a>
    </div>
    <br>
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>No</th>
            <th>Category</th>
            <th>Subcategory Name</th>
            <th>Subcategory Details</th>
            <th>Publication Status</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="subcategoryForm" name="subcategoryForm" class="form-horizontal">
                    <input type="hidden" name="subcategory_id" id="subcategory_id">

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Select Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                           @php
                           $categories = \Illuminate\Support\Facades\DB::table('categories');
                           @endphp
                            @foreach(  $categories as $category )
                                <option value="{{ $category->category_id}}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">SubCategory Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control input-sm dynamic" id="subcategory_name" name="subcategory_name" placeholder="Enter Subcategory  Name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">SubCategory Description</label>
                        <div class="col-sm-12">
                            <textarea id="description" name="description" required="" placeholder="Enter Subcategory Description" class="form-control" rows="4" cols="4"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="publication_status" class="col-sm-2 control-label">Publication Status</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="publication_status" name="publication_status" placeholder="Enter Publication Status" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<script type="text/javascript">
    $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('subcategories.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'category_id', name: 'category_id'},
                {data: 'subcategory_name', name: 'subcategory_name'},
                {data: 'description', name: 'description'},
                {data: 'publication_status', name: 'publication_status'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        $('#createNewProduct').click(function () {
            $('#saveBtn').val("create-subcategory");
            $('#subcategory_id').val('');
            $('#subcategoryForm').trigger("reset");
            $('#modelHeading').html("Create New Subcategory");
            $('#ajaxModel').modal('show');
        });

        $('body').on('click', '.editSubcategory', function () {
            var subcategory_id = $(this).data('id');
            $.get("{{ route('subcategories.index') }}" +'/' + subcategory_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Subcategory");
                $('#saveBtn').val("edit-subcategory");
                $('#ajaxModel').modal('show');
                $('#subcategory_id').val(data.id);
                $('#category_id').val(data.category_id);
                $('#subcategory_name').val(data.subcategory_name);
                $('#description').val(data.description);
                $('#publication_status').val(data.publication_status);
            })
        });

        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#subcategoryForm').serialize(),
                url: "{{ route('subcategories.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#subcategoryForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();

                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });

        $('body').on('click', '.deleteSubcategory', function () {

            var subcategory_id = $(this).data("id");
            confirm("Are You sure want to delete !");

            $.ajax({
                type: "DELETE",
                url: "{{ route('subcategories.store') }}"+'/'+subcategory_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data)
                {
                    console.log('Error:', data);
                }
            });
        });

    });
</script>
@endsection

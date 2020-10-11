<!DOCTYPE html>
<html>
<head>
    <title>Cloths Ecomarce</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

</head>
<body>
<div class="container">
    <h1 class="text-center">Subcategory Crud</h1>
    <div class="row mt-5">
        <div class="col-6 offset-3">
            <form id="myForm">
            <diiv class="form-group">
                <lable for="Select Category"> Select Category</lable>
                <select name="category_id" class="form-control">
                    <option value=""></option>
                </select>
            </diiv>
            <diiv class="form-group">
                <lable for="Select Category">Subcategory Name</lable>
                <input type="text" name="subcategory_name" id="subcategory_name" class="form-control"   placeholder="Enter Subcategory  Name" value="" maxlength="50" required="">
            </diiv>
            <diiv class="form-group">
                <lable for="Select Category">Subcategory Description</lable>
                <textarea id="category_description" name="category_description" required=""
                          placeholder="Enter Category Description" class="form-control" rows="4"
                          cols="4"></textarea>
            </diiv>
            <diiv class="form-group">
                <lable for="Select Category">Publication Status </lable>
                <select name="publication_status" class="form-control">
                    <option value=""></option>
                </select>
            </diiv>
            <br>
            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
            </button>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <table id="subcategoryTable" class="table table-bordered">
            <thead>
            <tr>
                <th>Category</th>
                <th>Subcategory Name</th>
                <th>Subcategory Description</th>
                <th>Publication Status</th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>
<script>
    $(document).ready(function () {

        //Data Inserted Code
           $('#saveBtn').ready(function (e) {

                   e.preventDefault();
                   $.ajax({
                       url: "",
                       type: "post",
                       dataType: "json",
                       data: ('#myFrom').serialize(),
                       success: function (response) {
                           $('#myForm')[0].reset();
                              console.log(response);
                       }
                   });
           });
           //Data Display code
      var table =  $('#example').DataTable( {
            ajax: {{ url('getsubcat') }},
            columns: [
                { "data": "name" },
                { "data": "position" },
                { "data": "office" },
                { "data": "extn" },
                { "data": "start_date" },
                { "data": "salary" }
            ]
        } );

    });
</script>
</body>

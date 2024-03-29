<html lang="en">
<head>
    <title>Laravel DataTable - Tuts Make</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Laravel DataTable - Tuts Make</h2>
    <!-- <table class="table table-bordered" id="laravel_datatable"> -->
    <table class="table table-bordered" id="laravel_datatable">
        <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Age</th>
            <th>Created at</th>
            <th>Created at</th>
        </tr>
        </thead>
    </table>
</div>
<script>
    $(document).ready( function () {
        $('#laravel_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('cska2s-list') }}",
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'age', name: 'age' },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' }
            ]
        });
    });
</script>
</body>
</html>


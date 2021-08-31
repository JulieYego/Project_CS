<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.0/js/dataTables.bootstrap5.min.js"></script>
    <title>Cases</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <table class="table table-dark table-striped table-hover data-table">
                    <thead>
                    <tr>
                        <th>Case Number</th>
                        <th>Suspect Name</th>
                        <th>Courtroom</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Activity</th>
                        <th>Case Outcome</th>
                        <th>Case Type</th>
                        <th>Case Description</th>
                        <th>Case Notes</th>
                        <th>Plea Taken</th>
                        <th>Case Status</th>
                        <th>Update</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>   
</body>

<script type="text/javascript">
  $(function () {
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{!! route('cases') !!}",
        columns: [
                { data: 'id', name: 'id' },
                { data: 'suspect_name', name: 'suspect_name' },
                { data: 'courtroom', name: 'courtroom' },
                { data: 'date', name: 'date' },
                { data: 'time', name: 'time' },
                { data: 'activity', name: 'activity' },
                { data: 'outcome', name: 'outcome' },
                { data: 'type', name: 'type' },
                { data: 'case_description', name: 'case_description' },
                { data: 'case_notes', name: 'case_notes' },
                { data: 'plea', name: 'plea' },
                { data: 'case_status', name: 'case_status' },
                { data: 'action', name: 'action', orderable: false, searchable: false},
            ]
    });
  });
</script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Document</title>
</head>
<body>
<div class="delete-form col-4 mx-auto">
    <form action="{{ route('destroy', $data->id) }}" method="POST">
        <div class="modal-body">
            @csrf
            @method('delete')
            <h5>Are you sure you want to delete the  selected user {{ $data->first_name }} {{ $data->last_name }}?!</h5>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-warning">Yes, Delete</button>
        </div>
        
    </form>
</div>
</body>
</html>


   

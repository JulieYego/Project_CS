<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2/css/bootstrap.css') }}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="" rel="stylesheet" />
    <link href="/css/form.css" rel="stylesheet" />
    <title>Update Suspect</title>
</head>

<style>
    button{
        width: 100px;
    }
    .save {
        display: inline-block;
        vertical-align: middle;
        position: relative;
        top:-40px;
    }
    .back{
        display: inline-block;
        vertical-align: middle;
        position: relative;
        top:-40px;
    }
    .sibs {
        overflow: hidden;
        padding: 15px;
    }
    h4{
        color:white;
    }

    img {
    height: 80px;
    }
    .input{
        color : black;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">    
            <div class="card" style="width: 35rem; height:70rem">
                <div class="card-header">
                    <h3>{{ __('Update Suspect') }}</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('update_suspect') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$data['id']}}">
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="first_name" class="">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" readonly class="input form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{$data['first_name']}}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-wrapper">
                                <label for="last_name" class="">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" readonly class="input form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$data['last_name']}}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-wrapper">
                            <label for="officer">{{ __('Arresting Officer') }}</label>
                            <input id="officer" type="text" readonly class="input form-control @error('officer') is-invalid @enderror" name="officer" value="{{$data['officer']}}" required autocomplete="officer" autofocus>
                                @error('officer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="crime">{{ __('Reason of Arrest') }}</label>
                            <input id="crime" type="text" readonly class="input form-control @error('crime') is-invalid @enderror" name="crime" value="{{$data['crime']}}" required autocomplete="crime" autofocus>
                                @error('crime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="created_at">{{ __('Time of Boooking') }}</label>
                            <input id="created_at" type="text" readonly class="input form-control @error('created_at') is-invalid @enderror" name="created_at" value="{{$data['created_at']->toDayDateTimeString()}}" required autocomplete="created_at" autofocus>

                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="present">{{ __('To be presented before') }}</label>
                            <input id="present" type="text" readonly class="input form-control @error('present') is-invalid @enderror" name="present" value="{{$data['present']->toDayDateTimeString()}}" required autocomplete="present" autofocus>
                                @error('present')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                        <label for="status" class="">{{ __('Status') }}</label>
                            <select name="status" id="status" class="form-control" required>
                                    <option value="Select Status">Select Status</option>
                                    <option value="Presented">Presented</option>
                                    <option value="Cash bail">Cash bail</option>
                                </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="date" class="">{{ __('Date presented') }}</label>
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-wrapper">
                                <label for="time" class="">{{ __('Time presented') }}</label>
                                <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" required autocomplete="time" autofocus>
                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <button type="submit" class="btn btn-warning" >
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<link rel="stylesheet" type="text/css" href="/jquery.datetimepicker.css"/ >
<script src="/jquery.js"></script>
<script src="/build/jquery.datetimepicker.full.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        function back() {
            location.href = "officer_landing_page";
        }
    </script>

    @if(session('status'))
        <script>
            //toastr.success("{{ session('status') }}");
            swal("{{ session('status') }}",{
                button:"OK",
            })
        </script>
    @endif
</html>




    


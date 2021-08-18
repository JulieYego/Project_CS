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
    <div class="edit-form col-5 mx-auto">


        <h1>Update Officer</h1>

        <form action="{{route('update',array($data->id))}}" method="POST">
            @method('PATCH')
            @csrf
            <input type="hidden" name="id" value="{{ $data['id']}}">

            <div class="form-group">
                <div class="form-wrapper">
                    <label for="first_name" class="">{{ __('First Name') }}</label>
                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $data['first_name'] }}" required autocomplete="first_name" autofocus> <br> </br>
                    @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-wrapper">
                    <label for="last_name" class="">{{ __('Last Name') }}</label>
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ $data['last_name'] }}" required autocomplete="last_name" autofocus> <br> </br>
                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-wrapper">
                <label for="o_number">{{ __('Officer Number') }}</label>
                <input id="o_number" type="text" style="width: 450px;" class="form-control @error('o_number') is-invalid @enderror" name="o_number" value="{{ $data['o_number'] }}" required autocomplete="o_number" autofocus><br> </br>
                @error('o_number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-wrapper">
                <label for="email" class="">{{ __('Email Address') }}</label>
                <input id="email" type="email" style="width: 450px;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data['email'] }}" required autocomplete="email"><br> </br>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
    

            <button type="submit" class="btn btn-warning" >
                Update
            </button>



        </form>

    </div>
</body>

</html>
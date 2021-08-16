@extends('layouts.app')

@section('content')
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
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <div class="card" style="width: 32rem; height:53rem">
                <div class="card-header">
                    <h3>{{ __('Book New Suspect') }}</h3>
                </div>

                <div class="card-body">
                    <form method="POST" action="edit" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="first_name" class="">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-wrapper">
                                <label for="last_name" class="">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  

                        <div class="form-wrapper">
                            <label for="IDnumber">{{ __('ID Number') }}</label>
                            <input id="IDnumber" type="text" style="width: 450px;" class="form-control @error('IDnumber') is-invalid @enderror" name="IDnumber" value="{{ old('IDnumber') }}" required autocomplete="IDnumber" autofocus>
                                @error('IDnumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="gender" class="">{{ __('Gender') }}</label>
                                <select name="gender" style="width: 450px;" id="gender" class="form-control" required>
                                    <option value="Select Gender">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="officer">{{ __('Arresting Officer') }}</label>
                            <input id="officer" type="text" style="width: 450px;" class="form-control @error('officer') is-invalid @enderror" name="officer" value="{{ old('officer') }}" required autocomplete="officer" autofocus>
                                @error('officer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="crime">{{ __('Reason of Arrest') }}</label>
                            <input id="crime" type="text" style="width: 450px;" class="form-control @error('crime') is-invalid @enderror" name="crime" value="{{ old('crime') }}" required autocomplete="crime" autofocus>
                                @error('crime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="place">{{ __('Place of Arrest') }}</label>
                            <input id="place" type="text" style="width: 450px;" class="form-control @error('place') is-invalid @enderror" name="place" value="{{ old('place') }}" required autocomplete="place" autofocus>
                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo</label>
                            <input class="form-control" type="file" name="photo" id="photo">
                        </div>

                        <div class="form-wrapper" style="margin-left: 20px;">
                            <label for="gender" class="">{{ __('Status') }}</label>
                                <select name="gender" style="width: 450px;" id="gender" class="form-control" required>
                                    <option value="Select Gender">Select Status</option>
                                    <option value="Male">Not presented</option>
                                    <option value="Female">Presented</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        

                        <div class="sibs">
                            <div class="back">
                                <button onclick="back()">{{ __('BACK') }}</button>
                            </div>
                            <div class="save">
                                <button type="submit" >
                                    {{ __('SAVE') }}
                                </button>    
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
@endsection

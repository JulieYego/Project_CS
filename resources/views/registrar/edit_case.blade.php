@extends('layouts.app')

@section('content')

<style>
    .save{
        position: relative;
        top:-0px;
        margin-left: 50px;
    }
    img {
    height: 80px;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="width: 32rem; height:59rem">
                <div class="card-header">
                    <h3>{{ __('Update Case') }}</h3>
                </div>

                @if(Session::get('success'))
                    <div class ="alert alert-success">
                            {{Session::get('success')}}
                    </div>
                @endif

                @if(Session::get('fail'))
                    <div class ="alert alert-danger">
                            {{Session::get('fail')}}
                    </div>
                @endif    

                <div class="card-body">
                    <form action="{{ route('update') }}"  method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data['id']}}">
                        <input type="hidden" name="suspect_name" value="{{$data['suspect_name']}}">
                        <input type="hidden" name="type" value="{{$data['type']}}">

                        <div class="form-wrapper">
                            <label for="case_number">{{ __('Case Number') }}</label>
                            <input id="case_number" type="text" class="form-control @error('case_number') is-invalid @enderror" name="case_number" value="{{ $data['id'] }}" required autocomplete="suspect_name" autofocus>
                            @error('case_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="accusor" class="">{{ __('Accusor') }}</label>
                                <input id="accusor" type="text" class="form-control @error('accusor') is-invalid @enderror" name="accusor" value="{{ old('accusor') }}" required autocomplete="accusor" autofocus>
                                @error('accusor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-wrapper">
                                <label for="defendant" class="">{{ __('Defendant') }}</label>
                                <input id="defendant" type="text" class="form-control @error('defendant') is-invalid @enderror" name="defendant" value="{{ old('defendant') }}" required autocomplete="defendant" autofocus>
                                @error('defendant')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="case_judge" class="">{{ __('Case Judge') }}</label>
                                <input id="case_judge" type="text" class="form-control @error('case_judge') is-invalid @enderror" name="case_judge" value="{{ old('case_judge') }}" required autocomplete="case_judge" autofocus>
                                @error('case_judge')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-wrapper">
                                <label for="courtroom" class="">{{ __('Courtroom') }}</label>
                                <input id="courtroom" type="text" class="form-control @error('courtroom') is-invalid @enderror" name="courtroom" value="{{ old('courtroom') }}" required autocomplete="courtroom" autofocus>
                                @error('courtroom')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-wrapper">
                            <label for="activity" class="">{{ __('Case Activity') }}</label>
                                <select name="activity" style="width: 450px;" id="activity" class="form-control" required>
                                    <option value="Select Case Activity">Select Case Activity</option>
                                    <option value="Hearing">Hearing</option>
                                    <option value="Ruling">Ruling</option>
                                </select>
                                @error('activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="date" class="">{{ __('Case date') }}</label>
                                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-wrapper">
                                <label for="time" class="">{{ __('Case time') }}</label>
                                <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{ old('time') }}" required autocomplete="time" autofocus>
                                @error('time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="form-wrapper">
                            <label for="witnesses">{{ __('Case Witnesses') }}</label>
                            <textarea class="form-control"  type="text" style="width: 450px;" class="form-control @error('witnesses') is-invalid @enderror" name="witnesses" value="{{ old('witnesses') }}" required autocomplete="witnesses" autofocus></textarea>
                                @error('witnesses')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-wrapper">
                            <label for="outcome">{{ __('Case Outcome') }}</label>
                            <textarea class="form-control"  type="text" style="width: 450px;" class="form-control @error('outcome') is-invalid @enderror" name="outcome" value="{{ old('outcome') }}" required autocomplete="outcome" autofocus></textarea>
                                @error('outcome')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                                         
                        <div class="form-wrapper">
                            <label for="case_notes">{{ __('Case Notes') }}</label>
                            <textarea class="form-control"  type="text" style="width: 450px;" class="form-control @error('case_notes') is-invalid @enderror" name="case_notes" value="{{ old('case_notes') }}" required autocomplete="case_notes" autofocus></textarea>
                                @error('case_notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo Evidence</label>
                            <input class="form-control" type="file" name="photo" id="photo">
                        </div>

                        <div class="save">
                            <button type="submit" >
                                {{ __('SAVE') }}
                            </button>    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
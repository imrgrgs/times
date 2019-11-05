@extends('adminlte::master')
@section('body_class')

@section('body')

<div class="row">
    <div class="col-md-6">
      <div class="form-group  has-feedback {{ $errors->has('full_name') ? 'has-error' : '' }}">
        <label for="full_name">{{ __('adminlte::adminlte.full_name') }}</label>
        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name',$clube->full_name) }}" >
        @if ($errors->has('full_name'))
         <span class="help-block">
           {{ $errors->first('full_name') }}
         </span>
        @endif
      </div>
    </div>
  
    <div class="col-md-4">
      <div class="form-group  has-feedback {{ $errors->has('nick_name') ? 'has-error' : '' }}">
        <label for="nick_name">{{ __('adminlte::adminlte.nick_name') }}</label>
        <input type="text" class="form-control" id="nick_name" name="nick_name" value="{{ old('nick_name', $clube->nick_name) }}" >
        @if ($errors->has('nick_name'))
          <span class="help-block">
          {{ $errors->first('nick_name') }}
          </span>
        @endif
      </div>
    </div>
  
  
    <div class="col-md-2">
      <div class="form-group has-feedback {{ $errors->has('birthday') ? 'has-error' : '' }}">
        <label for="birthday">{{ __('adminlte::adminlte.foundation') }}</label>
        <input type="text" class="form-control" id="birthday" name="birthday" value="{{ old('birthday',$clube->birthdayFormatted) }}">
        @if ($errors->has('birthday'))
        <span class="help-block">
        {{ $errors->first('birthday') }}
        </span>
        @endif
      </div>
        
    </div>    
  </div> 
  <!-- /.row -->
  


@stop
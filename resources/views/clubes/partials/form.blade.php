<div class="row">
  <div class="col-md-6">
    <div class="form-group  has-feedback {{ $errors->has('full_name') ? 'has-error' : '' }}">
      <label for="full_name">{{ __('adminlte::adminlte.full_name') }}</label>
      <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" >
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
      <input type="text" class="form-control" id="nick_name" name="nick_name" value="{{ old('nick_name') }}" >
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
      <input type="text" class="form-control" id="birthday" name="birthday" value="{{ old('birthday') }}">
      @if ($errors->has('birthday'))
      <span class="help-block">
      {{ $errors->first('birthday') }}
      </span>
      @endif
    </div>
      
  </div>    
</div> 
<!-- /.row -->

<div class="row">
  <div class="col-md-6">
    <div class="form-group has-feedback {{ $errors->has('federal_division') ? 'has-error' : '' }}">
      <label for="federal_division">{{ __('adminlte::adminlte.federal_division') }}</label>
      <select id="federal_division" name="federal_division" class="form-control select2" style="width: 100%;">
        <option value="">Escolha a Divisão</option>  
        @foreach ($divisoes as $divisao)
        @if ($divisao['id'] == old('federal_division'))
        <option value="{{ $divisao['id'] }}" selected>{{ $divisao['sigla'] }}</option>
        @else
        <option value="{{ $divisao['id'] }}">{{ $divisao['sigla'] }}</option>
        @endif
        @endforeach
      </select>
      @if ($errors->has('federal_division'))
      <span class="help-block">
      {{ $errors->first('federal_division') }}
      </span>
      @endif

    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group has-feedback {{ $errors->has('state_division') ? 'has-error' : '' }}">
      <label for="state_division">{{ __('adminlte::adminlte.state_division') }}</label>
      <select id="state_division" name="state_division" class="form-control select2" style="width: 100%;">
        <option value="">Escolha a Divisão</option>  
        @foreach ($divisoes as $divisao)
        @if ($divisao['id'] == old('state_division'))
        <option value="{{ $divisao['id'] }}" selected>{{ $divisao['sigla'] }}</option>
        @else
        <option value="{{ $divisao['id'] }}">{{ $divisao['sigla'] }}</option>
        @endif
        @endforeach
      </select>
      @if ($errors->has('state_division'))
      <span class="help-block">
      {{ $errors->first('state_division') }}
      </span>
      @endif

    </div>
  </div>
</div> 
<!-- /.row -->

<div class="row">
  <div class="col-md-4">
    <div class="form-group has-feedback {{ $errors->has('state') ? 'has-error' : '' }}">
      <label for="state">{{ __('adminlte::adminlte.state') }}</label>
      <select id="state" name="state" class="form-control select2" style="width: 100%;">
        <option value="">Escolha o Estado</option>  
        @foreach ($estados as $uf)
        @if ($uf->id == old('state'))
        <option value={{ $uf->id }} selected>{{ $uf->sigla }}-{{ $uf->estado }}</option>
        @else
        <option value={{ $uf->id }}>{{ $uf->sigla }}-{{ $uf->estado }}</option>     
        @endif
        
        @endforeach
      </select>
      @if ($errors->has('state'))
      <span class="help-block">
      {{ $errors->first('state') }}
      </span>
      @endif
    </div>
  </div>    

  <div class="col-md-4">
    <div class="form-group has-feedback {{ $errors->has('city') ? 'has-error' : '' }}">
      <label for="city">{{ __('adminlte::adminlte.city') }}</label>
      <select id="city" name="city" class="form-control select2" style="width: 100%;">
        <option value="{{old('city')}}">Escolha Cidade</option>
      </select>
    </div>
    @if ($errors->has('city'))
    <span class="help-block">
    {{ $errors->first('city') }}
    </span>
    @endif
  </div>    
</div> 
<!-- /.row -->



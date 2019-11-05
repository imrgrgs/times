<div class="row">
  <div class="col-md-4">
    <div class="form-group has-feedback {{ $errors->has('clube_id') ? 'has-error' : '' }}">
      <label for="clube_id">{{ __('adminlte::adminlte.club') }}</label>
      <select id="clube_id" name="clube_id" class="form-control select2" style="width: 100%;">
        <option value="">Escolha o clube</option>  
        @foreach ($clubes as $clube)
        @if ($clube->id == old('clube_id',$jogador->clube_id))
        <option value={{ $clube->id }} selected>{{ $clube->full_name }}</option>
        @else
        <option value={{ $clube->id }}>{{ $clube->full_name }}</option>     
        @endif
        
        @endforeach
      </select>
      @if ($errors->has('clube_id'))
      <span class="help-block">
      {{ $errors->first('clube_id') }}
      </span>
      @endif
    </div>
  </div>    
</div> 
<!-- /.row -->


<div class="row">
  <div class="col-md-6">
    <div class="form-group  has-feedback {{ $errors->has('full_name') ? 'has-error' : '' }}">
      <label for="full_name">{{ __('adminlte::adminlte.full_name') }}</label>
      <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name',$jogador->full_name) }}" >
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
      <input type="text" class="form-control" id="nick_name" name="nick_name" value="{{ old('nick_name',$jogador->nick_name) }}" >
      @if ($errors->has('nick_name'))
        <span class="help-block">
        {{ $errors->first('nick_name') }}
        </span>
      @endif
    </div>
  </div>


  <div class="col-md-2">
    <div class="form-group has-feedback {{ $errors->has('birthday') ? 'has-error' : '' }}">
      <label for="birthday">{{ __('adminlte::adminlte.birthday') }}</label>
      <input type="text" class="form-control" id="birthday" name="birthday" value="{{ old('birthday',$jogador->birthday) }}">
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
    <div class="form-group  has-feedback {{ $errors->has('height') ? 'has-error' : '' }}">
      <label for="height">{{ __('adminlte::adminlte.height') }}</label>
      <input type="text" class="form-control" id="height" name="height" value="{{ old('height',$jogador->height) }}" >
      @if ($errors->has('height'))
       <span class="help-block">
         {{ $errors->first('height') }}
       </span>
      @endif
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group  has-feedback {{ $errors->has('weight') ? 'has-error' : '' }}">
      <label for="weight">{{ __('adminlte::adminlte.weight') }}</label>
      <input type="text" class="form-control" id="weight" name="weight" value="{{ old('weight',$jogador->weight) }}" >
      @if ($errors->has('weight'))
        <span class="help-block">
        {{ $errors->first('weight') }}
        </span>
      @endif
    </div>
  </div>
</div> 
<!-- /.row -->

<div class="row">
  <div class="col-md-4">
    <div class="form-group has-feedback {{ $errors->has('position') ? 'has-error' : '' }}">
      <label for="position">{{ __('adminlte::adminlte.position') }}</label>
      <select id="position" name="position" class="form-control select2" style="width: 100%;">
        <option value="">Escolha a posição do jogador</option>  
        @foreach ($positions as $position)
        @if ($position->id == old('position',$jogador->position))
        <option value={{ $position->id }} selected>{{ $position->description }}</option>
        @else
        <option value={{ $position->id }}>{{ $position->description }}</option>     
        @endif
        
        @endforeach
      </select>
      @if ($errors->has('position'))
      <span class="help-block">
      {{ $errors->first('position') }}
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
        @if ($uf->id == old('state',$jogador->state))
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
        <option value="{{old('city',$jogador->city)}}">Escolha Cidade</option>
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



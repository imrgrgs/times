@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>{{ __('adminlte::adminlte.clubs') }}</h1>
@stop

@section('content')
<div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">{{ __('adminlte::adminlte.edit') }}</h3>

    </div>
    <!-- /.box-header -->

     <!-- form start -->
    <form method="post" action="{{ route('jogadores.update',$id)}}" role="form">
      {{csrf_field()}}
      {{ method_field('patch') }}
    <div class="box-body">
   
        <div class="row">
          <div class="col-md-12">

             @include('jogadores.partials.formEdit')
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
          <button type="submit" class="btn btn-info  pull-right" id="prevBtn" >{{ __('adminlte::adminlte.save') }}</button>
          <a href="{{ route('jogadores.index')}}" class="btn btn-primary ">{{ trans('adminlte::adminlte.back') }}</a>       </div>
    </div>
    </form>
  </div>
  <!-- /.box -->



@stop

@section('js')
<script>
  $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        
        //Datemask dd/mm/yyyy
        $('#birthday').inputmask('99/99/9999', { 'placeholder': 'dd/mm/aaaa' })
        $('#zip_code').inputmask('99999-999', { 'placeholder': '99999-99' })
        $('#state').inputmask('AA', { 'placeholder': 'AA' })
        $('#phone').inputmask('(99) 9999-9999', { 'placeholder': '(99) 9999-9999' })
        $('#mobile').inputmask('(99) 99999-9999', { 'placeholder': '(99) 99999-9999' })
        

        $('select[name=state]').change(function () {
            var idEstado = $(this).val();
            var idCidade = $('#city').val(); 
 
            $.get('/cidadesByEstado/' + idEstado, function (cidades) {
                $('select[name=city]').empty();
                $('select[name=city]').append('<option value="" selected>Escolha a Cidade</option>');

                $.each(cidades, function (key, value) {
                    if(value.id == idCidade){
                      $('select[name=city]').append('<option value=' + value.id + ' selected>' + value.cidade + '</option>');

                    }else{
                      $('select[name=city]').append('<option value=' + value.id + '>' + value.cidade + '</option>');
                    }
                    
                });
            });
        });

        

    
  })
</script>
@stop
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>{{ trans('adminlte::adminlte.clubs') }}</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ trans('adminlte::adminlte.list') }}</h3>
            </div>
            <div>
                <a style="margin: 19px;" href="{{ route('clubes.create')}}" class="btn btn-primary">{{ trans('adminlte::adminlte.new') }}</a>

                <a style="margin: 19px;" href="{{action('User\ClubesController@exportExcel')}}" class="btn btn-primary">Gerar Excel</a>
                <a style="margin: 19px;" href="{{action('User\ClubesController@exportCsv')}}" class="btn btn-primary">Gerar CSV</a>
              </div>  
            <!-- /.box-header -->
            <div class="box-body">
                @if(session()->get('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
                  {{ session()->get('success') }} 
                </div>
                <br />
              @endif
                <div class="table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>{{ trans('adminlte::adminlte.full_name') }}</th>
                  <th>{{ trans('adminlte::adminlte.foundation') }}</th>
                  <th>{{ trans('adminlte::adminlte.state') }}</th>
                  <th>{{ trans('adminlte::adminlte.city') }}</th>
                  
                  <th colspan = 2>{{ trans('adminlte::adminlte.action') }}</th>

                </tr>
                </thead>
                <tbody>
                        @foreach($clubes as $clube)
                        <tr>
                            <td>{{$clube->id}}</td>
                            <td>{{$clube->full_name}}</td>
                            <td>{{$clube->birthdayFormatted }}</td>
                            <td>{{$clube->estado->sigla}}</td>
                            <td>{{$clube->cidade->cidade}}</td>
                            
                            <td>
                                <a href="{{ route('clubes.edit',$clube->id)}}" class="btn btn-primary btn-sm">{{ trans('adminlte::adminlte.edit') }}</a>
                            </td>
                            <td>
                                <form  action="{{ route('clubes.destroy', $clube->id)}}" method="post" onsubmit="confirm('Tem certeza que deseja excluir?')">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                  <button class="btn btn-danger btn-sm" type="submit">{{ trans('adminlte::adminlte.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        {{ $clubes->links() }}
                </tbody>
               </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

@stop

@section('js')
<script>
  $(function () {
    
    
  })
</script>
@stop
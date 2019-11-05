@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1>{{ trans('adminlte::adminlte.plaiers') }}</h1>
@stop

@section('content')
<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ trans('adminlte::adminlte.list') }}</h3>
            </div>
            <div>
                <a style="margin: 19px;" href="{{ route('jogadores.create')}}" class="btn btn-primary">{{ trans('adminlte::adminlte.new') }}</a>
                <a style="margin: 19px;" href="{{action('User\JogadoresController@exportExcel')}}" class="btn btn-primary">Gerar Excel</a>
                <a style="margin: 19px;" href="{{action('User\JogadoresController@exportCsv')}}" class="btn btn-primary">Gerar CSV</a>
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
                  <th>{{ trans('adminlte::adminlte.club') }}</th>
                  <th>{{ trans('adminlte::adminlte.full_name') }}</th>
                  <th>{{ trans('adminlte::adminlte.nick_name') }}</th>
                  <th>{{ trans('adminlte::adminlte.position') }}</th>
                  <th>{{ trans('adminlte::adminlte.birthday') }}</th>
                  <th>{{ trans('adminlte::adminlte.state') }}</th>
                  <th>{{ trans('adminlte::adminlte.city') }}</th>
                  
                  <th colspan = 3>{{ trans('adminlte::adminlte.action') }}</th>
                </tr>
                </thead>
                <tbody>
                        @foreach($jogadores as $jogador)
                        <tr>
                            <td>{{$jogador->id}}</td>
                            <td>{{$jogador->clube->full_name}}</td>
                            <td>{{$jogador->full_name}}</td>
                            <td>{{$jogador->nick_name}}</td>
                            <td>{{$jogador->position}}</td>
                            <td>{{$jogador->birthdayFormatted }}</td>
                            <td>{{$jogador->estado->sigla}}</td>
                            <td>{{$jogador->cidade->cidade}}</td>
                            
                            <td>
                                <a href="{{ route('jogadores.edit',$jogador->id)}}" class="btn btn-primary btn-sm">{{ trans('adminlte::adminlte.edit') }}</a>
                            </td>
                            <td>
                                <form  action="{{ route('jogadores.destroy', $jogador->id)}}" method="post" onsubmit="confirm('Tem certeza que deseja excluir?')">
                                        {{ csrf_field() }}
                                        {{ method_field('delete') }}
                                  <button class="btn btn-danger btn-sm" type="submit">{{ trans('adminlte::adminlte.delete') }}</button>
                                </form>
                            </td>
                            <td><a href="{{action('User\JogadoresController@downloadPDF', $jogador->id)}}">Download PDF</a></td>

                        </tr>
                        @endforeach
                        {{ $jogadores->links() }}
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
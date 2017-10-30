@extends('layouts.admin')

@section('content')
  @include('errors._error')
  @include('errors._alert')

<div class="row">
  <!-- left column -->
  <div class="col-md-12">
    <!-- general form elements -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Editar Fornecedor </h3>
      </div>
      <!-- /.box-header -->
      <!-- form start -->
      <div class="box-body">
        <div class="row">
        {!! Form::open(['url'=>[route('fornecedor.update', $fornecedor->id)], 'method'=>'put']) !!}
          @include('fornecedor._form')
          <div class="form-group col-xs-12">
            <div class="pull-right">
              {!! Form::submit('Alterar', ['class'=>'btn btn-primary']) !!}
              <a href="{{url()->previous()}}" class="btn btn-default">Cancel</a>
            </div>
          </div>
        {!! Form::close() !!}
        </div>
      </div>
    </div>
    <!-- /.box -->
  </div>
</div>
@endsection


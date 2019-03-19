@extends('admin.template')

@section('icerik')
    <div class="row-fluid">
        <div class="span12">

            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-hand-right"></i> </span>
                    <h5>Pop-up dialogs</h5>
                </div>

                <div class="controls">
                    {!! Form::open(array('method'=>'POST','action'=>'DosyaController@store','class'=>'dropzone','files'=>'true','multiple'=>'true')) !!}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endsection
@section('js')
    <script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
@endsection

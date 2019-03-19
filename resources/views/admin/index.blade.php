@extends('admin.template')
@section('icerik')




@endsection
@section('css')

@endsection
@section('js')
    <script>
        // Initialize the object
        $("select").imagepicker();
        // Retrieve the picker
        $("select").data('picker');
    </script>
@endsection

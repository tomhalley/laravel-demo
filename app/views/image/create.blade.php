@extends('shared.base')

@section("title")
Upload a Photo
@stop

@section("content")
{{ Form::open(array('url' => '/create/process', 'files' => true)) }}
<fieldset>
    <legend>Upload a Photo</legend>
    <!-- CRF Token -->
    {{ Form::token() }}

    <!-- Title box -->
    <div class="fieldarea">
        {{ Form::label('title', 'Title') }}
        <br />
        {{ Form::text('title', Input::old('title'), array("placeholder" => "Photo title...")) }}
    </div>

    <!-- Description box -->
    <div class="fieldarea">
        {{ Form::label('description', 'Description') }}
        <br />
        {{ Form::textarea('description', Input::old('description'), array("placeholder" => "Photo description...")) }}
    </div>

    <div class="fieldarea">
        {{ Form::file("image") }}
    </div>

    <!-- Submit Button -->
    <div class="fieldarea">
        {{ Form::submit('Submit', array("class" => "btn")) }}
    </div>
</fieldset>
{{ Form::close() }}
@stop

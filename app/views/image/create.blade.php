{{ Form::open(array('url' => '/create/process', 'files' => true)) }}
<fieldset>
    <!-- CRF Token -->
    {{ Form::token() }}

    <!-- Message box -->
    <div>
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title') }}
    </div>

    <div>
        {{ Form::file("image", $attributes = array()) }}
    </div>

    <!-- Submit Button -->
    <div>
        {{ Form::submit('Submit') }}
    </div>
</fieldset>
{{ Form::close() }}
@extends('shared.base')

@section("title")
    Home
@stop

@section("content")
    <?php
    $count = 0;
    $rowCount = 4;
    ?>
    @foreach ($images as $image)
        @if ($count %$rowCount == 0 || $count == 0)
        <div class="row-fluid">
        @endif
            <div class="col-md-<?php echo 12 / $rowCount ?> image-box">
                <a href="/view/{{ $image->id }}">
                    <img height="200px" width="200px" src="/image/{{ $image->Checksum }}" title="{{ $image->Description }}" alt="{{ $image->Description }}" />
                </a>
                <h2>{{ $image->Title }}</h2>
                <p>{{ $image->Description }}</p>
            </div>
        @if((($count + 1) %$rowCount == 0 && $count != 0) || $count == count($images))
        </div>
        @endif
        <?php $count++ ?>
    @endforeach
@stop

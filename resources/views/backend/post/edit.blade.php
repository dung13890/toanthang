@extends('layouts.backend')

@section('title', isset($heading) ? $heading : __('repositories.title.index'))

@section('page-content')
<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $heading }} ( {{ __('repositories.title.' . $item->type) }} )</h3>
                </div>
                <div class="panel-body">
                    {{ Form::model($item, [
                        'url' => route('backend.post.update', $item),
                        'role'  => 'form',
                        'files' => true,
                        'autocomplete'=>'off',
                        'method' => 'PATCH',
                    ]) }}
                        @include('backend.post._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

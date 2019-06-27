@extends('layouts.master')

@section('content')
    <h1>创建一条新消息</h1>
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
        <div class="col-md-6">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">主题</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject"
                       value="{{ old('subject') }}">
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">信息</label>
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>

            @if($users)
                <div class="checkbox">
                    @foreach($users as $user)
                        <label title="{{ $user->name }}"><input type="checkbox" name="recipients[]"
                                                                value="{{ $user->id }}">{!!$user->name!!}</label>
                    @endforeach
                </div>
            @endif
    
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">提交</button>
            </div>
        </div>
    </form>
@stop
@extends('index')
@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Chat</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Chatting</a></li>
        </ol>
    </div>
    <!-- row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Chat</h4>
                </div>
                <div class="card-body">
                    <div class="chat-box">
                        <div class="chat-body">
                            <ul class="chat-list">
                                @foreach ($messages as $data)
                                    <li class="chat-item {{ $data->isMe ? 'chat-right' : 'chat-left' }}">
                                        <div class="chat-item-content">
                                            <div class="chat-message">{{ $data->messages }}</div>
                                            <div class="chat-time">{{ $data->created_at->format('H:i') }}</div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    {{-- <form id="chat-form" action="{{ route('/index/pages/chat') }}" method="POST"> --}}
                    @csrf
                    <div class="input-group">
                        <input type="text" name="message" class="form-control" placeholder="Type a message...">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

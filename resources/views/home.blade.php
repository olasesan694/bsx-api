@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br>
                    <br>
                    &nbsp;&nbsp;&nbsp; Invite: <a href="{{ url('/invite') }}" class="btn btn-primary">Make an Invitation</a> <br><br> 
                    &nbsp;&nbsp;&nbsp; Or <br><br>
                    &nbsp;&nbsp;&nbsp; Accept invitation? <a href="{{ url('/accept') }}" class="btn btn-primary">Accept</a>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

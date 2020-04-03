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

                    &nbsp;&nbsp;&nbsp; Invite Someone: <a href="{{ url('/invite') }}" class="btn btn-primary">Make an Invitation</a> <br><br> 
                    &nbsp;&nbsp;&nbsp; Or <br><br>
                    &nbsp;&nbsp;&nbsp; Looking to accept an invitation? <a href="{{ url('/accept') }}" class="btn btn-primary">Accept</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

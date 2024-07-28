@extends('kerangka.master')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('link-header', '/dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card card-secondary card-outline mb-4">
                <div class="card-header">
                    <div class="card-title">Hallo {{ Auth::user()->name }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')

@section('content')

<div class="row g-4">
    @foreach ($stats as $key=> $stat)
    <div class="col-md-6 col-xl-3">

        <div class="dashboard-card">

            <h6 class="text-muted">
                {{ $stat['label'] }}
            </h6>

            <h2>{{ $stat['count'] }}</h2>
            <a href="{{ $stat['path'] }}" class="text-decoration-none">View</a>
        </div>

    </div>
    @endforeach
</div>

<div class="mt-4">

    <div class="dashboard-card">

        <h4>
            Welcome, {{ auth()->user()->name }}
        </h4>
        <p class="text-muted mb-0">
            Manage your Stone Graphics website from this panel.
        </p>

    </div>

</div>

@endsection
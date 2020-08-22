@extends('layouts.app')

@section('content')
@if (session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif
<div class="container">
    <h1 class="mb-4 font-sans">My Devices</h1>

    @forelse ($devices as $device)
    <div class="devices card p-3 d-flex flex-row align-items-center justify-content-center mb-3">
        <p class="device_name m-0 d-inline flex-grow-1">{{ $device->name }}</p>
        <span class="status">
            {{ 
            $device->last_used_at ?
            "Last used ".$device->last_used_at->diffForHumans() :  
            "Never used"
            }}
        </span>
        <form action="{{ route('mydevices.delete',$device) }}" method="post" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-outline-danger">Revoke Access</button>
        </form>
    </div>

    @empty

    <div class="card">
        <div class="card-header">
            My Devices
        </div>
        <div class="card-body d-flex align-items-center justify-content-center py-5">
            <h5>No devices</h5>
        </div>
    </div>

    @endforelse

</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-4 font-sans">My Devices</h1>

    <div class="devices card p-3 d-flex flex-row align-items-center justify-content-center mb-3">
        <p class="device_name m-0 d-inline flex-grow-1">Android (Galaxy Note S5)</p>
        <span class="status">Last login, 21 seconds ago</span>
        <form action="" method="post" class="d-inline-block">
            <button type="submit" class="btn btn-sm btn-outline-danger">Revoke Access</button>
        </form>
    </div>
    <div class="devices card p-3 d-flex flex-row align-items-center justify-content-center mb-3">
        <p class="device_name m-0 d-inline flex-grow-1">iOS (iPhoneX)</p>
        <span class="status">Last login, 21 seconds ago</span>
        <form action="" method="post" class="d-inline-block">
            <button type="submit" class="btn btn-sm btn-outline-danger">Revoke Access</button>
        </form>
    </div>
    <div class="devices card p-3 d-flex flex-row align-items-center justify-content-center mb-3">
        <p class="device_name m-0 d-inline flex-grow-1">Windows 10 (TOSHIBA)</p>
        <span class="status">Last login, 3 hrs ago</span>
        <form action="" method="post" class="d-inline-block">
            <button type="submit" class="btn btn-sm btn-outline-danger">Revoke Access</button>
        </form>
    </div>


</div>

@endsection
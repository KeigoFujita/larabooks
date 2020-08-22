<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class MyDevicesController extends Controller
{
    public function index()
    {
        $devices = Auth::user()->tokens;
        return view('mydevices.index')
            ->with('devices', $devices);
    }
    public function delete($device_id)
    {
        $device = Auth::user()->tokens()->where('id', $device_id);
        $device->delete();

        session()->flash('success', 'Device removed successfully!');
        return redirect(route('mydevices.index'));
    }
}

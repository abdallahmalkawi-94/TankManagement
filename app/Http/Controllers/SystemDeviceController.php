<?php

namespace App\Http\Controllers;

use App\Models\SystemDevice;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SystemDeviceController extends Controller
{
    public function index(Request $request): Factory|View|Application
    {
        $macAddress = $request->macAddress;
        $parentId = SystemDevice::getParentId($macAddress);
        $systemDevices = SystemDevice::getSystemDevicesByParentId($parentId);

        return view('system-device' , compact('systemDevices'));
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use($request) {
                $macAddress = $request->macAddress;
                $parentId = SystemDevice::create([
                    'mac_address' => $macAddress,
                    'name' => 'Controller',
                    'location' => 'Home',
                ])->id;

                $systemDevices = [
                    [
                        'name' => "Main Tank Sensor",
                        'location' => "Basement",
                        'parent_id' => $parentId,
                    ],
                    [
                        'name' => "Sub Tank Sensor",
                        'location' => "Roof",
                        'parent_id' => $parentId,
                    ],
                    [
                        'name' => "Water Flow Sensor",
                        'location' => "Basement",
                        'parent_id' => $parentId,
                    ],
                    [
                        'name' => "Water Level Sensor",
                        'location' => "Roof",
                        'parent_id' => $parentId,
                    ],
                    [
                        'name' => "Relay",
                        'location' => "Basement",
                        'parent_id' => $parentId,
                        'is_relay' => 1,
                    ],
                ];

                foreach ($systemDevices as $systemDevice) {
                    SystemDevice::create($systemDevice);
                }

                return response()->json(['Devices' => $systemDevices , 'message' => 'System Created Successfully']);
            });
        } catch (Exception $exception) {
            return response()->json(['message' => 'Some Error Happened, ' . $exception->getMessage()]);
        }

    }

    public function update(Request $request): JsonResponse
    {
        $macAddress = $request->macAddress;
        $mainTankValue = $request->mainTankValue;
        $subTankValue = $request->subTankValue;
        $waterFlow = $request->waterFlow;
        $waterLevel = $request->waterLevel;
        $relayCommand = $request->relayCommand;

        $parentId = SystemDevice::getParentId($macAddress);
        $systemDevices = SystemDevice::getSystemDevicesByParentId($parentId);

        foreach ($systemDevices as $systemDevice) {
            $deviceName = $systemDevice->name;
            switch ($deviceName) {
                case "Main Tank Sensor":
                    $systemDevice->update(['value' => $mainTankValue]);
                    break;
                case "Sub Tank Sensor":
                    $systemDevice->update(['value' => $subTankValue]);
                    break;
                case "Water Flow Sensor":
                    $systemDevice->update(['value' => $waterFlow]);
                    break;
                case "Water Level Sensor":
                    $systemDevice->update(['value' => $waterLevel]);
                    break;
                case "Relay":
                    $systemDevice->update(['relay_command' => $relayCommand]);
                    break;
            }
        }

        return response()->json(['message' => 'Data Updated Successfully']);

    }
}

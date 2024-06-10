<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{PlantPredicator, Sensor};
use File;

class PlantController extends Controller
{
    public function recievedata()
    {
        $count = Sensor::count();
        if (ceil($count / 2) > 10) {
            Sensor::orderBy('id', 'asc')->select('humidity', 'temperature', 'smoke', 'moisture', 'light ')
                ->take(ceil($count / 2))
                ->delete();
        }
        if ($count <= 0) {
            $data = ['humidity' => 0, 'temperature' => 0, 'smoke' => 0, 'moisture' => 0, 'light' => 0];
        } else {
            $data = json_decode(Sensor::latest()->first()->toJson());
        }

        return $data;
    }
    public function disease()
    {
        $data = null;
        return view('admin.plant.upload', compact('data'));
    }
    public function monitor()
    {
        Sensor::truncate();
        return view('admin.monitoring.create');
        # code...
    }
    public function edit($id)
    {
        $data = PlantPredicator::find($id);
        return view('admin.plant.upload', compact('data'));
    }
    public function history()
    {
        $data = PlantPredicator::all();
        return view('admin.plant.index', compact('data'));
    }
    public function upload(Request $request)
    {
        $imageData = base64_encode(file_get_contents($request->file('plant')));

        // Create an associative array to hold the data
        $postData = [
            'image_base64' => $imageData,
        ];

        // Convert the data to a JSON string
        $jsonData = json_encode($postData);

        // Set the request headers
        $headers = [
            'Content-Type: application/json',
        ];

        // Initialize cURL session
        $cURLConnection = curl_init('http://127.0.0.1:5000/api');

        // Set cURL options
        curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);

        // Execute the request and get the response
        $apiResponse = curl_exec($cURLConnection);

        // Close the cURL session
        curl_close($cURLConnection);

        // Decode the JSON response
        $jsonArrayResponse = json_decode($apiResponse, true);
        if ($jsonArrayResponse) {
            $predictor = new PlantPredicator;
            $predictor->disease = $jsonArrayResponse['status'];
            $predictor->prediction = $jsonArrayResponse['prediction'];
            File::isDirectory(public_path('uploads/plant-predictor')) or File::makeDirectory(public_path('uploads/plant-predictors'), 0777, true, true);
            if ($request->hasFile('plant')) {
                File::isDirectory(public_path('uploads/plant-predictor')) or File::makeDirectory(public_path('uploads/plant-predictor'), 0777, true, true);

                $fileName = time() . '.' . $request->plant->extension();
                $request->plant->move(public_path('uploads/plant-predictor'), $fileName);
                $predictor->image = 'uploads/plant-predictor/' . $fileName;
            }
            $predictor->save();
        }


        return response()->json(['message' => 'POST request successful', 'data' => $jsonArrayResponse]);
    }
    public function delete(Request $request)
    {
        PlantPredicator::find($request->plant)->delete();
        return redirect()->back()->with('success', 'Plant History deleted!');
    }
}

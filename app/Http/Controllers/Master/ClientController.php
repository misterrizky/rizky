<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Exception;

class ClientController extends Controller
{
    public function __construct()
    {
        // $this->middleware('guest:employee');
    }
    public function index(Request $request)
    {
        $limit = $request->limit ?: 5;
        $datas = Client::orderBy('created_at', 'desc')->paginate($limit);
        if ($request->ajax()) {
            return view('office.client.list', compact('datas'));
        }
        return view('office.client.index',compact('datas'));
    }
    public function create(Request $request)
    {
        if ($request->ajax()) {
            return view('office.client.input', ['client' => new Client()]);
        }
        return view('office.client.input',['client' => new Client()]);
    }
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
        try {
            $photo = request()->file('photo')->store("clients");

            $client = new Client;
            $client->name = $request->name;
            $client->slug = Str::slug($request->name);
            $client->photo = $photo;
            $client->is_active = 'N';
            $client->save();

            return response()->json([
                'alert' => 'success',
                'message' => 'Client '. $request->name . ' Saved',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }
    public function show(Client $client)
    {
        return view('office.client.show',compact('client'));
    }
    public function edit(Request $request, Client $client)
    {
        if ($request->ajax()) {
            return view('office.client.input', compact('client'));
        }
        return view('office.client.input',compact('client'));
    }
    public function update(Request $request, Client $client)
    {
        try {
            if(request()->file('photo')){
                Storage::delete($client->photo);
                $photo = request()->file('photo')->store("clients");
                $client->photo = $photo;
            }
            $client->name = $request->name;

            $client->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Client '. $request->name . ' Updated',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }
    public function destroy(Client $client)
    {
        try {
            Storage::delete($client->photo);
            $client->delete();
            return response()->json([
                'alert' => 'success',
                'message' => 'Client '. $client->name . ' Deleted',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }
    public function active(Client $client)
    {
        try {
            $client->is_active = 'Y';
            $client->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Client '. $client->name . ' Activated',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }
    public function non_active(Client $client)
    {
        try {
            $client->is_active = 'N';
            $client->update();
            return response()->json([
                'alert' => 'success',
                'message' => 'Client '. $client->name . ' Unactivated',
            ]);
        }catch (Exception $e) {
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, looks like there are some errors detected, please try again.',
            ]);
        }
    }
}

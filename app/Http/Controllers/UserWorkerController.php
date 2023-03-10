<?php

namespace App\Http\Controllers;

use App\Http\Requests\WorkerRequest;
use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;

class UserWorkerController extends Controller
{
    public function index()
    {

        $worker = Worker::query()->where('company_id', auth()->user()->company_id)->get();

        return WorkerResource::collection($worker)->all();
    }

    public function store(WorkerRequest $request)
    {
        $worker = Worker::query()->create([
            'passport_series' => $request->input('passport_series'),
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'surname' => $request->input('surname'),
            'position' => $request->input('position'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'company_id' => auth()->user()->company_id,

        ]);

        return new WorkerResource($worker);
    }

    public function view(Worker $worker)
    {
        return new WorkerResource($worker);
    }

    public function update(Worker $worker, WorkerRequest $request)
    {
        $worker->query()->update([
            'passport_series' => $request->input('passport_series'),
            'last_name' => $request->input('last_name'),
            'first_name' => $request->input('first_name'),
            'surname' => $request->input('surname'),
            'position' => $request->input('position'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'company_id' => auth()->user()->company_id,

        ]);

        return new WorkerResource($worker);
    }

    public function destroy(Worker $worker)
    {
        $worker->delete();

        return response()->json()->setStatusCode(204);
    }
}

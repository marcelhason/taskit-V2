<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\Admin\TaskResource;
use App\Models\Client;
use App\Models\ProjectType;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TasksApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('task_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskResource(Task::with(['client', 'porjectType', 'status', 'assingned'])->advancedFilter());
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->validated());
        $task->assingned()->sync($request->input('assingned.*.id', []));

        if ($media = $request->input('priloha', [])) {
            Media::whereIn('id', data_get($media, '*.id'))
                ->where('model_id', 0)
                ->update(['model_id' => $task->id]);
        }

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function create(Task $task)
    {
        abort_if(Gate::denies('task_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'meta' => [
                'client'       => Client::get(['id', 'company_name']),
                'porject_type' => ProjectType::get(['id', 'name']),
                'status'       => Status::get(['id', 'name']),
                'assingned'    => User::get(['id', 'name']),
            ],
        ]);
    }

    public function show(Task $task)
    {
        abort_if(Gate::denies('task_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TaskResource($task->load(['client', 'porjectType', 'status', 'assingned']));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        $task->assingned()->sync($request->input('assingned.*.id', []));
        $task->updateMedia($request->input('priloha', []), 'task_priloha');

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function edit(Task $task)
    {
        abort_if(Gate::denies('task_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return response([
            'data' => new TaskResource($task->load(['client', 'porjectType', 'status', 'assingned'])),
            'meta' => [
                'client'       => Client::get(['id', 'company_name']),
                'porject_type' => ProjectType::get(['id', 'name']),
                'status'       => Status::get(['id', 'name']),
                'assingned'    => User::get(['id', 'name']),
            ],
        ]);
    }

    public function destroy(Task $task)
    {
        abort_if(Gate::denies('task_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $task->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['task_create', 'task_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model         = new Task();
        $model->id     = $request->input('model_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));

        return response()->json($media, Response::HTTP_CREATED);
    }
}

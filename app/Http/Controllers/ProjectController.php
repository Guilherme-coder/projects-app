<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Project;
use Illuminate\Validation\Rules\Enum;

class ProjectController extends Controller
{
    use HttpResponses;

    public function __construct(Project $repo)
    {
        $this->repo = $repo;

    }

    public function index()
    {
        return $this->repo->getAll();
    }

    public function show($id)
    {
        $project = $this->repo->find($id);

        return $project ?? $this->response("Project Not Found", 404);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'value' => 'decimal:2',
            'status' => 'required|in:A,I'
        ]);

        if ($validator->fails())
            return $this->error('Data Invalid', 422, $validator->errors());

        $requestData = $request->all();
        $requestData['creator'] = Auth::user()->id;

        $created = $this->repo->create($requestData);

        if ($created)
            return $this->response('Project created', 201);

        return $this->error('Project not created', 400);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:255',
            'start_date' => 'date',
            'end_date' => 'date',
            'value' => 'decimal:2',
            'status' => 'in:A,I'
        ]);

        if ($validator->fails())
            return $this->error('Data Invalid', 422, $validator->errors());

        $project = $this->repo->find($id);

        if(!$project)
            return $this->response("Project Not Found", 404);

        $this->repo->update($request->all(), $project);

        return $this->response('Project updated', 200);
    }

    public function destroy($id)
    {
        $project = $this->repo->find($id);

        if(!$project)
            return $this->response("Project Not Found", 404);

        $this->repo->delete($project);
        return $this->response('Project deleted', 204);
    }
}

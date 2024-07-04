<?php

namespace App\Repositories;
use App\Models\Project as ProjectModel;

class Project {

    protected $model;

    public function __construct(ProjectModel $model)
    {
        $this->model = $model;
    }

    public function getAll(){
        return $this->model->all();
    }

    public function find($id){
        return $this->model->find($id);
    }

    public function create($data){
        return $this->model::create($data);
    }

    public function update($data, $project){
        return $project->update($data);
    }

    public function delete($project){
        return $project->delete();
    }
}

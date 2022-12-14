<?php

namespace App\repositories;

abstract  class BaseRepository implements RepositoryInterface
{
//    lấy các model tương ứng
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
       return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->find($id);
        if ($result){
           return $result->update($attributes);
        }
        return false;
    }

    public function delete($id)
    {
        $result = $this->find($id);
        if ($result){
            return $result->delete();
        }
        return false;
    }
}

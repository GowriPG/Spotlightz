<?php

namespace App\Repositories\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

// Repo

class CommonRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getDataById($id)
    {
        return $this->model->find($id);
    }

    public function update($id, $data)
    {
        try {
            $record = $this->model->find($id);
            return $record->update($data);
        } catch (ModelNotFoundException $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $record = $this->model->find($id);
            return $record->delete();
        } catch (ModelNotFoundException $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function create(array $insertData)
    {
        try {
            return $this->model->create($insertData);
        } catch (ModelNotFoundException $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function getAll($select = '*')
    {
        try {
            return $this->model->select($select)->get();
        } catch (ModelNotFoundException $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function getPluck($select = '*')
    {
        return $this->model->pluck($select);
    }

    public function getIdByName($name)
    {
        try {
            return $this->model->where('name','=',$name)->pluck('id');
        } catch (ModelNotFoundException $exception) {
            abort(500, $exception->getMessage());
        }
    }

    public function search($keyword)
    {
        try {
            return $this->model->where('name', 'LIKE','%'.$keyword.'%')->orWhere('id', $keyword );
        } catch (ModelNotFoundException $exception) {
            abort(500, $exception->getMessage());
        }
    }
}

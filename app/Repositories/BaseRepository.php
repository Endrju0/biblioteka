<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryInterface {
    protected $model;

    /**
     * Get all records in a table with optional column selection
     */
    public function getAll($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    /**
     * Adds a new record with the values specified in the argument
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Record Update. First argument is data, second argument is id
     */
    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)->update($data);
    }

    /**
     * Deleting a record
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    /**
     * Finding record with specified id with possibility of indicating specific columns
     */
    public function find($id, $columns = array('*'))
    {
        return $this->model->find($id, $columns);
    }
}
<?php

namespace App\Services;


abstract class BaseService
{

    private $model;


    /**
     * BaseService constructor.
     * @param $model
     */
    protected function __construct($model)
    {
        $this->setModel($model);
    }

    /**
     * @return string
     */
    protected function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    protected function setModel($model)
    {
        $this->model = app()->make($model);
    }


    /**
     * @param int $limit
     * @param array $fields
     * @param int $page
     * @return mixed
     */
    public function getAll($limit = 100, $page = 1, $fields = ['*'])
    {
        return $this->getModel()->paginate($limit, $fields, 'page', $page);
    }

    /**
     * @param $data
     * @return mixed
     */
    public function create($data)
    {
        $data = $this->clearNulls($data);
        return $this->getModel()->create($data);
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data, $id)
    {
        $object = $this->getModel()->find($id);
        $data = $this->clearNulls($data);
        $object->fill($data);
        $object->save();
        return $object;
    }

    /**
     * @param $value
     * @param string $field
     */
    public function delete($value, $field = 'id')
    {
        $this->getModel()->where($field,'=',$value)->delete();
    }

    /**
     * @param $data
     * @return array
     */
    public function clearNulls($data)
    {
        return array_filter($data, 'strlen');
    }


    /**
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->getModel()->find($id);
    }
}
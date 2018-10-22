<?php

namespace App\Services;

use App\Models\Employee;

class EmployeeService extends BaseService
{
    /**
     * CategoryService constructor.
     */
    public function __construct()
    {
        parent::__construct(Employee::class);
    }

    public function find($id)
    {
        return $this->getModel()->where('id','=', $id)->first();
    }

    /**
     * @param int $limit
     * @param int $page
     * @param array $fields
     * @return mixed
     */
    public function getAll($limit = 100, $page = 1, $fields = ['*'])

    {
        $data = $this->getModel();
        return $data->select($fields)->paginate($limit);
    }
}
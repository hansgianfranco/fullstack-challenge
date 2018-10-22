<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmployeeController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @param EmployeeService $employeeService
     * @return Response
     */
    public function index(EmployeeService $employeeService, Request $request)
    {
        $data = $employeeService->getAll(10, $request->page);
        return $this->responseSuccess('', EmployeeResource::collection($data), [
            'current_page' => (integer)$data->currentPage(),
            'last_page' => (integer)$data->lastPage(),
            'items' => (integer)$data->items(),
            'total_items' => (integer)$data->total(),
            'has_more_pages' => (integer)$data->hasMorePages(),
            'from' => (integer)$data->firstItem(),
            'to' => (integer)$data->lastItem(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param EmployeeService $employeeService
     * @return Response
     */
    public function show($id, EmployeeService $employeeService)
    {
        return $this->responseSuccess('', new EmployeeResource($employeeService->find($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

    }

}

?>
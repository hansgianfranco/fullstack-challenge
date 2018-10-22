<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ReviewStoreRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Services\ReviewService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param ReviewService $reviewService
     * @param Request $request
     * @return Response
     */
    public function index(ReviewService $reviewService, Request $request)
    {
        $data = $reviewService->getAll(50, $request->page);
        return $this->responseSuccess('', ReviewResource::collection($data), [
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
     * @param ReviewStoreRequest $request
     * @param ReviewService $reviewService
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ReviewStoreRequest $request, ReviewService $reviewService)
    {
        $data = $request->only(['review_date', 'employee_id', 'productivity', 'knowledge', 'relationship', 'performance',
            'initiative']);
        $review = $reviewService->create($data);
        return $this->responseSuccess('');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param ReviewService $reviewService
     * @return Response
     */
    public function show($id, ReviewService $reviewService)
    {
        return $this->responseSuccess('', new ReviewResource($reviewService->find($id)));
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
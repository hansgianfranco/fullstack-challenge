<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Models\Employee;
use App\Models\Division;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller 
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:manager']);
    }

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
      $data['reviews'] = Review::paginate(10);
      return view('admin.review.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $data['employees'] = Employee::all();
      return view('admin.review.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      $validator = Validator::make($request->all(), [
          'review_date' => 'required|date',
          'employee_id' => 'required',
          'productivity' => 'required|numeric|min:1|max:5',
          'knowledge' => 'required|numeric|min:1|max:5',
          'relationship' => 'required|numeric|min:1|max:5',
          'initiative' => 'required|numeric|min:1|max:5',

      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      } else {
          $review = new Review();
          $review->review_date  = $request->review_date;
          $review->employee_id  = $request->employee_id;
          $review->productivity = $request->productivity;
          $review->knowledge = $request->knowledge;
          $review->relationship = $request->relationship;
          $review->initiative = $request->initiative;
          $review->performance = ($request->productivity + $request->knowledge +  $request->relationship + $request->initiative) / 4;
          $review->save();

          return redirect()->route('review.index');
      }
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      $data['review'] = Review::find($id);
      $data['employee'] = Employee::where('id', $data['review']->employee_id)->first();
      return view('admin.review.show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $data['review'] = Review::find($id);
      return view('admin.review.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id, Request $request)
  {
      $validator = Validator::make($request->all(), [
          'productivity' => 'required|numeric|min:1|max:5',
          'knowledge' => 'required|numeric|min:1|max:5',
          'relationship' => 'required|numeric|min:1|max:5',
          'initiative' => 'required|numeric|min:1|max:5',

      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      } else {
          $review = Review::find($id);
          $review->productivity = $request->productivity;
          $review->knowledge = $request->knowledge;
          $review->relationship = $request->relationship;
          $review->initiative = $request->initiative;
          $review->performance = ($request->productivity + $request->knowledge +  $request->relationship + $request->initiative) / 4;
          $review->save();

          return redirect()->route('review.index');
      }
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
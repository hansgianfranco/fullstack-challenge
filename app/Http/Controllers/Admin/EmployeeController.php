<?php 

namespace App\Http\Controllers\Admin;

use App\Models\Employee;
use App\Models\User;
use App\Models\Review;
use App\Models\Division;
use App\Models\Gender;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller 
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
    $data['employees'] = Employee::paginate(10);
    return view('admin.employee.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $data['divisions'] = Division::all();
      $data['genders'] = Gender::all();
      return view('admin.employee.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

      $validator = Validator::make($request->all(), [
          'username' => 'required',
          'email' => 'required|email',
          'password' => 'required',
          'name' => 'required',
          'gender' => 'required',
          'since' => 'required|date',
          'position' => 'required',
          'division' => 'required',

      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      } else {

          $role_employee = Role::where('name', 'employee')->first();

          $user = new User();
          $user->username = $request->username;
          $user->email = $request->email;
          $user->password = bcrypt($request->password);
          $user->save();
          $user->roles()->attach($role_employee);

          $employee = new Employee();
          $employee->user_id = $user->id;
          $employee->name = $request->name;
          $employee->gender_id = $request->gender;
          $employee->since = $request->since;
          $employee->position = $request->position;
          $employee->division_id = $request->division;
          $employee->save();

          return redirect()->route('employee.index');
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

      $data['employee'] = Employee::find($id);
      $data['reviews'] = Review::where('employee_id', $id)->get();
      return view('admin.employee.show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $data['divisions'] = Division::all();
      $data['genders'] = Gender::all();
      $data['employee'] = Employee::find($id);
      return view('admin.employee.edit', $data);
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
          'name' => 'required',
          'gender' => 'required',
          'since' => 'required|date',
          'position' => 'required',
          'division' => 'required',

      ]);

      if ($validator->fails()) {
          return back()->withErrors($validator)->withInput();
      } else {

          $employee = Employee::find($id);
          $employee->name = $request->name;
          $employee->gender_id = $request->gender;
          $employee->since = $request->since;
          $employee->position = $request->position;
          $employee->division_id = $request->division;
          $employee->save();

          return redirect()->route('employee.index');
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
      Employee::destroy($id);
      return redirect()->route('employee.index');
  }
  
}

?>
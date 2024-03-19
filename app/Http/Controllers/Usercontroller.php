<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Employee;
use App\Models\Manager;
use App\Models\Userdata;
use App\Models\Worker;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function updateAdminStatus(Request $request)
    {

        $userdata = Userdata::first();
        $userdata->status = $request->input('status') ? 0 : 1;
        $userdata->save();
        if ($userdata->save()) {
            $response['status'] = 1;
            $response['message'] = "Status Updated successfully!";
        } else {
            $response['message'] = "Something's wrong";
        }
        return response()->json($response);
    }

    public function save(Request $request)
    {

        
        $hid = $request->all()['hid'];
        if ($hid != "") {
            $updaterecord = $request->all();

            $updatedata = Userdata::findOrFail($hid);

            $dataToUpdate = [
                "firstname" => $updaterecord["firstname"],
                'lastname' => $updaterecord['lastname'],
                'email' => $updaterecord['email'],
                'password' => $updaterecord['password'],
                'confirm_password' => $updaterecord['confirm_password'],
                'gender' => $updaterecord['gender'],
                'role' => $updaterecord['role'],
                // 'role_type' => $updaterecord['role_type'],
                // 'admin_type' => $updaterecord['admin_type'],
                'joining_date' => $updaterecord['joining_date'],
                'status' => $updaterecord['status']
            ];

            
            if($dataToUpdate['role'] == "Admin"){
                $dataToUpdate['admin_type'] = $updaterecord['admin_type'];
                $dataToUpdate['role_type'] = "";
            }

            if($dataToUpdate['role'] == "Manager" || $dataToUpdate['role'] == "Employee" || $dataToUpdate['role'] == "Workers"){
                $dataToUpdate['role_type'] = $updaterecord['role_type'];
                $dataToUpdate['admin_type'] = "";
            }
            
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $extension = $request->file('image')->extension();
                $image = time() . "." . $extension;
                $path = public_path("/image");

                $request->file('image')->move($path, $image);
            } else {
                $image = "";
            }

            if (!empty($image)) {
                $dataToUpdate['image'] = $image;
            }
            
            $updatedata->update($dataToUpdate);            

            if ($updatedata) {
                $response['status'] = 1;
                $response['message'] = "Data Updated successfully!";
            } else {
                $response['message'] = "Something's wrong";
            }

        } else {
            $userdata = new Userdata();

            
            $userdata->firstname = $request->firstname;
            $userdata->lastname = $request->lastname;
            $userdata->email = $request->email;
            // $validatedData = $request->validate([
            //     'password' => 'required|min:3',
            //     'confirm_password' => 'required|same:password',
            // ]);

            if ($request->password !== $request->confirm_password) {
                $response['status'] = 0;
                $response['password_status'] = 1;
                $response['message'] = "Password and confirm password do not match!";
                return response()->json($response);
                exit;
            } else {
                if ($request->hasFile('image') && $request->file('image')->isValid()) {
                    $extension = $request->file('image')->extension();
                    $image = time() . "." . $extension;
                    $path = public_path("/image");

                    $request->file('image')->move($path, $image);
                } else {
                    $image = "";
                }

                $userdata->password = $request->password;
                $userdata->confirm_password = $request->confirm_password;
                $userdata->gender = $request->gender;
                $userdata->image = $image;
                $userdata->role = $request->role;

                if ($userdata->role === 'Admin') {
                    $userdata->admin_type = $request->admin_type;
                } else {
                    $userdata->admin_type = '';
                }

                if ($userdata->role === 'Manager' || $userdata->role === 'Employee' || $userdata->role === 'Workers') {
                    $userdata->role_type = $request->role_type;
                } else {
                    $userdata->role_type = '';
                }

                $userdata->joining_date = $request->joining_date;
                $userdata->status = $request->status;

                if ($userdata->save()) {
                    $response['status'] = 1;
                    $response['message'] = "Data added successfully!";
                } else {
                    $response['status'] = 0;
                    $response['message'] = "Something went wrong while saving data!";
                }
            }
        }
        return response()->json($response);
    }

    public function index()
    {
        $userData = Userdata::select('userdata.*', 'admin.admin', 'manager.manager', 'worker.worker', 'employee.employee')
            ->leftJoin('admin', function ($join) {
                $join->on('userdata.admin_type', '=', 'admin.id')
                    ->where('userdata.role', '=', 'Admin');
            })
            ->leftJoin('manager', function ($join) {
                $join->on('userdata.role_type', '=', 'manager.id')
                    ->where('userdata.role', '=', 'Manager');
            })
            ->leftJoin('worker', function ($join) {
                $join->on('userdata.role_type', '=', 'worker.id')
                    ->where('userdata.role', '=', 'Workers');
            })
            ->leftJoin('employee', function ($join) {
                $join->on('userdata.role_type', '=', 'employee.id')
                    ->where('userdata.role', '=', 'Employee');
            })
            ->get()->toArray();
        // ->leftJoin('employee as e', 'userdata.role_type', '=', 'e.id')
        // ->get()->toArray();

        // $managers = Manager::all();

        // foreach ($managers as $manager) {
        //     $managerNames[$manager->id] = $manager->manager;
        // }

        // $employees = Employee::all();

        // foreach ($employees as $employee) {
        //     $employeeNames[$employee->id] = $employee->employee;
        // }

        // $workers = Worker::all();

        // foreach ($workers as $worker) {
        //     $workerNames[$worker->id] = $worker->worker;
        // }

        // $admins = admin::all();

        // foreach ($admins as $admin) {
        //     $adminNames[$admin->id] = $admin->admin;
        // }

        //role_type  ($value->role === 'Manager' && isset($managerNames[$value->role_type])) ? $managerNames[$value->role_type] : (($value->role === 'Employee' && isset($employeeNames[$value->role_type])) ? $employeeNames[$value->role_type] : (($value->role === 'Workers' && isset($workerNames[$value->role_type])) ? $workerNames[$value->role_type] : ''));
        // admin_type   isset($adminNames[$value->admin_type]) ? $adminNames[$value->admin_type] : '';

        // $list = Userdata::all();

        $aaa = [];
        foreach ($userData as $value) {
            if($value['status'] != "-1"){
            $checked = ($value['status'] == '0') ? 'checked' : '';
            $row['id'] = $value['id'];
            $row['firstname'] = $value['firstname'];
            $row['lastname'] = $value['lastname'];
            $row['email'] = $value['email'];
            $row['password'] = $value['password'];
            $row['confirm_password'] = $value['confirm_password'];
            $row['gender'] = $value['gender'];
            $row['image'] = '<img src="' . asset('image/' . $value['image']) . '"  width="80px" height="80px">';
            $row['role'] = $value['role'];

            if ($value['role'] == "Manager") {
                $row['role_type'] = $value['manager'];
            } else if ($value['role'] == "Employee") {
                $row['role_type'] = $value['employee'];
            } else if ($value['role'] == "Workers") {
                $row['role_type'] = $value['worker'];
            } else {
                $row['role_type'] = "";
            }

            if ($value['role'] == "Admin") {
                $row['admin_type'] = $value['admin'];
                $row['role_type'] = "";
            } else {
                $row['admin_type'] = "";
            }

            $row['joining_date'] = $value['joining_date'];
            $row['status'] = "<div class='form-check form-switch'>
                    <input class='form-check-input' type='checkbox' id='statusCheckbox' value='$value[status]' $checked>
                    </div>";
            $row['action'] = "<button class='btn btn-info' id='edit_id' data-id=" . $value['id'] . ">Edit</button>
                    <button class='btn btn-danger' id='delete_id' data-id=" . $value['id'] . ">Delete</button>";
            array_push($aaa, $row);
            }
            
        }
        return response()->json(['data' => $aaa]);
    }

    public function getoptions(Request $request)
    {
        $roles = $request->all();

        $types = $roles['selectedRole'];

        $data = [];

        if ($types == "Admin") {
            $adminrecord = Userdata::where('admin_type', '3')->exists();

            if ($adminrecord) {
                $admins = admin::where('admin', '!=', 'Super admin')->get();
            } else {
                $admins = admin::all();
            }
            $data['admins'] = $admins;
        } else if ($types == "Manager") {
            $managers = Manager::all();
            $data['managers'] = $managers;
        } else if ($types == "Employee") {
            $employees = Employee::all();
            $data['employees'] = $employees;
        } else if ($types == "Workers") {
            $workers = Worker::all();
            $data['workers'] = $workers;
        }

        return response()->json($data);
    }

    public function get(Request $request)
    {
        $edit = $request->all();
        $id = $edit['id'];

        $Userdata = Userdata::find($id)->toArray();

        if ($Userdata['role'] == "Admin") {
            $Admin_data = admin::all()->toArray();
            $response['Admin_data'] = $Admin_data;
            $response['status'] = 0;
            $response['msg'] = "All Admin Got";
        } elseif ($Userdata['role'] == "Manager") {
            $Manager_data = Manager::all()->toArray();
            $response['Manager_data'] = $Manager_data;
            $response['status'] = 0;
            $response['msg'] = "All Manager Got";
        } elseif ($Userdata['role'] == "Employee") {
            $Employee_data = Employee::all()->toArray();
            $response['Employee_data'] = $Employee_data;
            $response['status'] = 0;
            $response['msg'] = "All Employee Got";
        } elseif ($Userdata['role'] == "Workers") {
            $Worker_data = Worker::all()->toArray();
            $response['Worker_data'] = $Worker_data;
            $response['status'] = 0;
            $response['msg'] = "All Worker Got";
        }

        $data = [$response, $Userdata];
        return response()->json([ 'response' => $response,'Userdata' => $Userdata ]);
    }

    public function delete(Request $request){
         // $hid = $request->all()['hid'];
    // $del = Userdata::where("id",$hid)->delete();

    $hid = $request->input('id');

    $userdata = Userdata::find($hid);

    if ($userdata) {
        $userdata->status = -1;
        $userdata->save();

        return response()->json(['message' => 'Soft delete successful']);
    } else {
        return response()->json(['message' => 'State not found'], 404);
    }
    }
}


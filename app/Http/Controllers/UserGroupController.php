<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\groups;
use PhpParser\Node\Expr\Print_;

class UserGroupController extends Controller
{
    public function index(){
        $users = users::all();
        return view('index',  compact('users'));
    }

    public function GroupsTable(){
        $groups = groups::all();
        return view('group.GroupTable',  compact('groups'));
    }

    public function GroupsAddForm(){
        return view('group.GroupsAddForm');
    }

    public function GroupsAdd(Request $request){
        $Gname = $request->group;
        $count = groups::where('Gname', $Gname)->count();

        if ($count == 1) {
            $data['status'] = false;
            $data['message'] = 'گروه با این مشخصات وجود دارد';
        }else
        {
            $Gsave = new groups;
            $Gsave->Gname = $request->group;
            $Gsave->save();

            $data['status'] = true;
            $data['message'] = 'گروه با موفقیت اضافه شد';
        }
        $data['url'] = 'group/GroupsAddForm';
        return view('error-success.index', $data);
    }

    public function GroupsDelete($Gname){
        $count = users::where('group_name', $Gname)->count();

        if ($count > 0) {
            $data['status'] = false;
            $data['message'] = 'این گروه شامل افراد هست,شما باید ابتدا افراد را از این گروه حذف کنید تا بتوانید گروه مورد نظر را حذف کنید';
        }else { 
            $deleted = groups::where('Gname', $Gname)->delete();
            $data['status'] = true;
            $data['message'] = 'گروه با موفقیت حذف شد';
        }
        $data['url'] = 'group/GroupsTable';
        return view('error-success.index', $data);
    }

    public function GroupsEditForm($id)
    {
        $Gselect = groups::find($id);
        $data['Gname'] =$Gselect['Gname']; 
        $data['id'] =$id; 
        return view('group.GroupsEditForm', $data);
    }

    public function GroupsEdit(Request $request){
        $Gname = $request->Gname;
        $Gid = $request->id;
        $count = groups::where('Gname', $Gname)->count();

        if ($count == 1) {

            $Gfind = groups::find($Gid);
            if ($Gname == $Gfind['Gname']) 
            {
                $data['status'] = true;
                $data['message'] = 'Group Edited Successfully...';
                $data['url'] = 'group/GroupsTable';
            }
            else 
            {
                $data['status'] = false;
                $data['message'] = 'Group Already Exists...';
                $data['url'] = 'group/GroupsEditForm/'.$Gid;
            }
        }
        else
        {
            groups::where('id',$Gid)->update(['Gname'=>$Gname]);

            $data['status'] = true;
            $data['message'] = 'Group Edited Successfully...';
            $data['url'] = 'group/GroupsTable';
        }
        // $data['Gname'] =$flight['Gname']; 
        
        return view('error-success.index', $data);    
    }

    public function Userform()
    {
        $users = users::all();
        $groups = groups::all();
        
        return view('user.Userform', compact('users', 'groups'));
    }

    public function AddUserform(Request $request)
    {
        $MeliCode = $request->MelliCode;
        $countMeliCode = users::where('MeliCode', $MeliCode)->count();

        if ($countMeliCode != 0) {
            $data['status'] = false;
            $data['message'] = 'User With This MeliCode Already Exist...';
            $data['url'] = 'user/Userform';
        }
        else{
            $Usave = new users;

            $Usave->Fname = $request->FirstName;
            $Usave->Lname = $request->LastName;
            $Usave->MeliCode = $request->MelliCode;
            $Usave->Address = $request->Address;
            $Usave->PostalCode = $request->PostalCode;
            $Usave->Gender = $request->gender;
            $Usave->group_name = $request->group;

            $Usave->save();

            $data['status'] = true;
            $data['message'] = 'User Created Successfully...';
            $data['url'] = '';
        }
        return view('error-success.index', $data);
    }

    public function UserDelete($id)
    {
        echo $id;
        $deleted = users::where('id', $id)->delete();

        $data['status'] = true;
        $data['message'] = 'User Deleted Successfully...';
        $data['url'] = '';

        return view('error-success.index', $data);
    }

    public function UserEditForm($id)
    {
        $user = users::find($id);
        $groups = groups::all();
        $gender = ['مرد', 'زن'];

        return view('user.UserEditForm', compact('user', 'groups', 'gender'));
    }

    public function UserEdit(Request $request)
    {
        $MelliCount = users::where('MeliCode', $request->MelliCode)->count();

        if ($MelliCount == 1) {
            $Uselect = users::where('id', $request->id)->where('MeliCode', $request->MelliCode)->get();
            if (count($Uselect) == 1) 
            {
                $Usave = new users;
                $Usave = users::find($request->id);

                $Usave->Fname = $request->FirstName;
                $Usave->Lname = $request->LastName;
                $Usave->MeliCode = $request->MelliCode;
                $Usave->Address = $request->Address;
                $Usave->PostalCode = $request->PostalCode;
                $Usave->Gender = $request->gender;
                $Usave->group_name = $request->group;
    
                $Usave->save();
                $data['status']= true;
                $data['message'] = 'User Edited Successfully...';
                $data['url'] = '';
            }
            else 
            {
                $data['status'] = false;
                $data['message'] = 'User With This MeliCode Already Exist...';
                $data['url'] = 'user/UserEditForm/'.$request->id;
            }
        }
        elseif($MelliCount == 0)
        {               
            $Usave = new users;
            $Usave = users::find($request->id);

            $Usave->Fname = $request->FirstName;
            $Usave->Lname = $request->LastName;
            $Usave->MeliCode = $request->MelliCode;
            $Usave->Address = $request->Address;
            $Usave->PostalCode = $request->PostalCode;
            $Usave->Gender = $request->gender;
            $Usave->group_name = $request->group;

            $Usave->save();
            $data['status']= true;
            $data['message'] = 'User Edited Successfully...';
            $data['url'] = '';
        }
        return view('error-success.index', $data);
    }
}

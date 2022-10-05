<?php
namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

use App\Models\Admin;
use App\Models\AdminPermission;

class AdminController extends Controller
{


    public function index()
    {
         if(!permission_group_checker(Auth::guard('admin')->user()->id, 'الادارة')) {return  redirect('admin/not_authorized');}
        $admins = Admin::get();
        return view('admin.pages.admins.index')->with(['admins'=>$admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function not_authorized ()
    {
        return view('admin.not_authorized');
    }
    public function create()
    {
         if(!permission_checker(Auth::guard('admin')->user()->id, 'add_admin'))  {return  redirect('admin/not_authorized');}
        return view('admin.pages.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(!permission_checker(Auth::guard('admin')->user()->id, 'add_admin'))  {return  redirect('admin/not_authorized');}
        $validatedData = $request->validate([
            'name' => 'required',
            'user_name' => 'required|unique:admins,user_name,NULL,id,deleted_at,NULL',
            'email' => 'nullable|email|unique:admins,email,NULL,id,deleted_at,NULL' ,
            'password' => 'required|confirmed',
        ],
        [
            'name.required'=>'من فضلك ادخل الاسم',
            'user_name.required'=>'من فضلك ادخل اسم المستخدم',
            'user_name.unique'=>'اسم المستخدم مسجل في حساب اخر',
            'email.unique'=>'البريد الالكتروني مسجل في حساب اخر',
            'email.email'=>'من فضلك ادخل بريد الكتروني صحيح ',
            'password.required'=>'من فضلك ادخل كلمة المرور',
            'password.confirmed'=>'قم بتأكيد كلمة المرور',
        ]);
        $admin = new Admin;
        $admin->name  = $request->name;
        $admin->user_name  = $request->user_name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->added_by = Auth::guard('admin')->user()->id;
        $admin->password = bcrypt($request->password);
        /*
        if($request->hasFile('image'))
        {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/admins');
            $image->move($destinationPath, $imageName);
            $admin->image ='/uploads/admins/'.$imageName;
        }
        */
        $admin->save();
        if($request->permission)
        {
            for($i = 0; $i < count($request->permission); $i++)
            {
                $adp = new AdminPermission;
                $adp->admin = $admin->id;
                $adp->permission = $request->permission[$i];
                $adp->save();
            }
        }
        return redirect()->route('admins.index');
    }

    public function edit($id)
    {
         if(!permission_checker(Auth::guard('admin')->user()->id, 'edit_admin'))  {return  redirect('admin/not_authorized');}
        $admin = Admin::findorfail($id);
        return view('admin.pages.admins.edit')->with(['admin'=>$admin]);
    }

    public function profile()
    {
        $admin = Admin::findorfail(Auth::guard('admin')->user()->id);
        return view('admin.pages.admins.profile')->with(['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         if(!permission_checker(Auth::guard('admin')->user()->id, 'edit_admin'))  {return  redirect('admin/not_authorized');}
        $admin = Admin::findorfail($id);
        $validatedData = $request->validate([
            'name' => 'required',
        ],
        [
            'name.required'=>'من فضلك ادخل الاسم',
        ]);

        if($admin->user_name != $request->user_name)
        {
            $validatedData = $request->validate([
                'user_name' => 'required|unique:admins,user_name,'.$id.',id,deleted_at,NULL',
            ],
            [
                'user_name.required'=>'من فضلك ادخل اسم المستخدم',
                'user_name.unique'=>'اسم المستخدم مسجل في حساب اخر',
            ]);
        }
        if($admin->email != $request->email && $request->email != '')
        {
            $validatedData = $request->validate([
                'email' => 'required|email|unique:admins,email,'.$id.',id,deleted_at,NULL',
            ],
            [
                'email.required'=>'من فضلك ادخل بريد الكتروني صحيح',
                'email.unique'=>'البريد الالكتروني مسجل في حساب اخر',
                'email.email'=>'من فضلك ادخل بريد الكتروني صحيح ',
            ]);
        }


        $admin->name  = $request->name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->user_name = $request->user_name;
        // $admin->updated_by = Auth::guard('admin')->user()->id;
       $old_per = AdminPermission::where('admin',$admin->id)->get();
        foreach($old_per as $aa)
        {
            $aa->delete();
        }
         if($request->permission)
        {
            for($i = 0; $i < count($request->permission); $i++)
            {
                $adp = new AdminPermission;
                $adp->admin = $admin->id;
                $adp->permission = $request->permission[$i];
                $adp->save();
            }

        }
        $admin->save();
        return redirect()->route('admins.index');
    }

    public function save_profile(Request $request)
    {
        $admin = Admin::findorfail(Auth::guard('admin')->user()->id);
        $validatedData = $request->validate([
            'name' => 'required',
        ],
        [
            'name.required'=>'من فضلك ادخل الاسم',
        ]);

        if($admin->user_name != $request->user_name)
        {
            $validatedData = $request->validate([
                'user_name' => 'required|unique:admins,user_name,'.$id.',id,deleted_at,NULL',
            ],
            [
                'user_name.required'=>'من فضلك ادخل اسم المستخدم',
                'user_name.unique'=>'اسم المستخدم مسجل في حساب اخر',
            ]);
        }
        if($admin->email != $request->email && $request->email != '')
        {
            $validatedData = $request->validate([
                'email' => 'required|email|unique:admins,email,'.$id.',id,deleted_at,NULL',
            ],
            [
                'email.required'=>'من فضلك ادخل بريد الكتروني صحيح',
                'email.unique'=>'البريد الالكتروني مسجل في حساب اخر',
                'email.email'=>'من فضلك ادخل بريد الكتروني صحيح ',
            ]);
        }


        $admin->name  = $request->name;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->user_name = $request->user_name;
        // $admin->updated_by = Auth::guard('admin')->user()->id;


        $admin->save();
        return redirect('/admin');
    }


    public function change_password($id)
    {
         if(!permission_checker(Auth::guard('admin')->user()->id, 'change_admin_password'))  {return  redirect('admin/not_authorized');}
        $admin = Admin::findorfail($id);
        return view('admin.pages.admins.change_password')->with(['admin'=>$admin]);
    }

    public function change_profile_password ()
    {
        $admin = Admin::findorfail(Auth::guard('admin')->user()->id);
        return view('admin.pages.admins.change_mpassword')->with(['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_save(Request $request, $id)
    {
         if(!permission_checker(Auth::guard('admin')->user()->id, 'change_admin_password'))  {return  redirect('admin/not_authorized');}
        $admin = Admin::findorfail($id);
        $validatedData = $request->validate([
            'password' => 'required|confirmed',
        ],
        [
            'password.required'=>'من فضلك ادخل كلمة المرور',
            'password.confirmed'=>'قم بتأكيد كلمة المرور',
        ]);
        $admin->password = bcrypt($request->password);
        // $admin->updated_by = Auth::guard('admin')->user()->id;
        $admin->save();
        return redirect()->route('admins.index');
    }
    public function save_profile_password(Request $request)
    {
        $admin = Admin::findorfail(Auth::guard('admin')->user()->id);
        $validatedData = $request->validate([
            'password' => 'required|confirmed',
        ],
        [
            'password.required'=>'من فضلك ادخل كلمة المرور',
            'password.confirmed'=>'قم بتأكيد كلمة المرور',
        ]);
        $admin->password = bcrypt($request->password);
        // $admin->updated_by = Auth::guard('admin')->user()->id;
        $admin->save();
        return redirect('/admin');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
         if(!permission_checker(Auth::guard('admin')->user()->id, 'delete_admin'))  {return  redirect('admin/not_authorized');}
        $admin = Admin::findorfail($id);
       $admin->deleted_by = Auth::guard('admin')->user()->id;
        $admin->save();
        $admin->delete();
        return redirect()->route('admins.index');
    }
}

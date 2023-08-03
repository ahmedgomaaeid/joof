<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admin.index', compact('admins'));
    }
    public function create()
    {
        return view('admin.admin.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:8',
        ]);
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request['password']),
        ]);
        return redirect()->route('admin.index')->with('success', 'تم اضافة المشرف بنجاح');
    }
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'تم حذف المشرف بنجاح');
    }
}

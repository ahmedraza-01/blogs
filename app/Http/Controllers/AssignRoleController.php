<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AssignRoleController extends Controller
{
    public function assignAdminRole($userId)
    {
        $user = User::find($userId);
        $user->assignRole('admin');
        return 'Role assigned successfully';
    }
}

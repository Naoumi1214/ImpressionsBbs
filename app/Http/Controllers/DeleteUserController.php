<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DeleteUserController extends Controller
{
    //
    public function deleteUser(Request $request)
    {
        # code...
        $user = Auth::user();
        $user->userDelete();
        return redirect('/');
    }
}

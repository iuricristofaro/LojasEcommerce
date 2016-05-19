<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\User;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    private $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    
    public function index()
    {
        $users = $this->userModel->paginate(10);

        return view('users.index', compact('users'));
    }

    
    public function create()
    {
        return view('users.create');
    }

    
    public function store(Request $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = $this->userModel->fill($input);
        $user->save();

        return redirect()->route('admin.users.index');
    }

    public function show($id)
    {
        $user = $this->userModel->find($id);

        return view('users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        return view('users.edit', compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        $input = $request->all();

        if ($input['password'] == null) {
            $this->userModel->findOrNew($id)->update($input['name'],$input['email']);
        }else{
            $input['password'] = Hash::make($input['password']);
            $this->userModel->findOrNew($id)->update($input);
        }

        return redirect()->route('admin.users.index');
    }

    
    public function destroy($id)
    {
        $this->userModel->findOrNew($id)->delete();
        return redirect()->route('admin.users.index');
    }
}

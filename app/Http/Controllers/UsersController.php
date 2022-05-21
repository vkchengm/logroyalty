<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Licensee;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with('roles')->get();

        return view('users.index', compact('users'));
    }

    public function indexinternal()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('users.index-internal');

    }

    public function indexexternal()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::where('is_activated', '0')->where('type','external')->get();

        // dd($users);
        return view('users.index-external', compact('users'));

        // return view('users.index-external');

    }

    public function index2()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $users = User::all();
        // return view('user', compact('users'));

        $users = User::with('roles')->get();

        return view('users.index2', compact('users'));
    }

    public function create()
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::where('title', '!=', 'Applicant')
                ->orderBy('title')
                ->pluck('title', 'id')
                ->prepend(trans('global.pleaseSelect'), '');
        return view('users.create', compact('roles'));
    }

    public function store(StoreUserRequest $request)
    {
        
        $user = User::create($request->validated());
        $user->password = bcrypt(request('password'));
        $user->type = 'internal';
        $user->is_activated = 1;
        $user->email_verified_at = Carbon::now();
        $user -> save();
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index-internal');
    }

    public function show(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id')
                    ->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles');

        return view('users.edit', compact('user', 'roles'));
    }

    public function editinternal(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::pluck('title', 'id')
                    ->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles');

        return view('users.edit-internal', compact('user', 'roles'));
    }

    public function editexternal(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $roles = Role::where('title', 'Applicant')
                    ->pluck('title', 'id')
                    ->prepend(trans('global.pleaseSelect'), '');

        $licensees = Licensee::pluck('name', 'id')
                    ->prepend(trans('global.pleaseSelect'), '');

        $user->load('roles');

        return view('users.edit-external', compact('user', 'roles', 'licensees'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));
        // dd('testing2');

        return redirect()->route('users.index');
    }

    public function updateinternal(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));
        // dd('testing0');

        return redirect()->route('users.index-internal');
    }

    public function updateexternal(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
        $user->roles()->sync($request->input('roles', []));
        // dd('testing');
        return redirect()->route('users.index-external');
    }

    public function destroy(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        dd('test');

        $user->delete();

        return redirect()->route('users.index');

        // if ($type == 'external')
        // {
        //     return redirect()->route('users.index-external');
        // } 
        // else 
        // {
        //     return redirect()->route('users.index');
        // }
    }

    public function destroyexternal(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();
        return redirect()->route('users.index-external');
    }

    public function destroyinternal(User $user)
    {
        abort_if(Gate::denies('admin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user->delete();
        return redirect()->route('users.index-internal');
    }

    public function getFos(Request $request){
        $search = $request->search;
  
        if($search == ''){
           $fos = User::whereHas('roles', function (Builder $query) {
                    $query->where('title', 'like', 'FO');
                    })->orderby('name','asc')->select('id','name')->get();
        }else{
           $fos = User::whereHas('roles', function (Builder $query) {
                    $query->where('title', 'like', 'FO');
                    })->orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($fos as $fo){
           $response[] = array(
                "id"=>$fo->id,
                "text"=>$fo->name
           );
        }
        return response()->json($response); 
    } 

    //  $fos = User::whereHas('roles', function (Builder $query) {
    //     $query->where('title', 'like', 'FO');
    // })->pluck('name', 'id')
    // ->prepend(trans('global.pleaseSelect'), '');

}

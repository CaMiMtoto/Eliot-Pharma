<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Notifications\UserCreated;
use App\Services\RoleService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Throwable;
use Yajra\DataTables\Exceptions\Exception;

class UsersController extends Controller
{
    private RoleService $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function index(RoleService $roleService)
    {
        if (\request()->ajax()) {
            return datatables()->of(User::select('*'))
                ->addColumn('action', function (User $user) {
                    // delete button
                    $deleteBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $user->id . '" data-original-title="Delete" class="dropdown-item js-delete">Delete</a>';
                    // edit button
                    $editBtn = '<a href="' . route("admin.system.users.show", $user->id) . '" data-toggle="tooltip"  data-id="' . $user->id . '" data-original-title="Edit" class="dropdown-item js-edit">Edit</a>';
                    // roles button
                    $rolesBtn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $user->id . '" data-original-title="Roles" class="dropdown-item rolesUser">Roles</a>';
                    return "<div class='drop-down dropdown-action'>
                                <a href='#' class='dropdown-toggle btn-light btn-sm border btn' data-bs-toggle='dropdown' aria-expanded='false'>
                                   Options
                                </a>
                                <ul class='dropdown-menu dropdown-menu-right'>
                                    <li>$editBtn</li>
                                    <li>$deleteBtn</li>
                                </ul>
                            </div>";

                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }
        $roles = $this->roleService->getAllRoles();
        return view('admin.users.list', [
            'roles' => $roles,
        ]);
    }

    /**
     * @throws Throwable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email',
                Rule::unique('users')->ignore($request->id),
            ],
            'roles' => ['required', 'array'],
            'roles.*' => ['required', 'integer', 'exists:roles,id'],
            'phone' => ['required', 'string', 'max:255'],
        ]);

        $id = $request->input('id');
        DB::beginTransaction();
        $random = Str::random(5);
        $user = User::updateOrCreate(['id' => $id], [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone_number' => $request->input('phone'),
            'password' => Hash::make($random)
        ]);

        $user->roles()->sync($request->input('roles'));

        DB::commit();
        if (!$id || $id == 0) {
            $user->notify(new UserCreated($user, $random));
        }

        return response()->json([
            'message' => 'User saved successfully',
            'user' => $user,
        ]);
    }

    public function toggleActive(User $user)
    {
        $user->is_active = !$user->is_active;
        $user->save();
        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user,
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }

    public function show(User $user)
    {
        return $user->load('roles');
    }


}

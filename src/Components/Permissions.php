<?php

namespace Paksuco\Permission\Components;

use Livewire\Component;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Spatie\Permission\Models\Role as SpatieRole;

class Permissions extends Component
{
    public $roleName;
    public $permissionName;
    public $useActions;
    public $actions;
    public $updated;

    protected $listeners = ['deleteRole', 'togglePermission', 'updateRole', 'updatePermission', 'deletePermission'];

    public function mount()
    {
        $this->useActions = config("permission-ui.use_common_actions", false);
        $this->actions = config("permission-ui.actions", []);
        if (count($this->actions) === 0) {
            $this->useActions = false;
        }
        $updated = false;
    }

    public function saveNewRole()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate([
            'roleName' => "required|min:3|unique:" . config("permission.table_names.roles") . ",name,NULL,id",
        ], [], [
            'roleName' => 'role name',
        ]);

        SpatieRole::create(["name" => $this->roleName]);

        $this->roleName = "";
    }

    public function saveNewPermission()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $firstAction = $this->useActions ? collect($this->actions)->keys()->first() : "";
        $this->permissionNameSuffixed = $this->useActions ? $this->permissionName . "-" . $firstAction : $this->permissionName;

        $this->validate([
            'permissionName' => "required|min:3",
            'permissionNameSuffixed' => "unique:" . config("permission.table_names.permissions") . ",name,NULL,id",
        ], [], [
            'permissionName' => 'permission name',
            'permissionNameSuffixed' => 'permission name',
        ]);

        if ($this->useActions) {
            foreach (array_keys($this->actions) as $key) {
                SpatiePermission::create(["name" => $this->permissionName . "-" . $key]);
            }
        } else {
            SpatiePermission::create(["name" => $this->permissionName]);
        }

        $this->permissionName = "";
    }

    public function togglePermission($roleId, $permissionId)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $role = SpatieRole::findOrFail($roleId);
        $permission = SpatiePermission::findOrFail($permissionId);

        if ($role->hasPermissionTo($permission->name)) {
            $role->revokePermissionTo($permission->name);
        } else {
            $role->givePermissionTo($permission->name);
        }
    }

    public function updatePermission()
    {
        $this->updated = !$this->updated;
    }

    public function updateRole()
    {
        $this->updated = !$this->updated;
    }

    public function deleteRole($roleId)
    {
        $role = SpatieRole::find($roleId);
        $role->delete();
    }

    public function deletePermission($permissionName)
    {
        if ($this->useActions) {
            $actions = array_keys($this->actions);
            foreach ($actions as $action) {
                $perm = SpatiePermission::where("name", "=", $permissionName . "-" . $action)->first();
                if ($perm instanceof SpatiePermission) {
                    $perm->delete();
                }
            }
        } else {
            $perm = SpatiePermission::where("name", "=", $permissionName)->first();
            if ($perm instanceof SpatiePermission) {
                $perm->delete();
            }
        }
    }

    public function render()
    {
        $roles = SpatieRole::with("permissions")->get();
        $firstAction = collect($this->actions)->keys()->first();
        $permissions = SpatiePermission::all();

        $permissionGroups = SpatiePermission::where('name', 'like', '%-' . $firstAction)->get()
            ->transform(function ($permission) use ($firstAction) {
                return substr($permission->name, 0, strlen($permission->name) - strlen($firstAction) - 1);
            });

        return view("permission-ui::components.table", [
            "roles" => $roles,
            "permissions" => $permissions,
            "permissionGroups" => $permissionGroups,
        ]);
    }
}

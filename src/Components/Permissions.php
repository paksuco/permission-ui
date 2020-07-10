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
    public $separator;
    public $updated;

    protected $listeners = ['refreshMappings', 'togglePermission'];

    public function mount()
    {
        $this->useActions = config("permission-ui.use_common_actions", false);
        $this->actions = config("permission-ui.actions", []);
        $this->separator = config("permission-ui.permission_action_separator", "-");
        if (count($this->actions) === 0) {
            $this->useActions = false;
        }
        $this->updated = false;
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
        $this->permissionNameSuffixed = $this->useActions ? $this->permissionName . $this->separator . $firstAction : $this->permissionName;

        $this->validate([
            'permissionName' => "required|min:3",
            'permissionNameSuffixed' => "unique:" . config("permission.table_names.permissions") . ",name,NULL,id",
        ], [], [
            'permissionName' => 'permission name',
            'permissionNameSuffixed' => 'permission name',
        ]);

        if ($this->useActions) {
            foreach (array_keys($this->actions) as $key) {
                SpatiePermission::create(["name" => $this->permissionName . $this->separator . $key]);
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

    public function refreshMappings()
    {
        $this->updated = !$this->updated;
        $this->dispatchBrowserEvent("refresh-mappings", null);
    }

    public function render()
    {
        $roles = SpatieRole::with("permissions")->get();
        $firstAction = collect($this->actions)->keys()->first();
        $permissions = SpatiePermission::all();
        $permissionGroups = collect();

        if ($this->useActions) {
            $permissionGroups = SpatiePermission::where('name', 'like', '%' . $this->separator . $firstAction)->get()
                ->transform(function ($permission) use ($firstAction) {
                    return substr($permission->name, 0, strlen($permission->name) - strlen($firstAction) - 1);
                });
        }

        return view("permission-ui::components.table", [
            "roles" => $roles,
            "permissions" => $permissions,
            "permissionGroups" => $permissionGroups,
        ]);
    }
}

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
    public $role;
    public $searchKeyword;

    protected $listeners = ['refreshMappings', 'togglePermission', 'setActiveRole', 'deleteRole'];

    public function mount()
    {
        $this->useActions = config("permission-ui.use_common_actions", false);
        $this->actions = config("permission-ui.actions", []);
        $this->separator = config("permission-ui.permission_action_separator", "-");
        if (count($this->actions) === 0) {
            $this->useActions = false;
        }
        $this->updated = false;
        $this->role = SpatieRole::first()->id;
        $this->searchKeyword = null;
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

        $this->refreshMappings();
    }

    public function setActiveRole($id)
    {
        $this->role = $id;
    }

    public function searchRoles()
    {
        $this->render();
    }

    public function deleteRole($id)
    {
        SpatieRole::where("id", $id)->first()->delete();
        $this->render();
    }

    public function refreshMappings()
    {
        $this->updated = !$this->updated;
        $this->dispatchBrowserEvent("refresh-mappings");
        $this->emit("refreshButton");
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

        if ($this->searchKeyword) {
            $roles = SpatieRole::where("name", 'like', '%'.$this->searchKeyword.'%')->with("permissions")->get();
        }

        return view("permission-ui::components.theme-".config('permission-ui.theme').".table", [
            "roles" => $roles,
            "permissions" => $permissions,
            "permissionGroups" => $permissionGroups,
        ]);
    }
}

<div class="flex flex-col flex-1">
    <style>
        .paksuco-permissions i {
            width: 100%;
            min-width: 34px;
        }
    </style>
    <div class="flex flex-1">
        <div class="lg:w-1/4 xl:w-1/5 p-2 border border-r-0">
            <div class="w-full items-end">
                <h2 class="text-2xl font-semibold p-4">Role Management</h2>
            </div>
            <div class="flex flex-col min-h-0">
                @include("permission-ui::components.theme-column.partials.role-list")
                @include("permission-ui::components.theme-column.partials.new-role")
            </div>
        </div>
        <div class="lg:w-3/4 xl:w-4/5 border-l border-t">
            @if($role)
                @include("permission-ui::components.theme-column.partials.mappings", ["role" => $role, "updated" => $updated])
                @include("permission-ui::components.theme-column.partials.new-permission")
            @else
                <div class="p-4">
                    @lang("Select a role from the left to begin with.")
                </div>
            @endif
        </div>
    </div>
</div>

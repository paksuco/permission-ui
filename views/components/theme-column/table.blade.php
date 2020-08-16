<div class="flex flex-wrap">
    <style>
        .paksuco-permissions i {
            width: 100%;
            min-width: 34px;
        }
    </style>
    <div class="w-full sm:w-1/2 items-end">
        <h2 class="text-2xl font-semibold p-4">Role Management</h2>
    </div>
    <div class="w-full sm:w-1/2 mt-3 sm:mt-0 sm:text-right">
        &nbsp;
    </div>
    <div class="w-1/4 p-2 border border-r-0">
        @include("permission-ui::components.theme-column.partials.role-list")
        @include("permission-ui::components.theme-column.partials.new-role")
    </div>
    <div class="w-3/4 border">
        @include("permission-ui::components.theme-column.partials.mappings", ["role" => $role])
        @include("permission-ui::components.theme-column.partials.new-permission")
    </div>
</div>

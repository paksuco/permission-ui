<div class="p-4">
    <style>
        .paksuco-permissions i {
            width: 100%;
            min-width: 34px;
        }
    </style>

    <div class="sm:w-1/2 items-end flex">
        <h2 class="text-2xl font-semibold">Role Management</h2>
    </div>
    <div class="sm:w-1/2 mt-3 sm:mt-0 sm:text-right">
        &nbsp;
    </div>

    {{-- You can include these forms into a modal --}}
    @include("permission-ui::components.partials.new-role")
    @include("permission-ui::components.partials.new-permission")
    {{-- The roles/permissions matrix table --}}
    @include("permission-ui::components.partials.mappings")
</div>

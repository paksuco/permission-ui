<div class="p-4">
    <style>
        .paksuco-permissions i {
            width: 100%;
            min-width: 34px;
        }
    </style>

    <div class="flex items-end sm:w-1/2">
        <h2 class="text-2xl font-semibold">@lang('Role Management')</h2>
    </div>
    <div class="mt-3 sm:w-1/2 sm:mt-0 sm:text-right">
        &nbsp;
    </div>

    {{-- You can include these forms into a modal --}}
    @include("permission-ui::components.theme-grid.partials.new-role")
    @include("permission-ui::components.theme-grid.partials.new-permission")
    {{-- The roles/permissions matrix table --}}
    @include("permission-ui::components.theme-grid.partials.mappings")
</div>

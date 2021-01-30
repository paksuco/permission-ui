<div class="flex flex-col flex-1">
    <div class="flex flex-wrap flex-1">
        <div class="flex-shrink-0 w-full p-4 border-t lg:w-60">
            <div class="flex flex-col min-h-0">
                <h3 class="pb-2 text-base font-semibold">@lang("Search")</h3>
                @include("permission-ui::components.theme-column.partials.search")
                <h3 class="pb-2 text-base font-semibold">@lang("Roles")</h3>
                @include("permission-ui::components.theme-column.partials.role-list")
                <h3 class="pb-2 text-base font-semibold">@lang("Add new Role")</h3>
                @include("permission-ui::components.theme-column.partials.new-role")
            </div>
        </div>
        <div class="flex-1 p-8 bg-white border-t shadow-xl">
            <div class="items-end w-full pb-8">
                <h2 class="mb-3 text-3xl font-semibold" style="line-height: 1em">@lang("Role Management")</h2>
                <p class="mb-4 text-sm font-light leading-5 text-gray-600">@lang("This page contains the available permissions and user roles. You can create a new role, assign a permission to a role, and use that role to limit an user^s authorized actions.")</p>
            </div>
            @if($role)
                @include("permission-ui::components.theme-column.partials.mappings", [
                    "role" => $role,
                    "updated" => $updated
                ])
                @include("permission-ui::components.theme-column.partials.new-permission")
            @else
                <div class="p-4">
                    @lang("Select a role from the left to begin with.")
                </div>
            @endif
        </div>
    </div>
</div>

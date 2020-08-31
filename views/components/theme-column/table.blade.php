<div class="flex flex-col flex-1">
    <div class="flex flex-1 flex-wrap">
        <div class="w-full lg:w-1/4 p-8 border-t">
            <div class="flex flex-col min-h-0">
                <h3 class="text-base font-semibold pb-2">@lang("Search")</h3>
                @include("permission-ui::components.theme-column.partials.search")
                <h3 class="text-base font-semibold pb-2">@lang("Roles")</h3>
                @include("permission-ui::components.theme-column.partials.role-list")
                <h3 class="text-base font-semibold pb-2">@lang("Add new Role")</h3>
                @include("permission-ui::components.theme-column.partials.new-role")
            </div>
        </div>
        <div class="w-full lg:w-3/4 border-t p-8 shadow-xl bg-white">
            <div class="w-full items-end pb-8">
                <h2 class="text-3xl font-semibold mb-3" style="line-height: 1em">@lang("Role Management")</h2>
                <p class="text-gray-600 font-light leading-5 mb-4 text-sm">Lorem ipsum dolor sit amet, consectetur
                    adipiscing elit. Proin interdum urna sit amet lorem iaculis, aliquet suscipit sapien venenatis.
                    Sed congue vitae velit vitae varius. Mauris egestas consequat mauris sit amet mollis. Proin porta
                    tortor in urna tincidunt vehicula. Integer urna nulla, porttitor ac imperdiet eu, mattis vel lacus.
                    Sed et porttitor ex. Morbi pellentesque massa a velit gravida, vitae rutrum tortor consequat. Donec
                    interdum lacus ut sem consectetur elementum. Proin pellentesque maximus sem sed rhoncus. Cras eget
                    neque a nisi posuere mollis vitae vitae magna. Praesent non volutpat sem, a maximus libero. </p>
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

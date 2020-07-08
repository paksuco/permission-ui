<style>
    * {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        -webkit-text-stroke: 0.25px;
    }
</style>
<div class="text-gray-900">
    {{-- You can include these forms into a modal --}}
    @include("permission-ui::components.partials.new-role")
    @include("permission-ui::components.partials.new-permission")
    {{-- The roles/permissions matrix table --}}
    @include("permission-ui::components.partials.mappings")
</div>

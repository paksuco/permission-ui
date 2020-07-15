<div class="container">
    <style>
        .paksuco-permissions i {
            width: 100%;
            min-width: 34px;
        }
        [x-cloak] {
            display: none;
        }
    </style>
    {{-- You can include these forms into a modal --}}
    @include("permission-ui::components.partials.new-role")
    @include("permission-ui::components.partials.new-permission")
    {{-- The roles/permissions matrix table --}}
    @include("permission-ui::components.partials.mappings")
</div>

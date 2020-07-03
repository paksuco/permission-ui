<?php

return [
    /**
     * This setting defines the prefix for the package routes.
     *
     * for example if your admin page lives at /admin, the package route for
     * permission-ui roles page will be '/admin/roles', or the admin page is set to '/management',
     * you should change this to 'management' to set role management routing to 'management/roles'
     */
    'admin_route_prefix' => "admin",

    /**
     * Your admin template layout to extend
     */
    'template_to_extend' => "layouts.app",

    /**
     * Prevent some roles and permissions from modification and/or deletion,
     * if your application won't live without them, please set them here
     */
    'permanent_roles' => [/* 'admin'*/],
    'permanent_permissions' => [/* 'enter_admin_area' */],
];

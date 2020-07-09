<?php

return [
    /**
     * This setting defines the prefix for the package routes.
     *
     * For example if your admin page lives at /admin, the package route for
     * permission-ui roles page will be '/admin/roles', or the admin page is
     * set to '/management', you should change this to 'management' to set role
     * management routing to 'management/roles'
     */
    'admin_route_prefix' => "admin",

    /**
     * Guards for the page
     */
    'middleware' => ["web", "auth"],

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

    /**
     * If you want to build a CRUD like permission groups, you can set this to true
     * and modify the actions for your needs. But to make it work without problems,
     * you need a clean permission and roles table.
     */
    'use_common_actions' => true,

    'actions' => [
        'create' => 'fas fa-plus-circle',
        'read' => 'fas fa-eye',
        'update' => 'fas fa-pencil-alt',
        'delete' => 'fas fa-trash-alt',
    ],

    /**
     * Separator between permissions and actions, for example when permission is "posts" and action is "create",
     * The concatenated output will be "posts_create" when separator is a "_" character, and "posts-create" when the
     * separator is a "-" character.
     */
    'permission_action_separator' => '-',
];

<?php

return [

    /**
     * Path to the directory where index.yaml openapi file located
     */
    'apidoc_dir' => public_path('api-docs/v1'),

    /**
     * Dir template where client package will be generated
     */
    'output_dir_template' => base_path('..' . DIRECTORY_SEPARATOR . 'desks-client'),

    /**
     * Git user
     */
    'git_user' => 'satubaldeeva',

    /**
     * Git repository name template
     */
    'git_repo_template' => 'desks-client',

    /**
     * Git host
     */
    'git_host' => 'github.com',

    /**
     * Args for generate nodejs client
     */
    'js_args' => [
        /**
         * Specific generator params from https://openapi-generator.tech/docs/generators/typescript-fetch/
         */
        'params' => [
            'npmName' => 'desks-client',
            'useES6' => true,
            'useSingleRequestParameter' => true,
            'withInterfaces' => true,
            'typescriptThreePlus' => true,
        ],

        /**
         * Need generate nest js module, only for backend services
         */
        'generate_nestjs_module' => false,

        /**
         * Directory where you can place templates to override default ones. . Used in -t
         */
        'template_dir' => '',

        /**
         * Files that will be ignored during repository cleanup
         */
        'files_to_ignore_during_cleanup' => ['.git', '.gitignore'],
    ],

    /**
     * Args for generate php client
     */
    'php_args' => [
        /**
         * Package name for composer, use standard pattern namespace/package
         */
        'composer_name' => 'satubaldeeva/desks-client',

        /**
         * Specific generator params from https://openapi-generator.tech/docs/generators/php/
         */
        'params' => [
            'apiPackage' => 'Api',
            'invokerPackage' => 'Satubaldeeva\DesksClient',
            'modelPackage' => 'Dto',
            'packageName' => 'DesksClient',
        ],

        /**
         * Directory where you can place templates to override default ones. . Used in -t
         */
        'template_dir' => '',

        /**
         * Files that will be ignored during repository cleanup
         */
        'files_to_ignore_during_cleanup' => ['.git', '.gitignore'],

        /**
         * Options for disable patch section "require" composer.json
         */
        'composer_disable_patch_require' => false,
    ],
];

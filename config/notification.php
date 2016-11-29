<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | Session key
    |--------------------------------------------------------------------------
    |
    | Session key for messages.
    |
    */
    'session_key'                           => 'notifications',

    /*
    |--------------------------------------------------------------------------
    | Default container name
    |--------------------------------------------------------------------------
    |
    | This name will be used to name default container (when calling it with null value).
    |
    */
    'default_container'                     => 'default',

    /*
    |--------------------------------------------------------------------------
    | Default types for dynamic containers.
    |--------------------------------------------------------------------------
    |
    | These types will be added for new containers.
    |
    */
    'default_types'                         => array('info', 'success', 'warning', 'error', 'infoClose', 'successClose', 'warningClose', 'errorClose'),

    /*
    |--------------------------------------------------------------------------
    | Types for containers
    |--------------------------------------------------------------------------
    |
    | Specify available types for each container separately.
    |
    */
    'types'                                 => array(),

    /*
    |--------------------------------------------------------------------------
    | Default message format
    |--------------------------------------------------------------------------
    |
    | This format will be used when no format is specified.
    | Available place holders:
    |
    | :type - type of message (error, warning, info, success).
    | :message - message text.
    |
    */
    'default_format'                        => '<div class="alert alert-:type">:message</div>',

    /*
    |--------------------------------------------------------------------------
    | Default message format for containers
    |--------------------------------------------------------------------------
    |
    | This format will be used to override global default format for each container.
    |
    | 'format' => array(
    |       'myContainer' => ':message - :type',
    | )
    |
    |
    | Available place holders:
    |
    | :type - type of message (error, warning, info, success).
    | :message - message text.
    |
    */
    'format'                                => array(),

    /*
    |--------------------------------------------------------------------------
    | Default message formats for types
    |--------------------------------------------------------------------------
    |
    | These formats can override default format for each type of message (error, warning, info, success).
    | Available place holders:
    |
    | :type - type of message (error, warning, info, success).
    | :message - message text.
    |
    */
    'default_formats'                       => array(
        'info'                  => '<div class="alert alert-info">:message</div>',
        'success'               => '<div class="alert alert-success">:message</div>',
        'warning'               => '<div class="alert alert-warning">:message</div>',
        'error'                 => '<div class="alert alert-danger">:message</div>',
        'infoClose'            => '<div class="alert alert-info fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>:message</div>',
        'successClose'         => '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>:message</div>',
        'warningClose'         => '<div class="alert alert-warning"><a href="#" class="close" data-dismiss="alert">&times;</a>:message</div>',
        'errorClose'           => '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert">&times;</a>:message</div>',
    ),

    /*
    |--------------------------------------------------------------------------
    | Message formats for types and container types
    |--------------------------------------------------------------------------
    |
    | These formats can override default format for each type of message (error, warning, info, success).
    | You can set formats for each container by using this syntax:
    |
    | 'formats' => array(
    |       'myContainer' => array(
    |           'info' => ':key - :message'
    |       )
    |   )
    |
    | Available place holders:
    |
    | :type - type of message (error, warning, info, success).
    | :message - message text.
    |
    */
    'formats'                       => array(),

);

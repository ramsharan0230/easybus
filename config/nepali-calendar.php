<?php

  return [

    /**
     * DEFAULT date format
    */
    'date_format' => 'YYYY-MM-DD',

    /**
     * DEFAULT return type
     * return types
     * [ date, string, array ]
    */
    'return_type' => 'string',

    /**
     * DEFAULT lang
    */
    'lang' => 'np',

    /**
     * Supported date formats
    */
    'date_formats' => [
        'YYYY-MM-DD',
        'MM-DD-YYYY',
        'DD-MM-YYYY',
        'YYYY/MM/DD',
        'MM/DD/YYYY',
        'DD/MM/YYYY'
    ],

    /**
     * Date Seperators
    */
    'date_seperators' => [
        'YYYY-MM-DD' => '-',
        'MM-DD-YYYY' => '-',
        'DD-MM-YYYY' => '-',
        'YYYY/MM/DD' => '/',
        'MM/DD/YYYY' => '/',
        'DD/MM/YYYY' => '/'
    ],

    /**
     * Supported Languages
    */
    'langs' => [
        'np',
        'en'
    ],

    /**
     * Supported return types
    */
    'return_types' => [
        'array',
        'string'
    ],

    /**
     * Calendar Types
    */
    'calendar_types' => [
        'BS',
        'AD'
    ]

  ];
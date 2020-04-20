<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;

function validateRequest($request, $config, $message = '', $data = '')
{
    if (is_null($request)) {
        header('HTTP/1.0 400 Bad Request');
        header('Cache-Control: no-cache');
        header('Content-Type:  application/json');

        exit(showResponseError(400, 'Please check all input', [], true));
    }

    $request = is_array($request) ? $request : (array)$request;
    $validate = Validator::make($request, $config);

    if ($validate->fails()) {
        exit(errorValidation($validate->errors()->toArray()));
    }
}

function errorValidation(array $errors)
{
    header('HTTP/1.0 422 Unprocessable Entity');
    header('Cache-Control: no-cache');
    header('Content-Type:  application/json');

    $errorArray = [];
    $errorFlatten = array_flatten($errors);

    foreach ($errors as $key => $value) {
        $errorArray[$key] = array_first($value);
    }

    $output['meta'] = [
        'code' => 422,
        'message' => array_first($errorFlatten),
        'message_array' => $errorArray
    ];

    return json_encode($output);
}

/**
 * Get Fields Name
 * @param  string $table table name
 * @param  array $ignores list of ingnored field
 * @return array list column name
 */
function getField($table, $ignores = array())
{
    $columns = Schema::getColumnListing($table);

    if (!empty($ignores))
        return array_except($columns, $ignores);

    return $columns;
}

/**
 * Function for checking field is valid in table
 * @param  string $table table name
 * @param  string $field field name
 * @return boolean
 */
function isValidField($table, $field)
{
    $columns = Schema::getColumnListing($table);

    return in_array($field, $columns);
}

<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define('BASE_URL', 'http://localhost/e-shop');

// Maak databaseverbinding
$conn = new mysqli('localhost', 'root', '', 'e-shop');

// Controleer connectie
if ($conn->connect_errno) {
    die("Fout bij verbinden met database: " . $conn->connect_error);
}

// --- FUNCTIES ---


/*
|--------------------------------------------------------------------------
| DB INSERT (ongewijzigd)
|--------------------------------------------------------------------------
*/
function db_insert($table_name, $data)
{
    global $conn;

    $column_names = "(";
    $column_values = "(";

    $sql = "INSERT INTO $table_name";

    $is_first = true;
    foreach ($data as $key => $value) {
        if ($is_first) {
            $is_first = false;
        } else {
            $column_names .= ",";
            $column_values .= ",";
        }

        $column_names .= $key;

        $gettype = gettype($value);
        if ($gettype == 'string') {
            $column_values .= "'" . $conn->real_escape_string($value) . "'";
        } else {
            $column_values .= $value;
        }
    }

    $column_names .= ")";
    $column_values .= ")";

    $sql .= $column_names . " VALUES " . $column_values;

    if ($conn->query($sql)) {
        return true;
    } else {
        return false;
    }
}


/*
|--------------------------------------------------------------------------
| DB SELECT (toegevoegd)
|--------------------------------------------------------------------------
*/
function db_select($table_name, $where = null)
{
    global $conn;

    $sql = "SELECT * FROM $table_name";

    if ($where) {
        $sql .= " WHERE $where";
    }

    $result = $conn->query($sql);

    if (!$result) {
        return [];
    }

    $rows = [];

    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    return $rows;
}


/*
|--------------------------------------------------------------------------
| IMAGE UPLOAD (ongewijzigd)
|--------------------------------------------------------------------------
*/
function upload_images($files)
{
    ini_set('memory_limit', '512M');

    if ($files == null || empty($files)) {
        return [];
    }

    $uploaded_images = [];

    foreach ($files as $file) {

        if (
            isset($file['name']) &&
            isset($file['type']) &&
            isset($file['tmp_name']) &&
            isset($file['error']) &&
            isset($file['size'])
        ) {

            if ($file['error'] !== 0) continue;

            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

            $file_name = time() . "-" . rand(100000, 1000000) . "." . $ext;

            $destination = 'uploads/' . $file_name;

            $res = move_uploaded_file($file['tmp_name'], $destination);

            if (!$res) continue;

            $img = [];
            $img['src'] = $destination;

            $uploaded_images[] = $img;
        }
    }

    return $uploaded_images;
}


/*
|--------------------------------------------------------------------------
| URL
|--------------------------------------------------------------------------
*/
function url($path = "/")
{
    return BASE_URL . $path;
}


/*
|--------------------------------------------------------------------------
| PROTECTED AREA
|--------------------------------------------------------------------------
*/
function protected_area()
{
    if (!isset($_SESSION['user'])) {

        alert('warning', 'Ongeautoriseerde toegang, Log in voordat u verdergaat');

        header('Location: login.php');

        die();
    }
}


/*
||--------------------------------------------------------------------------
|| ADMIN PROTECTED AREA
||--------------------------------------------------------------------------
*/
function admin_protected_area()
{
    if (!isset($_SESSION['user'])) {
        alert('warning', 'Ongeautoriseerde toegang, Log in voordat u verdergaat');
        header('Location: ../login.php');
        die();
    }

    // Controleer of gebruiker admin is
    if (!isset($_SESSION['user']['user_type']) || $_SESSION['user']['user_type'] !== 'admin') {
        alert('danger', 'U heeft geen toegang tot het admin panel');
        header('Location: ../index.php');
        die();
    }
}


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
function logout()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

    alert('success', 'Uitgelogd');

    header('Location: login.php');

    die();
}


/*
|--------------------------------------------------------------------------
| CHECK LOGIN
|--------------------------------------------------------------------------
*/
function is_logged_in()
{
    return isset($_SESSION['user']);
}


/*
|--------------------------------------------------------------------------
| ALERT
|--------------------------------------------------------------------------
*/
function alert($type, $message)
{
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}


/*
|--------------------------------------------------------------------------
| LOGIN USER
|--------------------------------------------------------------------------
*/
function login_user($email, $password)
{
    global $conn;

    $sql = "SELECT * FROM users WHERE email ='{$email}'";

    $res = $conn->query($sql);

    if ($res->num_rows < 1) {
        return false;
    }

    $row = $res->fetch_assoc();

    if (!password_verify($password, $row['password'])) {
        return false;
    }

    $_SESSION['user'] = $row;

    return true;
}


/*
|--------------------------------------------------------------------------
| TEXT INPUT
|--------------------------------------------------------------------------
*/
function text_input($data)
{
    $name = $data['name'] ?? "";
    $attributes = $data['attributes'] ?? "";

    $value = $_SESSION['form']['value'][$name] ?? $data['value'] ?? "";

    $error_text = isset($_SESSION['form']['error'][$name]) ?
        '<div class="form-text text-danger">' . $_SESSION['form']['error'][$name] . '</div>' : "";

    $label = $data['label'] ?? ucfirst($name);

    return '<label class="form-label text-capitalize" for="' . $name . '">' . $label . '</label>
            <input name="' . $name . '" value="' . $value . '" class="form-control" type="text" id="' . $name . '" placeholder="' . $name . '" ' . $attributes . '>
            ' . $error_text;
}


/*
|--------------------------------------------------------------------------
| SELECT INPUT
|--------------------------------------------------------------------------
*/
function select_input($data, $options)
{
    $name = $data['name'] ?? "";
    $attributes = $data['attributes'] ?? "";

    $selected_value = $_SESSION['form']['value'][$name] ?? $data['value'] ?? "";

    $error_text = isset($_SESSION['form']['error'][$name]) ?
        '<div class="form-text text-danger">' . $_SESSION['form']['error'][$name] . '</div>' : "";

    $label = $data['label'] ?? ucfirst($name);

    $options_html = "";

    foreach ($options as $key => $option_text) {

        $selected = ($key == $selected_value) ? "selected" : "";

        $options_html .= '<option value="' . htmlspecialchars($key) . '" ' . $selected . '>' .
            htmlspecialchars($option_text) .
            '</option>';
    }

    return '<label class="form-label text-capitalize" for="' . $name . '">' . $label . '</label>
    <select name="' . $name . '" class="form-control" id="' . $name . '" ' . $attributes . '>
        ' . $options_html . '
    </select>
    ' . $error_text;
}


// --- RETURN DATABASECONNECTIE --- //
return $conn;

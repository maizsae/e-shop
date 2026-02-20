<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define('BASE_URL', 'http://localhost/e-shop');

// Maak databaseverbinding
$conn = new mysqli('localhost', 'root', '', 'e-shop');
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn->set_charset("utf8mb4");
function get_product($id)
{
    $sql = "SELECT * FROM producten WHERE producten.id = $id";
    global $conn;
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

// Controleer connectie
if ($conn->connect_errno) {
    die("Fout bij verbinden met database: " . $conn->connect_error);
}



function get_product_photos($json)
{
    $img['src'] = "uploads/default.jpg";
    $photo[] = $img;

    if ($json == null) {
        return $photo;
    }
    if (strlen($json) < 4) {
        return $photo;
    }
    $objects = json_decode($json);

    if (empty($objects)) {
        return $photo;
    }


    return $objects;
}














function get_product_image($json)
{
    $img = "uploads/default.jpg";
    if ($json == null) {
        return $img;
    }
    if (strlen($img) < 4) {
        return $img;
    }
    $objects = json_decode($json);
    if (empty($objects)) {
        return $img;
    }
    if (!isset($objects[0]->src)) {
        return $img;
    }

    return $objects[0]->src;
    echo "<pre>";
    print_r($objects[0]);
}



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
function db_update($table_name, $data, $where)
{
    global $conn;

    $set = [];
    foreach ($data as $key => $value) {
        if (is_string($value)) {
            $set[] = "$key='" . $conn->real_escape_string($value) . "'";
        } else if ($value === null) {
            $set[] = "$key=NULL";
        } else {
            $set[] = "$key=$value";
        }
    }

    $sql = "UPDATE $table_name SET " . implode(',', $set) . " WHERE $where";
    return $conn->query($sql) ? true : false;
}

function db_delete($table_name, $where)
{
    global $conn;
    $sql = "DELETE FROM $table_name WHERE $where";
    return $conn->query($sql) ? true : false;
}



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


function url($path = "/")
{
    return BASE_URL . $path;
}



function protected_area()
{
    if (!isset($_SESSION['user'])) {

        alert('warning', 'Ongeautoriseerde toegang, Log in voordat u verdergaat');

        header('Location: login.php');

        die();
    }
}



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



function logout()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }

    alert('success', 'Uitgelogd');

    header('Location: login.php');

    die();
}



function is_logged_in()
{
    return isset($_SESSION['user']);
}



function alert($type, $message)
{
    $_SESSION['alert']['type'] = $type;
    $_SESSION['alert']['message'] = $message;
}



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



function text_input($data)
{
    $name = $data['name'] ?? "";
    $attributes = $data['attributes'] ?? "";

    $value = $_SESSION['form']['value'][$name] ?? $data['value'] ?? "";

    $error_text = isset($_SESSION['form']['error'][$name]) ?
        '<div class="form-text text-danger">' . $_SESSION['form']['error'][$name] . '</div>' : "";

    $label = $data['label'] ?? ucfirst($name);

    return '<label class="form-label text-capitalize" for="' . $name . '">' . $label . '</label>
            <input name="' . $name . '" value="' . $value . '" class="form-control" type="text" id="' . $name . '" placeholder="' . $label . '" ' . $attributes . '>
            ' . $error_text;
}



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
    <select name="' . $name . '" class="form-select" id="' . $name . '" ' . $attributes . '>
        ' . $options_html . '
    </select>
    ' . $error_text;
}



return $conn;



function product_item_ui_1($pro)
{

    $image = get_product_image($pro['photo']);
    $str = <<<EOF
<div class="col-md-4 col-sm-6 px-2 mb-4">
                        <div class="card product-card">
                            

                            <a class="card-img-top d-block overflow-hidden" href="product.php?id= {$pro['id']}">
                                <img src="{$image}" alt="Product">
                            </a>

                            <div class="card-body py-2">
  <h3 class="product-title fs-sm">
    <a href="product.php?id={$pro['id']}">{$pro['name']}</a>
  </h3>

  <div class="d-flex justify-content-between">
    <div class="product-price">
      <span class="text-accent">€{$pro['prijs']}.<small>00</small></span>
    </div>
  </div>

  <a class="btn btn-primary btn-sm d-block w-100 mt-2" href="cart-add.php?id={$pro['id']}">
    <i class="ci-cart fs-sm me-1"></i>Voeg toe aan winkelmand
  </a>
</div>

                            <div class="card-body card-body-hidden">
                                <div class="text-center pb-2">
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size=" id="s-75">
                                        <label class="form-option-label" for="s-75">7.5</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size=" id="s-80" checked>
                                        <label class="form-option-label" for="s-80">8</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size=" id="s-85">
                                        <label class="form-option-label" for="s-85">8.5</label>
                                    </div>
                                    <div class="form-check form-option form-check-inline mb-2">
                                        <input class="form-check-input" type="radio" name="size=" id="s-90?>">
                                        <label class="form-option-label" for="s-90">9</label>
                                    </div>
                                </div>

                                

                                
                                    </a>
                                </div>
                            </div>
                        </div>

                        <hr class="d-sm-none">
                    </div>

EOF;
    return $str;
}


function cart_get_or_create_id($user_id)
{
    // 1) bestaat er al een open cart?
    $cart = db_one("SELECT id FROM carts WHERE user_id = ? AND status = 'open' LIMIT 1", "i", [$user_id]);
    if ($cart) return (int)$cart['id'];

    // 2) anders: maak aan
    $res = db_exec("INSERT INTO carts (user_id, status) VALUES (?, 'open')", "i", [$user_id]);
    return (int)$res['insert_id'];
}

function cart_add_db($user_id, $product_id, $qty)
{
    $qty = max(1, (int)$qty);
    $product_id = (int)$product_id;

    // product ophalen
    $pro = db_one("SELECT id, name, prijs, photo FROM producten WHERE id = ? LIMIT 1", "i", [$product_id]);
    if (!$pro) return ['ok' => false, 'error' => 'Product bestaat niet'];

    $cart_id = cart_get_or_create_id((int)$user_id);

    // bestaat item al?
    $item = db_one("SELECT id, qty FROM cart_items WHERE cart_id = ? AND product_id = ? LIMIT 1", "ii", [$cart_id, $product_id]);

    if ($item) {
        db_exec(
            "UPDATE cart_items SET qty = qty + ? WHERE cart_id = ? AND product_id = ?",
            "iii",
            [$qty, $cart_id, $product_id]
        );
    } else {
        db_exec(
            "INSERT INTO cart_items (cart_id, product_id, qty, unit_price) VALUES (?, ?, ?, ?)",
            "iiid",
            [$cart_id, $product_id, $qty, (float)$pro['prijs']]
        );
    }

    return ['ok' => true];
}

function cart_remove_db($user_id, $product_id)
{
    $cart = db_one("SELECT id FROM carts WHERE user_id = ? AND status = 'open' LIMIT 1", "i", [(int)$user_id]);
    if (!$cart) return ['ok' => true];

    db_exec("DELETE FROM cart_items WHERE cart_id = ? AND product_id = ?", "ii", [(int)$cart['id'], (int)$product_id]);
    return ['ok' => true];
}

function cart_update_qty_db($user_id, $product_id, $qty)
{
    $qty = (int)$qty;
    $cart = db_one("SELECT id FROM carts WHERE user_id = ? AND status = 'open' LIMIT 1", "i", [(int)$user_id]);
    if (!$cart) return ['ok' => false, 'error' => 'Geen winkelmand gevonden'];

    if ($qty <= 0) {
        db_exec("DELETE FROM cart_items WHERE cart_id = ? AND product_id = ?", "ii", [(int)$cart['id'], (int)$product_id]);
        return ['ok' => true];
    }

    db_exec("UPDATE cart_items SET qty = ? WHERE cart_id = ? AND product_id = ?", "iii", [$qty, (int)$cart['id'], (int)$product_id]);
    return ['ok' => true];
}

function cart_items_db($user_id)
{
    $cart = db_one("SELECT id FROM carts WHERE user_id = ? AND status = 'open' LIMIT 1", "i", [(int)$user_id]);
    if (!$cart) return [];

    // join voor product info (naam, foto) + prijs snapshot (unit_price)
    return db_all(
        "SELECT ci.product_id AS id, ci.qty, ci.unit_price AS prijs, p.name, p.photo
         FROM cart_items ci
         JOIN producten p ON p.id = ci.product_id
         WHERE ci.cart_id = ?
         ORDER BY ci.id DESC",
        "i",
        [(int)$cart['id']]
    );
}
function db_one($sql, $types = "", $params = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    if ($types && $params) $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $res = $stmt->get_result();
    $row = $res ? $res->fetch_assoc() : null;
    $stmt->close();
    return $row;
}

function db_all($sql, $types = "", $params = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    if ($types && $params) $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $res = $stmt->get_result();
    $rows = [];
    if ($res) {
        while ($r = $res->fetch_assoc()) $rows[] = $r;
    }
    $stmt->close();
    return $rows;
}

function db_exec($sql, $types = "", $params = [])
{
    global $conn;
    $stmt = $conn->prepare($sql);
    if ($types && $params) $stmt->bind_param($types, ...$params);
    $ok = $stmt->execute();
    $insertId = $stmt->insert_id;
    $affected = $stmt->affected_rows;
    $stmt->close();
    return ['ok' => $ok, 'insert_id' => $insertId, 'affected' => $affected];
}

<?php
// MySQL Compatibility Layer - Menggantikan fungsi mysql_* yang sudah deprecated
// dengan menggunakan MySQLi modern

global $__mysqli_conn;

function mysql_connect($host, $user, $pass) {
    global $__mysqli_conn;
    $__mysqli_conn = new mysqli($host, $user, $pass);
    if ($__mysqli_conn->connect_error) {
        die("<h1>Tidak terkoneksi ke server: " . $__mysqli_conn->connect_error . "</h1>");
    }
    $__mysqli_conn->set_charset('utf8');
    // Fix MySQL 8 ONLY_FULL_GROUP_BY strict mode yang tidak kompatibel dengan query lama
    $__mysqli_conn->query("SET SESSION sql_mode = (SELECT REPLACE(@@sql_mode, 'ONLY_FULL_GROUP_BY', ''))");
    return $__mysqli_conn;
}

function mysql_select_db($db, $conn = null) {
    global $__mysqli_conn;
    $c = $conn ?? $__mysqli_conn;
    if (!$c->select_db($db)) {
        die("<h1>Database tidak ditemukan: $db</h1>");
    }
    return true;
}

function mysql_query($query, $conn = null) {
    global $__mysqli_conn;
    $c = $conn ?? $__mysqli_conn;
    $result = $c->query($query);
    return $result;
}

function mysql_fetch_array($result, $type = MYSQLI_BOTH) {
    if (!$result || !($result instanceof mysqli_result)) return false;
    return $result->fetch_array($type);
}

function mysql_fetch_assoc($result) {
    if (!$result || !($result instanceof mysqli_result)) return false;
    return $result->fetch_assoc();
}

function mysql_fetch_row($result) {
    if (!$result || !($result instanceof mysqli_result)) return false;
    return $result->fetch_row();
}

function mysql_num_rows($result) {
    if (!$result || !($result instanceof mysqli_result)) return 0;
    return $result->num_rows;
}

function mysql_affected_rows($conn = null) {
    global $__mysqli_conn;
    $c = $conn ?? $__mysqli_conn;
    return $c->affected_rows;
}

function mysql_insert_id($conn = null) {
    global $__mysqli_conn;
    $c = $conn ?? $__mysqli_conn;
    return $c->insert_id;
}

function mysql_real_escape_string($str, $conn = null) {
    global $__mysqli_conn;
    $c = $conn ?? $__mysqli_conn;
    if (!$c) return addslashes($str);
    return $c->real_escape_string($str);
}

function mysql_error($conn = null) {
    global $__mysqli_conn;
    $c = $conn ?? $__mysqli_conn;
    return $c ? $c->error : 'No connection';
}

function mysql_result($result, $row, $field = 0) {
    if (!$result || !($result instanceof mysqli_result)) return null;
    $result->data_seek($row);
    $data = $result->fetch_array(MYSQLI_BOTH);
    if (is_int($field)) return $data[$field] ?? null;
    return $data[$field] ?? null;
}

function mysql_free_result($result) {
    if ($result instanceof mysqli_result) {
        $result->free();
    }
    return true;
}

function mysql_data_seek($result, $offset) {
    if ($result instanceof mysqli_result) {
        return $result->data_seek($offset);
    }
    return false;
}

function mysql_close($conn = null) {
    global $__mysqli_conn;
    $c = $conn ?? $__mysqli_conn;
    if ($c) $c->close();
    return true;
}

function mysql_get_server_info($conn = null) {
    global $__mysqli_conn;
    $c = $conn ?? $__mysqli_conn;
    return $c ? $c->server_info : '';
}

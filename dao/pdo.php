<?php
function pdo_connect()
{
    $dburl = "mysql:host=localhost;dbname=xshop;charset=utf8";
    $dbuser = "root";
    $dbpass = "";

    try {
        $pdo = new PDO($dburl, $dbuser, $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Connected to database";
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function pdo_execute($sql)
{
    $sql_vals = array_slice(func_get_args(), 1);

    try {
        $pdo = pdo_connect();
        $stmt = $pdo->prepare($sql);
        $stmt->execute($sql_vals);

        return $stmt;
    } catch (PDOException $e) {
        throw "Execution failed: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
}
function pdo_prepare($sql)
{
    $pdo = pdo_connect();
    return $pdo->prepare($sql);
}
function pdo_exec_m($sql)
{
    $sql_vals = array_slice(func_get_args(), 1);
    try {
        $stmt = pdo_prepare($sql);
        $stmt->execute($sql_vals);
        return $stmt;
    } catch (PDOException $e) {
        throw "Execution failed: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
}


function pdo_query($sql, $params = null)
{
    $pdo = pdo_connect();

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $rows;
    } catch (PDOException $e) {
        throw "Query failed: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
}

function pdo_query_once($sql, $params = null)
{
    $pdo = pdo_connect();

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        return $result;
    } catch (PDOException $e) {
        throw "Query failed: " . $e->getMessage();
    } finally {
        $pdo = null;
    }
}
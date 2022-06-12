<?php
    function get_comment($limit = null, $order = null, $cond = null)
    {
        $sql = "SELECT * FROM `comment`";
        if ($order) {
            $sql .= " ORDER BY `$order` DESC";
        }
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        if ($limit) {
            $sql .= " LIMIT $limit";
        }
        $data = pdo_query($sql);

        return $data;
    }
    
    function get_comment_count($cond = null)
    {
        $sql = "SELECT COUNT(*) AS count FROM `comment`";
        if ($cond) {
            $sql .= " WHERE $cond";
        }
        $data = pdo_query($sql);

        return $data[0]['count'];
    }
?>
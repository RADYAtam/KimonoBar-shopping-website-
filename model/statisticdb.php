<?php
    function count_invoice_month($month) {
        $conn = connectdb();
        $sql = "SELECT COUNT(*) AS invoice_count FROM tbl_order WHERE MONTH(due_date) = :month AND status != 'Pending' AND status != 'Cancel'";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['invoice_count'];
    }
    function sum_invoice_month($month) {
        $conn = connectdb();
        $sql = "SELECT SUM(total_prices) AS total_value FROM tbl_order WHERE MONTH(due_date) = :month AND status != 'Pending' AND status != 'Cancel'";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_value'];
    }
    function getall_invoice_month($month){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE MONTH(due_date) =:month ");
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $kq;
    }
    
    function get_monthly_stats() {
        $conn = connectdb();
        $sql = "SELECT 
                    MONTH(due_date) as month,
                    COUNT(*) as invoice_count,
                    SUM(total_prices) as total_profit
                FROM tbl_order 
                WHERE status != 'Pending' AND status != 'Cancel'
                GROUP BY MONTH(due_date)
                ORDER BY MONTH(due_date)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    function get_monthly_product_quantity() {
        $conn = connectdb();
        $sql = "SELECT 
                    MONTH(o.due_date) as month,
                    SUM(c.quantity) as total_quantity
                FROM tbl_order o 
                JOIN tbl_cart c ON o.id = c.id_order
                WHERE o.status != 'Pending' AND o.status != 'Cancel'
                GROUP BY MONTH(o.due_date)
                ORDER BY MONTH(o.due_date)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
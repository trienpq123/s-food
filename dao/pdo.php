<?php 
    //Kết nối PDO
    function pdo_get_connection(){
        $host_name = "localhost";
        $db_name = "am_thuc";

        $dburl = "mysql:host=$host_name;dbname=$db_name;charset=utf8";
        $username = 'root';
        $password = '';

        $conn = new PDO($dburl, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }

            /**
        * $sql câu lệnh sql
        * $args mảng giá trị cung cấp các tham số cho $sql
        * array mảng các bản ghi
        * throws PDOExeption lỗi thực thi câu lệnh
        */

        //Thực hiện câu lệnh sql theo thao tác
        //Insert - Update - Delete
        function pdo_execute($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
                $conn = pdo_get_connection();
                $stmt = $conn->prepare($sql);
                $stmt->execute($sql_args);
            }
            catch(PDOException $e){
                throw $e;
            }
            finally{
                unset($conn);
            }
        }



        //Truy vấn dữ liệu (SELECT)
        function pdo_query($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
                $conn = pdo_get_connection();
                $stmt = $conn->prepare($sql);
                $stmt->execute($sql_args);
                $rows = $stmt->fetchAll();
                return $rows;
            }
            catch(PDOException $e){
                throw $e;
            }
            finally{
                unset($conn);
            }
        }


        //Truy vấn một bản ghi
        function pdo_query_one($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
                $conn = pdo_get_connection();
                $stmt = $conn->prepare($sql);
                $stmt->execute($sql_args);
                $rows = $stmt->fetch(PDO::FETCH_ASSOC);
                return $rows;
            }
            catch(PDOException $e){
                throw $e;
            }
            finally{
                unset($conn);
            }
        }

        //Truy vấn một giá trị
        function pdo_query_value($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try{
                $conn = pdo_get_connection();
                $stmt = $conn->prepare($sql);
                $stmt->execute($sql_args);
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                return array_values($row)[0];
            }
            catch(PDOException $e){
                throw $e;
            }
            finally{
                unset($conn);
            }
        }

        function count_query($sql){
            $sql_args = array_slice(func_get_args(), 1);
            try {
                $conn = pdo_get_connection();
                $stmt = $conn->prepare($sql);
                $stmt->execute($sql_args);
                $count = $stmt->rowCount();
                return $count;
            } catch (\Throwable $e) {
                throw $e;
            }
            finally{
                unset($conn);
            }
        }


?>
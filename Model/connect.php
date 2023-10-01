<?php
  class connect{
      var $db=null;
      public function __construct()
      {
        $dsn='mysql:host=localhost;dbname=tracnghiem2';
        $user='root';
        $pass='';
        $this->db=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
      }
      // lấy 1 dòng đầu tiên
      public function selectone($select)
      {
        $result=$this->db->query($select);// được truy vấn csdl đc truyền vào biến $select
        $results=$result->fetch(); // kết quả truy vấn đc lưu vào biến $results , sử dùng feach để lấy dữ liệu đầu tiên từ kq r lưu vào resul
        return $results;
      }
      // lấy 1 danh sách
      public function getList($select)
      {
        $result=$this->db->query($select);
        return $result;
      }
      //được sử dụng để chuẩn bị một truy vấn
      public function execP($query){
        $statement=$this->db->prepare($query);
        return $statement;
      }

      // thực thi truy vấn
      public function exec($query)
      {
        $results=$this->db->exec($query);
        // echo $results;
        return($results);
      }
  }
?>
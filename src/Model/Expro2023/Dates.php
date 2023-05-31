<?php

namespace App\Model\Expro2023;

use App\Database\DbSciExpro2023;


class Dates extends DbSciExpro2023
{
  public function getDate()
  {
    $sql = "
        SELECT * FROM tb_date
    ";
    $stmt = $this->pdo->query($sql);
    $data = $stmt->fetchAll();
    return $data;
  }
  public function getData($date)
  {
    $sql = "
        SELECT * FROM tb_data WHERE d_date='{$date}'
    ";
    $stmt = $this->pdo->query($sql);
    $data = $stmt->fetchAll();
    return $data;
  }
}
?>
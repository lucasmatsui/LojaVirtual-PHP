<?php
class Categories extends Model 
{
  public function getList() 
  {
    $array = array();

    $sql = "SELECT * FROM categories ORDER BY sub DESC";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {
      foreach($sql->fetchAll() as $item) {
        $item['subs'] = array();
        $array[$item['id']] = $item;
      }

      while($this->stillNeed($array)) {
        $this->organizeCategory($array);
      }

    }

    return $array;
  }

  private function organizeCategory(&$array) 
  {
    foreach($array as $id => $item) {
      if(isset($array[$item['sub']])) {
        $array[$item['sub']]['subs'][$item['id']] = $item;
        unset($array[$id]);
        break;
      }
    }
  }

  private function stillNeed($array) 
  {
    foreach($array as $item) {
      if(!empty($item['sub'])) {
        return true;
      }
    }

    return false;
  }


}


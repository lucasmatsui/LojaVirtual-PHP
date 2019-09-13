<?php
class Products extends Model {

  public function getList() {
    $array = array();

    $sql = "SELECT *,
    (select brands.name from brands where brands.id = products.id_brand)
      as brand_name,
    (select categories.name from categories where categories.id = products.id_category)
      as category_name
    FROM products";
    $sql = $this->db->query($sql);

    if($sql->rowCount() > 0) {

      $array = $sql->fetchAll();

      foreach($array as $key => $item) {

        $array[$key]['images'] = $this->getImagesByProductId($item['id']);

      }
   
    }

    return $array;
  }

  public function getImagesByProductId($id) {
    $array = array();

    $sql = "SELECT url FROM products_images WHERE id_product = :id";
    $sql = $this->db->prepare($sql);
    $sql->bindValue(":id", $id);
    $sql->execute();

    if($sql->rowCount() > 0) {

      $array = $sql->fetchAll();

    }

    return $array;
  }

}
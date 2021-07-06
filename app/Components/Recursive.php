<?php
namespace App\Components ;

class  Recursive {
   protected $data ;
   protected $html ;
    public  function  __construct($data)
    {
        $this->data = $data  ;
    }
    public function recursive( $parentId, $id = 0 , $text = '')
    {
        foreach ($this->data as $category) {
            if ($category['parent_id'] == $id) {
                if (!empty($parentId) && ($parentId == $category['id'])){
                    $this->html .= "<option selected value='{$category['id']}'  >  $text  $category->category_name </option>";

                }else {
                    $this->html .= "<option  value='{$category['id']}'  >  $text  $category->category_name </option>";
                }
                    $this->recursive(  $parentId ,$category['id'], $text . "-");
            }
        }
        return $this->html;
    }
}



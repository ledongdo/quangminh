<?php
namespace App\Components;

use App\Models\Menu;

class MenuRecusive{
    private $html;
    private $htmlEdit;
    public function __construct()
    {
        $this->html = '';
    }
    public function MenuRecusiveAdd($parentId = 0,$subMark = '')
    {   
        $data = Menu::where('parent_id',$parentId)->get();
        foreach($data as $dataItem){
            $this->html .= '<option value="'.$dataItem->id.'">'. $subMark. $dataItem->name .'</option>';
            $this->MenuRecusiveAdd($dataItem->id,$subMark.'-');
        }
        return $this->html;
    }
    public function MenuRecusiveEdit($parentIdMenu,$parentId = 0,$subMark = '')
    {
        $data = Menu::where('parent_id',$parentId)->get();
        foreach($data as $dataItem){
            if($parentIdMenu == $dataItem->id)
            {
            $this->htmlEdit .= '<option selected value="'.$dataItem->id.'">'. $subMark. $dataItem->name .'</option>';
            }else{
                $this->htmlEdit .= '<option value="'.$dataItem->id.'">'. $subMark. $dataItem->name .'</option>';
            }
            $this->MenuRecusiveEdit($parentIdMenu,$dataItem->id,$subMark.'-');
        }
        return $this->htmlEdit;
    }
}

?>
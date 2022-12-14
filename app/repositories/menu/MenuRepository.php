<?php

namespace App\repositories\menu;

use App\Models\Menu;
use App\repositories\BaseRepository;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{
    protected $html = '';


    public function getModel(): string
    {
        return Menu::class;
    }

    public function getMenu()
    {
        return $this->model->search()->paginate(5);
    }

    public function getAdd($parent = 0, $text = '')
    {
        $menus = $this->model->where('parent_id', $parent)->get();
        foreach ($menus as $menuChild) {
            $this->html .= "<option value='$menuChild->id'>" . $text . $menuChild->name . "</option>";
            $this->getAdd($menuChild->id, $text . '--');
        }
        return $this->html;
    }


    public function getEdit($id, $parent = 0, $text = '')
    {
        $menus = $this->model->where('parent_id', $parent)->get();
        foreach ($menus as $menuChild) {
            if ($id == $menuChild->id){
                $this->html .= "<option selected value='$menuChild->id'>" . $text . $menuChild->name . "</option>";
            }else{
                $this->html .= "<option  value='$menuChild->id'>" . $text . $menuChild->name . "</option>";
            }

            $this->getAdd($menuChild->id, $text . '--');
        }
        return $this->html;
    }

    public function checkChild($id): bool
    {
       $menuChild = $this->model->where('parent_id', $id);
       if ($menuChild->count() > 0){
           return false;
       }

       return  true;
    }
}

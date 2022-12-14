<?php

namespace App\repositories\category;

use App\Models\Category;
use App\repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $html = '';


    public function getModel(): string
    {
        return Category::class;
    }

    public function getCategory()
    {
        return $this->model->search()->paginate(5);
    }

    public function getAdd($parent = 0, $text = '')
    {
        $categories = $this->model->where('parent_id', $parent)->get();
        foreach ($categories as $cateChild) {
            $this->html .= "<option value='$cateChild->id'>" . $text . $cateChild->name . "</option>";
            $this->getAdd($cateChild->id, $text . '--');
        }
        return $this->html;
    }


    public function getEdit($id, $parent = 0, $text = '')
    {
        $categories = $this->model->where('parent_id', $parent)->get();
        foreach ($categories as $cateChild) {
            if ($id == $cateChild->id){
                $this->html .= "<option selected value='$cateChild->id'>" . $text . $cateChild->name . "</option>";
            }else{
                $this->html .= "<option  value='$cateChild->id'>" . $text . $cateChild->name . "</option>";
            }

            $this->getAdd($cateChild->id, $text . '--');
        }
        return $this->html;
    }
}

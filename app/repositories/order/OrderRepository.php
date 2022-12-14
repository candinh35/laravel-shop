<?php

namespace App\repositories\order;

use App\Models\Order;
use App\repositories\BaseRepository;

class OrderRepository extends BaseRepository implements OrderRepositoryInterface
{

    public function getModel()
    {
       return Order::class;
    }

    public function getOrder()
    {
       return $this->model->search()->orderByDesc('created_at')->paginate(5);
    }
}

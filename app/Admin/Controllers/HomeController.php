<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use OpenAdmin\Admin\Admin;
use OpenAdmin\Admin\Controllers\Dashboard;
use OpenAdmin\Admin\Layout\Column;
use OpenAdmin\Admin\Layout\Content;
use OpenAdmin\Admin\Layout\Row;
use App\Models\Orders;
use App\Http\Controllers\OrderController;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        $orders = OrderController::GetNumberOfOrder();
        return $content
            ->css_file(Admin::asset("open-admin/css/pages/dashboard.css"))
            ->title('Dashboard')
            ->description('Description...')
            ->row(function (Row $row) use ($orders) {
                $row->column(3, function (Column $column) use ($orders) {
                    // $column->append(view('index'));
                });
                
            });
    }
}


?>
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
            // ->description('Dashboard')
            ->row(function (Row $row) use ($orders) {
                $row->column(12, function (Column $column) use ($orders) {
                    $column->append(Dashboard::orders());
                });
                $row->column(12, function (Column $column) use ($orders) {
                    $column->append(Dashboard::product());
                });

            })->row(function (Row $row) use ($orders) {
                $row->column(8, function (Column $column) use ($orders) {
                    $column->append(Dashboard::sales());
                });
                $row->column(4, function (Column $column) use ($orders) {
                    $column->append(Dashboard::pie());
                });
            });
    }
}
?>
<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Orders;
use App\Models\Address;

class OrdersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Orders';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Orders());
        $grid->column('id', __('Id'));
        $grid->column('userId', __('UserId'))->display(function ($userId) {
            return "<a style='text-decoration: none' href='/admin/users/{$userId}'>{$userId}</a>";
        });
        $grid->column('status', __('Status'));
        $grid->column('paymentMethod', __('PaymentMethod'));
        $grid->column('addressID', __('AddressID'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        $grid->column('totalPrice', __('TotalPrice'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Orders::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('userId', __('UserId'))->as(function ($userId) {
            return "<a href='/admin/users/{$userId}'>{$userId}</a>";
        })->asHtml();
        $show->field('status', __('Status'));
        $show->field('paymentMethod', __('PaymentMethod'));
        $show->field('addressID', __('AddressID'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('totalPrice', __('TotalPrice'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Orders());

        // $form->number('userId', __('UserId'));
        $form->select('status', __('Status'))
            ->options([
                'Pending' => 'Pending',
                'Picked up' => 'Picked up',
                'Delivered' => 'Delivered',
                'Cancelled' => 'Cancelled',
            ])
            ->default(function ($form) {
                return $form->model()->status;
            });
        $form->select('paymentMethod', __('PaymentMethod'))
            ->options([
                'Pay at our store' => 'Pay at our store',
                'Cash on delivery (COD)' => 'Cash on delivery (COD)',
                'Banking' => 'Banking',
            ])
            ->default(function ($form) {
                return $form->model()->paymentMethod;
            });
        // $form->number('addressID', __('AddressID'));
        // $form->display('User Address', function ($value) {
        //     return $this->user->address->address_field;
        // });
        $form->select('addressID', __('Address'))
            ->options(function ($id) use ($form) {
                // $userId = $this->user;
                // return Address::where('userID', $userId)->pluck('*');
            })
            ->default(function ($form) {
                return $form->model()->addressID;
            });
        $form->decimal('totalPrice', __('TotalPrice'));

        return $form;
    }
}

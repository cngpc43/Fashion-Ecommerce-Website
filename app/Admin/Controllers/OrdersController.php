<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Orders;
use App\Models\Address;
use Illuminate\Support\Facades\Validator;

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
        $grid->model()->join('addresses', 'orders.addressID', '=', 'addresses.id')->select('orders.*', 'addresses.receiver', 'addresses.phone', 'addresses.street', 'addresses.ward', 'addresses.city');
        $grid->column('id', __('Id'));
        $grid->column('userId', __('UserId'))->display(function ($userId) {
            return "<a style='text-decoration: none' href='/admin/users/{$userId}'>{$userId}</a>";
        });
        $grid->column('status', __('Status'));
        $grid->column('paymentMethod', __('PaymentMethod'));
        $grid->column('address.receiver', __('Receiver'));
        $grid->column('address.phone', __('Phone'));
        $grid->column('address.street', __('Street'));
        $grid->column('address.ward', __('Ward'));
        $grid->column('address.city', __('City'));
        $grid->column('totalPrice', __('TotalPrice'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $order = Orders::join('addresses', 'orders.addressID', '=', 'addresses.id')
            ->where('orders.id', $id)
            ->select('orders.*', 'addresses.receiver', 'addresses.phone', 'addresses.street', 'addresses.ward', 'addresses.city')->firstOrFail();
        $show = new Show($order);
        $show->field('id', __('Id'));
        $show->field('userId', __('UserId'))->unescape()->as(function ($userId) {
            return "<a href='/admin/users/{$userId}'>{$userId}</a>";
        });
        $show->field('status', __('Status'));
        $show->field('paymentMethod', __('PaymentMethod'));
        $show->field('address.receiver', __('Receiver'));
        $show->field('address.phone', __('Phone'));
        $show->field('address.street', __('Street'));
        $show->field('address.ward', __('Ward'));
        $show->field('address.city', __('City'));
        $show->field('totalPrice', __('TotalPrice'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {

        $order = Orders::join('addresses', 'orders.addressID', '=', 'addresses.id')
            // ->where('orders.id', $this->getKey())
            ->select('orders.*', 'addresses.receiver', 'addresses.phone', 'addresses.street', 'addresses.ward', 'addresses.city')->firstOrFail();
        $form = new Form($order);

        $form->saving(function (Form $form) {
            // Get the original status before the form was submitted
            $originalStatus = $form->model()->getOriginal('status');

            // If the order is canceled, don't let the admin edit
            if ($originalStatus === 'Canceled') {
                throw new \Exception('Cannot edit a canceled order.');
            }

            // If the order is picked up, don't let the user change to previous
            if ($originalStatus === 'Picked up' && $form->status === 'Pending') {
                throw new \Exception('Cannot change the status from "Picked up" to "Pending".');
            }
            if ($originalStatus === 'Delivered' && ($form->status === 'Pending' || $form->status === 'Picked up')) {
                throw new \Exception('Cannot change the status from "Delivered" to "Pending".');
            }
        });

        $form->text('userId', __('UserId'))->disable();
        $form->select('status', __('Status'))
            ->options([
                'Pending' => 'Pending',
                'Picked up' => 'Picked up',
                'Delivered' => 'Delivered',
                'Canceled' => 'Canceled',
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
        $form->text('address.receiver', __('Receiver'));
        $form->text('address.phone', __('Phone'));
        $form->text('address.street', __('Street'));
        $form->text('address.ward', __('Ward'));
        $form->text('address.city', __('City'));
        $form->decimal('totalPrice', __('TotalPrice'));

        return $form;
    }
}

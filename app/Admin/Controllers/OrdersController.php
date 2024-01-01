<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Orders;

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
        $grid->column('userId', __('UserId'));
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
        $show->field('userId', __('UserId'));
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

        $form->number('userId', __('UserId'));
        $form->text('status', __('Status'));
        $form->textarea('paymentMethod', __('PaymentMethod'));
        $form->number('addressID', __('AddressID'));
        $form->decimal('totalPrice', __('TotalPrice'));

        return $form;
    }
}

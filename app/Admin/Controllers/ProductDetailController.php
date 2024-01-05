<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\ProductDetail;

class ProductDetailController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ProductDetail';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ProductDetail());

        $grid->column('productDetailId', __('ProductDetailId'));
        $grid->column('productId', __('ProductId'));
        $grid->column('img', __('Img'));
        $grid->column('size', __('Size'));
        $grid->column('color', __('Color'));
        $grid->column('stock', __('Stock'));
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
        $show = new Show(ProductDetail::findOrFail($id));

        $show->field('productDetailId', __('ProductDetailId'));
        $show->field('productId', __('ProductId'));
        $show->field('img', __('Img'));
        $show->field('size', __('Size'));
        $show->field('color', __('Color'));
        $show->field('stock', __('Stock'));
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
        $form = new Form(new ProductDetail());

        $form->number('productDetailId', __('ProductDetailId'));
        $form->number('productId', __('ProductId'));
        $form->text('img', __('Img'));
        $form->text('size', __('Size'));
        $form->color('color', __('Color'));
        $form->number('stock', __('Stock'));

        return $form;
    }
}

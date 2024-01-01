<?php

namespace App\Admin\Controllers;

use OpenAdmin\Admin\Controllers\AdminController;
use OpenAdmin\Admin\Form;
use OpenAdmin\Admin\Grid;
use OpenAdmin\Admin\Show;
use \App\Models\Product;

class AdminProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('productId', __('ProductId'));
        $grid->column('name', __('Name'));
        $grid->column('categoryId', __('CategoryId'));
        $grid->column('collectionId', __('CollectionId'));
        $grid->column('price', __('Price'));
        $grid->column('description', __('Description'));
        $grid->column('salePercent', __('SalePercent'));
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
        $show = new Show(Product::findOrFail($id));

        $show->field('productId', __('ProductId'));
        $show->field('name', __('Name'));
        $show->field('categoryId', __('CategoryId'));
        $show->field('collectionId', __('CollectionId'));
        $show->field('price', __('Price'));
        $show->field('description', __('Description'));
        $show->field('salePercent', __('SalePercent'));
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
        $form = new Form(new Product());

        $form->text('name', __('Name'));
        $form->number('categoryId', __('CategoryId'));
        $form->number('collectionId', __('CollectionId'));
        $form->number('price', __('Price'));
        $form->text('description', __('Description'));
        $form->number('salePercent', __('SalePercent'));

        return $form;
    }
}

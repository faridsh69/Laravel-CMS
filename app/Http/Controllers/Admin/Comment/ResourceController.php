<?php

namespace App\Http\Controllers\Admin\Comment;

use App\Base\BaseListController;

class ResourceController extends BaseListController
{
    public $model = 'Comment';

 	// $user = App\User::first();
	// $product = App\Product::first();

	// // $user->comment(Commentable $model, $comment = '', $rate = 0);
	// $user->comment($product, 'Lorem ipsum ..', 3);

	// // approve it -- if the user model `canCommentWithoutApprove()` or you don't use `mustBeApproved()`, it is not necessary
	// $product->comments[0]->approve();

	// $product->averageRate();

	// $product->totalCommentsCount();
}

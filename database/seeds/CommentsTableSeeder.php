<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment_admin = new Comment();
        $comment_admin->comment = 'This is a comment made by the Administrator';
        $comment_admin->user_id = 1;
        $comment_admin->save();

        $comment_sub = new Comment();
        $comment_sub->comment = 'This is a comment made by the Subscriber';
        $comment_sub->user_id = 2;
        $comment_sub->save();
    }
}

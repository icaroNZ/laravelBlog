<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog_published = new Blog();
        $blog_published->title = 'Published Blog';
        $blog_published->body = 'This is a example of a published blog, the body of the blog is limited to a minimun and maximum size while the tile is only required ';
        $blog_published->status = 1;
        $blog_published->save();

        $blog_draft = new Blog();
        $blog_draft->title = 'Draft Blog';
        $blog_draft->body = 'This is a example of a draft blog, all blogs default to draft mode until a Administrator publishs it';
        $blog_draft->status = 0;
        $blog_draft->save();

        DB::table('blog_comment')->insert([
            'blog_id' => 1,
            'comment_id' => 1
        ]);
        DB::table('blog_comment')->insert([
            'blog_id' => 1,
            'comment_id' => 2
        ]);

        DB::table('blog_category')->insert([
            'blog_id' => 1,
            'category_id' => 1
        ]);
        DB::table('blog_category')->insert([
            'blog_id' => 1,
            'category_id' => 2
        ]);
        DB::table('blog_category')->insert([
            'blog_id' => 1,
            'category_id' => 3
        ]);
        DB::table('blog_category')->insert([
            'blog_id' => 2,
            'category_id' => 1
        ]);
    }
}

<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Blog;

class BaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = User::first();

        $this->actingAs($user);

        $this
            ->get(route('admin.blog.pdf'))
            ->assertStatus(200);

        $this
            ->get(route('admin.blog.print'))
            ->assertStatus(200);

        $this
            ->get(route('admin.blog.export'))
            ->assertStatus(200);

        $this
            ->get(route('admin.blog.redirect'))
            ->assertStatus(302);

        $this
            ->get(route('admin.blog.datatable'))
            ->assertStatus(200);

	    $this
	        ->get(route('admin.blog.list.index'))
	        ->assertStatus(200);

	    $this
	        ->get(route('admin.blog.list.create'))
	        ->assertStatus(200);

        $fake_blog = factory(Blog::class)->raw();

        $this
        	->post(route('admin.blog.list.store', $fake_blog))
        	->assertStatus(302);

        $blog = Blog::orderBy('id', 'desc')->first();

        $this
        	->get(route('admin.blog.list.show', $blog))
        	->assertStatus(200);

        $this
        	->get(route('admin.blog.list.edit', $blog))
        	->assertStatus(200);

    	$fake_blog['title'] = rand(100, 10000);

        $this
        	->put(route('admin.blog.list.update', $blog), $fake_blog)
        	->assertStatus(302);

        $this
        	->delete(route('admin.blog.list.destroy', $blog))
        	->assertStatus(302);
    }
}

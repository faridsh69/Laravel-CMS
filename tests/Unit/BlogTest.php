<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Blog;

class BlogTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();

        $this->actingAs($user);

	    $this
	        ->get('/blog/list')
	        ->assertStatus(200);

	    $this
	        ->get('/blog/list/create')
	        ->assertStatus(200);

        $fake_blog = factory(Blog::class)->raw();

        $this
        	->post('/blog/list', $fake_blog)
        	->assertStatus(302);

        $blog = Blog::orderBy('id', 'desc')->first();

        $this
        	->get('/blog/list/' . $blog->id)
        	->assertStatus(200);

        $this
        	->get('/blog/list/' . $blog->id . '/edit')
        	->assertStatus(200);

    	$fake_blog['title'] = 'title';

        $this
        	->put('/blog/list/' . $blog->id , $fake_blog)
        	->assertStatus(302);

        $this
        	->delete('/blog/list/' . $blog->id)
        	->assertStatus(302);
    }
}

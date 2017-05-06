<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Post;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    public function test_Get_All_Posts_Status()
    {
        $response = $this->get('/api/posts');

        $response->assertStatus(200);
    }

    public function test_Count_Number_Of_Posts_DB_VS_API()
    {
        $response = $this->get('/api/posts');
        $allPostsCountDB = count(Post::all());
        $allPostsCountAPI = count(json_decode($response->content(), true));

        $this->assertGreaterThanOrEqual($allPostsCountDB, $allPostsCountAPI);
    }

    public function test_If_Key_Contained_In_Returned_JSON()
    {
        $response = $this->get('/api/posts');
        $arrayItem = json_decode($response->content(), true)[0];

        $this->assertArrayHasKey('body', $arrayItem);
    }
    
}

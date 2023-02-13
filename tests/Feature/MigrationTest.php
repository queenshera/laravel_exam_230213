<?php

namespace Tests\Feature;

use App\Models\Blog;
use Carbon\Carbon;
use Database\Seeders\BlogSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_task6()
    {
        $data = [
            'blogTitle' => 'test blog 1',
            'blogDetails' => 'this is test blog 1',
            'blogAuthor' => 'author 1',
            'blogDate' => Carbon::now()->format('d-M-Y H:i'),
        ];

        Blog::create($data);

        $this->assertDatabaseHas('blogs', $data);
    }

    public function test_task7()
    {
        $this->seed(BlogSeeder::class);
        $this->assertDatabaseCount('blogs', 40);
    }

    public function test_task8()
    {
        $this->seed(BlogSeeder::class);
        $this->assertDatabaseCount('blogs', 40);

        $newData = [
            'blogTitle' => 'this is blog is used for testing'
        ];
        $blog = Blog::first();

        Blog::where('id', $blog->id)->update($newData);

        $this->assertDatabaseHas('blogs', $newData);
    }

    public function test_task9()
    {
        $this->seed(BlogSeeder::class);
        $this->assertDatabaseCount('blogs', 40);

        $blog = Blog::first();

        Blog::where('id', $blog->id)->delete();

        $this->assertDatabaseCount('blogs', 39);
    }
}

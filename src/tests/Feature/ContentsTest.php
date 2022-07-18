<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\contents;

class ContentsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function getContentsList()
    {
        // テストデータの登録
        $contents = contents::factory()->count(10)->create();
        
        $response = $this->get('api/contents');

        $response
            ->assertStatus(200)
            ->assertJsonCount($contents->count());
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function storeContentsData()
    {   
        // テストデータの作成
        $data = [
            'title' => 'テストコンテンツ',
            'detail' => 'テスト詳細',
            'created_by' => 'test',
            'updated_by' => 'test'
        ];

        $expected = [
            'result' => 'success'
        ];

        $response = $this->postJson('api/contents', $data);

        $response
            ->assertStatus(201)
            ->assertJsonFragment($expected);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function cantStoreContentsContentsNull()
    {   
        // テストデータの作成
        $data = [
            'title' => 'テストコンテンツ',
            'detail' => '',
            'created_by' => 'test',
            'updated_by' => 'test'
        ];

        $response = $this->postJson('api/contents', $data);

        $response
            ->assertStatus(422)
            ->assertJsonValidationErrors(
                ['detail' => '詳細 は必須です。']
            );
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function updateContentsData()
    {   
        // テストデータの作成
        $contents = contents::factory()->create();
        
        $contents->title = 'update_title';
        $contents->detail = 'update_detail';
        $contents->created_by = 'update_api';
        $contents->updated_by = 'update_api';
        $contents->updated_at = now();

        $expected = [
            'result' => 'success'
        ];

        $response = $this->patchJson("api/contents/{$contents->id}", $contents->toArray());

        $response
            ->assertStatus(200)
            ->assertJsonFragment($expected);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function deleteContentsData()
    {   
        // テストデータの登録
        $contents = contents::factory()->count(10)->create();

        $expected = [
            'result' => 'success'
        ];

        $response = $this->deleteJson("api/contents/13");

        $response->assertStatus(200);
        $response->assertJsonFragment($expected);

        $response = $this->getJson('api/contents');
        $response->assertJsonCount($contents->count() - 1);
    }
}

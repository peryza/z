<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\sochi;

class sochiApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sochi()
    {
        $sochi = factory(sochi::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sochis', $sochi
        );

        $this->assertApiResponse($sochi);
    }

    /**
     * @test
     */
    public function test_read_sochi()
    {
        $sochi = factory(sochi::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/sochis/'.$sochi->id
        );

        $this->assertApiResponse($sochi->toArray());
    }

    /**
     * @test
     */
    public function test_update_sochi()
    {
        $sochi = factory(sochi::class)->create();
        $editedsochi = factory(sochi::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sochis/'.$sochi->id,
            $editedsochi
        );

        $this->assertApiResponse($editedsochi);
    }

    /**
     * @test
     */
    public function test_delete_sochi()
    {
        $sochi = factory(sochi::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sochis/'.$sochi->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sochis/'.$sochi->id
        );

        $this->response->assertStatus(404);
    }
}

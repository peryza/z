<?php namespace Tests\Repositories;

use App\Models\sochi;
use App\Repositories\sochiRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class sochiRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var sochiRepository
     */
    protected $sochiRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->sochiRepo = \App::make(sochiRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sochi()
    {
        $sochi = factory(sochi::class)->make()->toArray();

        $createdsochi = $this->sochiRepo->create($sochi);

        $createdsochi = $createdsochi->toArray();
        $this->assertArrayHasKey('id', $createdsochi);
        $this->assertNotNull($createdsochi['id'], 'Created sochi must have id specified');
        $this->assertNotNull(sochi::find($createdsochi['id']), 'sochi with given id must be in DB');
        $this->assertModelData($sochi, $createdsochi);
    }

    /**
     * @test read
     */
    public function test_read_sochi()
    {
        $sochi = factory(sochi::class)->create();

        $dbsochi = $this->sochiRepo->find($sochi->id);

        $dbsochi = $dbsochi->toArray();
        $this->assertModelData($sochi->toArray(), $dbsochi);
    }

    /**
     * @test update
     */
    public function test_update_sochi()
    {
        $sochi = factory(sochi::class)->create();
        $fakesochi = factory(sochi::class)->make()->toArray();

        $updatedsochi = $this->sochiRepo->update($fakesochi, $sochi->id);

        $this->assertModelData($fakesochi, $updatedsochi->toArray());
        $dbsochi = $this->sochiRepo->find($sochi->id);
        $this->assertModelData($fakesochi, $dbsochi->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sochi()
    {
        $sochi = factory(sochi::class)->create();

        $resp = $this->sochiRepo->delete($sochi->id);

        $this->assertTrue($resp);
        $this->assertNull(sochi::find($sochi->id), 'sochi should not exist in DB');
    }
}

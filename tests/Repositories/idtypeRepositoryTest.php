<?php namespace Tests\Repositories;

use App\Models\idtype;
use App\Repositories\idtypeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class idtypeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var idtypeRepository
     */
    protected $idtypeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->idtypeRepo = \App::make(idtypeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_idtype()
    {
        $idtype = factory(idtype::class)->make()->toArray();

        $createdidtype = $this->idtypeRepo->create($idtype);

        $createdidtype = $createdidtype->toArray();
        $this->assertArrayHasKey('id', $createdidtype);
        $this->assertNotNull($createdidtype['id'], 'Created idtype must have id specified');
        $this->assertNotNull(idtype::find($createdidtype['id']), 'idtype with given id must be in DB');
        $this->assertModelData($idtype, $createdidtype);
    }

    /**
     * @test read
     */
    public function test_read_idtype()
    {
        $idtype = factory(idtype::class)->create();

        $dbidtype = $this->idtypeRepo->find($idtype->id);

        $dbidtype = $dbidtype->toArray();
        $this->assertModelData($idtype->toArray(), $dbidtype);
    }

    /**
     * @test update
     */
    public function test_update_idtype()
    {
        $idtype = factory(idtype::class)->create();
        $fakeidtype = factory(idtype::class)->make()->toArray();

        $updatedidtype = $this->idtypeRepo->update($fakeidtype, $idtype->id);

        $this->assertModelData($fakeidtype, $updatedidtype->toArray());
        $dbidtype = $this->idtypeRepo->find($idtype->id);
        $this->assertModelData($fakeidtype, $dbidtype->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_idtype()
    {
        $idtype = factory(idtype::class)->create();

        $resp = $this->idtypeRepo->delete($idtype->id);

        $this->assertTrue($resp);
        $this->assertNull(idtype::find($idtype->id), 'idtype should not exist in DB');
    }
}

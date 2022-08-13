<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\idtype;

class idtypeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_idtype()
    {
        $idtype = factory(idtype::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/idtypes', $idtype
        );

        $this->assertApiResponse($idtype);
    }

    /**
     * @test
     */
    public function test_read_idtype()
    {
        $idtype = factory(idtype::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/idtypes/'.$idtype->id
        );

        $this->assertApiResponse($idtype->toArray());
    }

    /**
     * @test
     */
    public function test_update_idtype()
    {
        $idtype = factory(idtype::class)->create();
        $editedidtype = factory(idtype::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/idtypes/'.$idtype->id,
            $editedidtype
        );

        $this->assertApiResponse($editedidtype);
    }

    /**
     * @test
     */
    public function test_delete_idtype()
    {
        $idtype = factory(idtype::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/idtypes/'.$idtype->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/idtypes/'.$idtype->id
        );

        $this->response->assertStatus(404);
    }
}

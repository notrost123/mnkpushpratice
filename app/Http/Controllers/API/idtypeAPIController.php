<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateidtypeAPIRequest;
use App\Http\Requests\API\UpdateidtypeAPIRequest;
use App\Models\idtype;
use App\Repositories\idtypeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class idtypeController
 * @package App\Http\Controllers\API
 */

class idtypeAPIController extends AppBaseController
{
    /** @var  idtypeRepository */
    private $idtypeRepository;

    public function __construct(idtypeRepository $idtypeRepo)
    {
        $this->idtypeRepository = $idtypeRepo;
    }

    /**
     * Display a listing of the idtype.
     * GET|HEAD /idtypes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $idtypes = $this->idtypeRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($idtypes->toArray(), 'Idtypes retrieved successfully');
    }

    /**
     * Store a newly created idtype in storage.
     * POST /idtypes
     *
     * @param CreateidtypeAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateidtypeAPIRequest $request)
    {
        $input = $request->all();

        $idtype = $this->idtypeRepository->create($input);

        return $this->sendResponse($idtype->toArray(), 'Idtype saved successfully');
    }

    /**
     * Display the specified idtype.
     * GET|HEAD /idtypes/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var idtype $idtype */
        $idtype = $this->idtypeRepository->find($id);

        if (empty($idtype)) {
            return $this->sendError('Idtype not found');
        }

        return $this->sendResponse($idtype->toArray(), 'Idtype retrieved successfully');
    }

    /**
     * Update the specified idtype in storage.
     * PUT/PATCH /idtypes/{id}
     *
     * @param int $id
     * @param UpdateidtypeAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateidtypeAPIRequest $request)
    {
        $input = $request->all();

        /** @var idtype $idtype */
        $idtype = $this->idtypeRepository->find($id);

        if (empty($idtype)) {
            return $this->sendError('Idtype not found');
        }

        $idtype = $this->idtypeRepository->update($input, $id);

        return $this->sendResponse($idtype->toArray(), 'idtype updated successfully');
    }

    /**
     * Remove the specified idtype from storage.
     * DELETE /idtypes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var idtype $idtype */
        $idtype = $this->idtypeRepository->find($id);

        if (empty($idtype)) {
            return $this->sendError('Idtype not found');
        }

        $idtype->delete();

        return $this->sendSuccess('Idtype deleted successfully');
    }
}

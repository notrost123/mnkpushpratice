<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateidtypeRequest;
use App\Http\Requests\UpdateidtypeRequest;
use App\Repositories\idtypeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class idtypeController extends AppBaseController
{
    /** @var  idtypeRepository */
    private $idtypeRepository;

    public function __construct(idtypeRepository $idtypeRepo)
    {
        $this->idtypeRepository = $idtypeRepo;
    }

    /**
     * Display a listing of the idtype.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $idtypes = $this->idtypeRepository->all();

        return view('idtypes.index')
            ->with('idtypes', $idtypes);
    }

    /**
     * Show the form for creating a new idtype.
     *
     * @return Response
     */
    public function create()
    {
        return view('idtypes.create');
    }

    /**
     * Store a newly created idtype in storage.
     *
     * @param CreateidtypeRequest $request
     *
     * @return Response
     */
    public function store(CreateidtypeRequest $request)
    {
        $input = $request->all();

        $idtype = $this->idtypeRepository->create($input);

        Flash::success('Idtype saved successfully.');

        return redirect(route('idtypes.index'));
    }

    /**
     * Display the specified idtype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $idtype = $this->idtypeRepository->find($id);

        if (empty($idtype)) {
            Flash::error('Idtype not found');

            return redirect(route('idtypes.index'));
        }

        return view('idtypes.show')->with('idtype', $idtype);
    }

    /**
     * Show the form for editing the specified idtype.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $idtype = $this->idtypeRepository->find($id);

        if (empty($idtype)) {
            Flash::error('Idtype not found');

            return redirect(route('idtypes.index'));
        }

        return view('idtypes.edit')->with('idtype', $idtype);
    }

    /**
     * Update the specified idtype in storage.
     *
     * @param int $id
     * @param UpdateidtypeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateidtypeRequest $request)
    {
        $idtype = $this->idtypeRepository->find($id);

        if (empty($idtype)) {
            Flash::error('Idtype not found');

            return redirect(route('idtypes.index'));
        }

        $idtype = $this->idtypeRepository->update($request->all(), $id);

        Flash::success('Idtype updated successfully.');

        return redirect(route('idtypes.index'));
    }

    /**
     * Remove the specified idtype from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $idtype = $this->idtypeRepository->find($id);

        if (empty($idtype)) {
            Flash::error('Idtype not found');

            return redirect(route('idtypes.index'));
        }

        $this->idtypeRepository->delete($id);

        Flash::success('Idtype deleted successfully.');

        return redirect(route('idtypes.index'));
    }
}

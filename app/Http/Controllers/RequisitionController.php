<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequisitionRequest;
use App\Http\Requests\UpdateRequisitionRequest;
use App\Repositories\RequisitionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

use App\SysOfficialNo;

class RequisitionController extends AppBaseController
{
    /** @var  RequisitionRepository */
    private $requisitionRepository;

    public function __construct(RequisitionRepository $requisitionRepo)
    {
        $this->requisitionRepository = $requisitionRepo;
    }

    /**
     * Display a listing of the Requisition.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $requisitions = $this->requisitionRepository->all();

        return view('requisitions.index')
            ->with('requisitions', $requisitions);
    }

    /**
     * Show the form for creating a new Requisition.
     *
     * @return Response
     */
    public function create()
    {
        // add the current sys_official_nos.requisition_ctrl_no as default vaLue
        // it should be hidden and should also be shown as span in create.blade

        $txtReqCtrlNo = SysOfficialNo::select('requisition_ctrl_no')->limit(1)->get(); 
        $txtReqCtrlNo = $txtReqCtrlNo[0]; 

        
        return view('requisitions.create')->with('txtReqCtrlNo',  $txtReqCtrlNo);
    }

    /**
     * Store a newly created Requisition in storage.
     *
     * @param CreateRequisitionRequest $request
     *
     * @return Response
     */
    public function store(CreateRequisitionRequest $request)
    {
        $input = $request->all();

        $requisition = $this->requisitionRepository->create($input);

        Flash::success('Requisition saved successfully.');

        return redirect(route('requisitions.index'));
    }

    /**
     * Display the specified Requisition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $requisition = $this->requisitionRepository->find($id);

        if (empty($requisition)) {
            Flash::error('Requisition not found');

            return redirect(route('requisitions.index'));
        }

        return view('requisitions.show')->with('requisition', $requisition);
    }

    /**
     * Show the form for editing the specified Requisition.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $requisition = $this->requisitionRepository->find($id);

        if (empty($requisition)) {
            Flash::error('Requisition not found');

            return redirect(route('requisitions.index'));
        }

        return view('requisitions.edit')->with('requisition', $requisition);
    }

    /**
     * Update the specified Requisition in storage.
     *
     * @param int $id
     * @param UpdateRequisitionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRequisitionRequest $request)
    {
        $requisition = $this->requisitionRepository->find($id);

        if (empty($requisition)) {
            Flash::error('Requisition not found');

            return redirect(route('requisitions.index'));
        }

        $requisition = $this->requisitionRepository->update($request->all(), $id);

        Flash::success('Requisition updated successfully.');

        return redirect(route('requisitions.index'));
    }

    /**
     * Remove the specified Requisition from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $requisition = $this->requisitionRepository->find($id);

        if (empty($requisition)) {
            Flash::error('Requisition not found');

            return redirect(route('requisitions.index'));
        }

        $this->requisitionRepository->delete($id);

        Flash::success('Requisition deleted successfully.');

        return redirect(route('requisitions.index'));
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecskaAPIRequest;
use App\Http\Requests\API\UpdatecskaAPIRequest;
use App\Models\cska;
use App\Repositories\cskaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class cskaController
 * @package App\Http\Controllers\API
 */

class cskaAPIController extends AppBaseController
{
    /** @var  cskaRepository */
    private $cskaRepository;

    public function __construct(cskaRepository $cskaRepo)
    {
        $this->cskaRepository = $cskaRepo;
    }

    /**
     * Display a listing of the cska.
     * GET|HEAD /cskas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cskas = $this->cskaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cskas->toArray(), 'Cskas retrieved successfully');
    }

    /**
     * Store a newly created cska in storage.
     * POST /cskas
     *
     * @param CreatecskaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecskaAPIRequest $request)
    {
        $input = $request->all();

        $cska = $this->cskaRepository->create($input);

        return $this->sendResponse($cska->toArray(), 'Cska saved successfully');
    }

    /**
     * Display the specified cska.
     * GET|HEAD /cskas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var cska $cska */
        $cska = $this->cskaRepository->find($id);

        if (empty($cska)) {
            return $this->sendError('Cska not found');
        }

        return $this->sendResponse($cska->toArray(), 'Cska retrieved successfully');
    }

    /**
     * Update the specified cska in storage.
     * PUT/PATCH /cskas/{id}
     *
     * @param int $id
     * @param UpdatecskaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecskaAPIRequest $request)
    {
        $input = $request->all();

        /** @var cska $cska */
        $cska = $this->cskaRepository->find($id);

        if (empty($cska)) {
            return $this->sendError('Cska not found');
        }

        $cska = $this->cskaRepository->update($input, $id);

        return $this->sendResponse($cska->toArray(), 'cska updated successfully');
    }

    /**
     * Remove the specified cska from storage.
     * DELETE /cskas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var cska $cska */
        $cska = $this->cskaRepository->find($id);

        if (empty($cska)) {
            return $this->sendError('Cska not found');
        }

        $cska->delete();

        return $this->sendResponse($id, 'Cska deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAsdAPIRequest;
use App\Http\Requests\API\UpdateAsdAPIRequest;
use App\Models\Asd;
use App\Repositories\AsdRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AsdController
 * @package App\Http\Controllers\API
 */

class AsdAPIController extends AppBaseController
{
    /** @var  AsdRepository */
    private $asdRepository;

    public function __construct(AsdRepository $asdRepo)
    {
        $this->asdRepository = $asdRepo;
    }

    /**
     * Display a listing of the Asd.
     * GET|HEAD /asds
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $asds = $this->asdRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($asds->toArray(), 'Asds retrieved successfully');
    }

    /**
     * Store a newly created Asd in storage.
     * POST /asds
     *
     * @param CreateAsdAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAsdAPIRequest $request)
    {
        $input = $request->all();

        $asd = $this->asdRepository->create($input);

        return $this->sendResponse($asd->toArray(), 'Asd saved successfully');
    }

    /**
     * Display the specified Asd.
     * GET|HEAD /asds/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Asd $asd */
        $asd = $this->asdRepository->find($id);

        if (empty($asd)) {
            return $this->sendError('Asd not found');
        }

        return $this->sendResponse($asd->toArray(), 'Asd retrieved successfully');
    }

    /**
     * Update the specified Asd in storage.
     * PUT/PATCH /asds/{id}
     *
     * @param int $id
     * @param UpdateAsdAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAsdAPIRequest $request)
    {
        $input = $request->all();

        /** @var Asd $asd */
        $asd = $this->asdRepository->find($id);

        if (empty($asd)) {
            return $this->sendError('Asd not found');
        }

        $asd = $this->asdRepository->update($input, $id);

        return $this->sendResponse($asd->toArray(), 'Asd updated successfully');
    }

    /**
     * Remove the specified Asd from storage.
     * DELETE /asds/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Asd $asd */
        $asd = $this->asdRepository->find($id);

        if (empty($asd)) {
            return $this->sendError('Asd not found');
        }

        $asd->delete();

        return $this->sendResponse($id, 'Asd deleted successfully');
    }
}

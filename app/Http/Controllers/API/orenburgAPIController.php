<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateorenburgAPIRequest;
use App\Http\Requests\API\UpdateorenburgAPIRequest;
use App\Models\orenburg;
use App\Repositories\orenburgRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class orenburgController
 * @package App\Http\Controllers\API
 */

class orenburgAPIController extends AppBaseController
{
    /** @var  orenburgRepository */
    private $orenburgRepository;

    public function __construct(orenburgRepository $orenburgRepo)
    {
        $this->orenburgRepository = $orenburgRepo;
    }

    /**
     * Display a listing of the orenburg.
     * GET|HEAD /orenburgs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $orenburgs = $this->orenburgRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($orenburgs->toArray(), 'Orenburgs retrieved successfully');
    }

    /**
     * Store a newly created orenburg in storage.
     * POST /orenburgs
     *
     * @param CreateorenburgAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateorenburgAPIRequest $request)
    {
        $input = $request->all();

        $orenburg = $this->orenburgRepository->create($input);

        return $this->sendResponse($orenburg->toArray(), 'Orenburg saved successfully');
    }

    /**
     * Display the specified orenburg.
     * GET|HEAD /orenburgs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var orenburg $orenburg */
        $orenburg = $this->orenburgRepository->find($id);

        if (empty($orenburg)) {
            return $this->sendError('Orenburg not found');
        }

        return $this->sendResponse($orenburg->toArray(), 'Orenburg retrieved successfully');
    }

    /**
     * Update the specified orenburg in storage.
     * PUT/PATCH /orenburgs/{id}
     *
     * @param int $id
     * @param UpdateorenburgAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateorenburgAPIRequest $request)
    {
        $input = $request->all();

        /** @var orenburg $orenburg */
        $orenburg = $this->orenburgRepository->find($id);

        if (empty($orenburg)) {
            return $this->sendError('Orenburg not found');
        }

        $orenburg = $this->orenburgRepository->update($input, $id);

        return $this->sendResponse($orenburg->toArray(), 'orenburg updated successfully');
    }

    /**
     * Remove the specified orenburg from storage.
     * DELETE /orenburgs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var orenburg $orenburg */
        $orenburg = $this->orenburgRepository->find($id);

        if (empty($orenburg)) {
            return $this->sendError('Orenburg not found');
        }

        $orenburg->delete();

        return $this->sendResponse($id, 'Orenburg deleted successfully');
    }
}

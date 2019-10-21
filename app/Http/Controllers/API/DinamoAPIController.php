<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDinamoAPIRequest;
use App\Http\Requests\API\UpdateDinamoAPIRequest;
use App\Models\Dinamo;
use App\Repositories\DinamoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DinamoController
 * @package App\Http\Controllers\API
 */

class DinamoAPIController extends AppBaseController
{
    /** @var  DinamoRepository */
    private $dinamoRepository;

    public function __construct(DinamoRepository $dinamoRepo)
    {
        $this->dinamoRepository = $dinamoRepo;
    }

    /**
     * Display a listing of the Dinamo.
     * GET|HEAD /dinamos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dinamos = $this->dinamoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($dinamos->toArray(), 'Dinamos retrieved successfully');
    }

    /**
     * Store a newly created Dinamo in storage.
     * POST /dinamos
     *
     * @param CreateDinamoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDinamoAPIRequest $request)
    {
        $input = $request->all();

        $dinamo = $this->dinamoRepository->create($input);

        return $this->sendResponse($dinamo->toArray(), 'Dinamo saved successfully');
    }

    /**
     * Display the specified Dinamo.
     * GET|HEAD /dinamos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dinamo $dinamo */
        $dinamo = $this->dinamoRepository->find($id);

        if (empty($dinamo)) {
            return $this->sendError('Dinamo not found');
        }

        return $this->sendResponse($dinamo->toArray(), 'Dinamo retrieved successfully');
    }

    /**
     * Update the specified Dinamo in storage.
     * PUT/PATCH /dinamos/{id}
     *
     * @param int $id
     * @param UpdateDinamoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDinamoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dinamo $dinamo */
        $dinamo = $this->dinamoRepository->find($id);

        if (empty($dinamo)) {
            return $this->sendError('Dinamo not found');
        }

        $dinamo = $this->dinamoRepository->update($input, $id);

        return $this->sendResponse($dinamo->toArray(), 'Dinamo updated successfully');
    }

    /**
     * Remove the specified Dinamo from storage.
     * DELETE /dinamos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dinamo $dinamo */
        $dinamo = $this->dinamoRepository->find($id);

        if (empty($dinamo)) {
            return $this->sendError('Dinamo not found');
        }

        $dinamo->delete();

        return $this->sendResponse($id, 'Dinamo deleted successfully');
    }
}

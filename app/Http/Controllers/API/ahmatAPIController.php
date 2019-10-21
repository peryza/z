<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateahmatAPIRequest;
use App\Http\Requests\API\UpdateahmatAPIRequest;
use App\Models\ahmat;
use App\Repositories\ahmatRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ahmatController
 * @package App\Http\Controllers\API
 */

class ahmatAPIController extends AppBaseController
{
    /** @var  ahmatRepository */
    private $ahmatRepository;

    public function __construct(ahmatRepository $ahmatRepo)
    {
        $this->ahmatRepository = $ahmatRepo;
    }

    /**
     * Display a listing of the ahmat.
     * GET|HEAD /ahmats
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $ahmats = $this->ahmatRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($ahmats->toArray(), 'Ahmats retrieved successfully');
    }

    /**
     * Store a newly created ahmat in storage.
     * POST /ahmats
     *
     * @param CreateahmatAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateahmatAPIRequest $request)
    {
        $input = $request->all();

        $ahmat = $this->ahmatRepository->create($input);

        return $this->sendResponse($ahmat->toArray(), 'Ahmat saved successfully');
    }

    /**
     * Display the specified ahmat.
     * GET|HEAD /ahmats/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ahmat $ahmat */
        $ahmat = $this->ahmatRepository->find($id);

        if (empty($ahmat)) {
            return $this->sendError('Ahmat not found');
        }

        return $this->sendResponse($ahmat->toArray(), 'Ahmat retrieved successfully');
    }

    /**
     * Update the specified ahmat in storage.
     * PUT/PATCH /ahmats/{id}
     *
     * @param int $id
     * @param UpdateahmatAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateahmatAPIRequest $request)
    {
        $input = $request->all();

        /** @var ahmat $ahmat */
        $ahmat = $this->ahmatRepository->find($id);

        if (empty($ahmat)) {
            return $this->sendError('Ahmat not found');
        }

        $ahmat = $this->ahmatRepository->update($input, $id);

        return $this->sendResponse($ahmat->toArray(), 'ahmat updated successfully');
    }

    /**
     * Remove the specified ahmat from storage.
     * DELETE /ahmats/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ahmat $ahmat */
        $ahmat = $this->ahmatRepository->find($id);

        if (empty($ahmat)) {
            return $this->sendError('Ahmat not found');
        }

        $ahmat->delete();

        return $this->sendResponse($id, 'Ahmat deleted successfully');
    }
}

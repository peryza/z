<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatezenitAPIRequest;
use App\Http\Requests\API\UpdatezenitAPIRequest;
use App\Models\zenit;
use App\Repositories\zenitRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class zenitController
 * @package App\Http\Controllers\API
 */

class zenitAPIController extends AppBaseController
{
    /** @var  zenitRepository */
    private $zenitRepository;

    public function __construct(zenitRepository $zenitRepo)
    {
        $this->zenitRepository = $zenitRepo;
    }

    /**
     * Display a listing of the zenit.
     * GET|HEAD /zenits
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $zenits = $this->zenitRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($zenits->toArray(), 'Zenits retrieved successfully');
    }

    /**
     * Store a newly created zenit in storage.
     * POST /zenits
     *
     * @param CreatezenitAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatezenitAPIRequest $request)
    {
        $input = $request->all();

        $zenit = $this->zenitRepository->create($input);

        return $this->sendResponse($zenit->toArray(), 'Zenit saved successfully');
    }

    /**
     * Display the specified zenit.
     * GET|HEAD /zenits/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var zenit $zenit */
        $zenit = $this->zenitRepository->find($id);

        if (empty($zenit)) {
            return $this->sendError('Zenit not found');
        }

        return $this->sendResponse($zenit->toArray(), 'Zenit retrieved successfully');
    }

    /**
     * Update the specified zenit in storage.
     * PUT/PATCH /zenits/{id}
     *
     * @param int $id
     * @param UpdatezenitAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatezenitAPIRequest $request)
    {
        $input = $request->all();

        /** @var zenit $zenit */
        $zenit = $this->zenitRepository->find($id);

        if (empty($zenit)) {
            return $this->sendError('Zenit not found');
        }

        $zenit = $this->zenitRepository->update($input, $id);

        return $this->sendResponse($zenit->toArray(), 'zenit updated successfully');
    }

    /**
     * Remove the specified zenit from storage.
     * DELETE /zenits/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var zenit $zenit */
        $zenit = $this->zenitRepository->find($id);

        if (empty($zenit)) {
            return $this->sendError('Zenit not found');
        }

        $zenit->delete();

        return $this->sendResponse($id, 'Zenit deleted successfully');
    }
}

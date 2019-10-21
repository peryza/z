<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCska2APIRequest;
use App\Http\Requests\API\UpdateCska2APIRequest;
use App\Models\Cska2;
use App\Repositories\Cska2Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Cska2Controller
 * @package App\Http\Controllers\API
 */

class Cska2APIController extends AppBaseController
{
    /** @var  Cska2Repository */
    private $cska2Repository;

    public function __construct(Cska2Repository $cska2Repo)
    {
        $this->cska2Repository = $cska2Repo;
    }

    /**
     * Display a listing of the Cska2.
     * GET|HEAD /cska2s
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cska2s = $this->cska2Repository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cska2s->toArray(), 'Cska2S retrieved successfully');
    }

    /**
     * Store a newly created Cska2 in storage.
     * POST /cska2s
     *
     * @param CreateCska2APIRequest $request
     *
     * @return Response
     */
    public function store(CreateCska2APIRequest $request)
    {
        $input = $request->all();

        $cska2 = $this->cska2Repository->create($input);

        return $this->sendResponse($cska2->toArray(), 'Cska2 saved successfully');
    }

    /**
     * Display the specified Cska2.
     * GET|HEAD /cska2s/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cska2 $cska2 */
        $cska2 = $this->cska2Repository->find($id);

        if (empty($cska2)) {
            return $this->sendError('Cska2 not found');
        }

        return $this->sendResponse($cska2->toArray(), 'Cska2 retrieved successfully');
    }

    /**
     * Update the specified Cska2 in storage.
     * PUT/PATCH /cska2s/{id}
     *
     * @param int $id
     * @param UpdateCska2APIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCska2APIRequest $request)
    {
        $input = $request->all();

        /** @var Cska2 $cska2 */
        $cska2 = $this->cska2Repository->find($id);

        if (empty($cska2)) {
            return $this->sendError('Cska2 not found');
        }

        $cska2 = $this->cska2Repository->update($input, $id);

        return $this->sendResponse($cska2->toArray(), 'Cska2 updated successfully');
    }

    /**
     * Remove the specified Cska2 from storage.
     * DELETE /cska2s/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cska2 $cska2 */
        $cska2 = $this->cska2Repository->find($id);

        if (empty($cska2)) {
            return $this->sendError('Cska2 not found');
        }

        $cska2->delete();

        return $this->sendResponse($id, 'Cska2 deleted successfully');
    }
}

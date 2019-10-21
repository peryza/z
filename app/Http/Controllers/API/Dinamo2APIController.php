<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDinamo2APIRequest;
use App\Http\Requests\API\UpdateDinamo2APIRequest;
use App\Models\Dinamo2;
use App\Repositories\Dinamo2Repository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class Dinamo2Controller
 * @package App\Http\Controllers\API
 */

class Dinamo2APIController extends AppBaseController
{
    /** @var  Dinamo2Repository */
    private $dinamo2Repository;

    public function __construct(Dinamo2Repository $dinamo2Repo)
    {
        $this->dinamo2Repository = $dinamo2Repo;
    }

    /**
     * Display a listing of the Dinamo2.
     * GET|HEAD /dinamo2s
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dinamo2s = $this->dinamo2Repository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($dinamo2s->toArray(), 'Dinamo2S retrieved successfully');
    }

    /**
     * Store a newly created Dinamo2 in storage.
     * POST /dinamo2s
     *
     * @param CreateDinamo2APIRequest $request
     *
     * @return Response
     */
    public function store(CreateDinamo2APIRequest $request)
    {
        $input = $request->all();

        $dinamo2 = $this->dinamo2Repository->create($input);

        return $this->sendResponse($dinamo2->toArray(), 'Dinamo2 saved successfully');
    }

    /**
     * Display the specified Dinamo2.
     * GET|HEAD /dinamo2s/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dinamo2 $dinamo2 */
        $dinamo2 = $this->dinamo2Repository->find($id);

        if (empty($dinamo2)) {
            return $this->sendError('Dinamo2 not found');
        }

        return $this->sendResponse($dinamo2->toArray(), 'Dinamo2 retrieved successfully');
    }

    /**
     * Update the specified Dinamo2 in storage.
     * PUT/PATCH /dinamo2s/{id}
     *
     * @param int $id
     * @param UpdateDinamo2APIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDinamo2APIRequest $request)
    {
        $input = $request->all();

        /** @var Dinamo2 $dinamo2 */
        $dinamo2 = $this->dinamo2Repository->find($id);

        if (empty($dinamo2)) {
            return $this->sendError('Dinamo2 not found');
        }

        $dinamo2 = $this->dinamo2Repository->update($input, $id);

        return $this->sendResponse($dinamo2->toArray(), 'Dinamo2 updated successfully');
    }

    /**
     * Remove the specified Dinamo2 from storage.
     * DELETE /dinamo2s/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dinamo2 $dinamo2 */
        $dinamo2 = $this->dinamo2Repository->find($id);

        if (empty($dinamo2)) {
            return $this->sendError('Dinamo2 not found');
        }

        $dinamo2->delete();

        return $this->sendResponse($id, 'Dinamo2 deleted successfully');
    }
}

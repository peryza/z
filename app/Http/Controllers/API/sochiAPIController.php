<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesochiAPIRequest;
use App\Http\Requests\API\UpdatesochiAPIRequest;
use App\Models\sochi;
use App\Repositories\sochiRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class sochiController
 * @package App\Http\Controllers\API
 */

class sochiAPIController extends AppBaseController
{
    /** @var  sochiRepository */
    private $sochiRepository;

    public function __construct(sochiRepository $sochiRepo)
    {
        $this->sochiRepository = $sochiRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/sochis",
     *      summary="Get a listing of the sochis.",
     *      tags={"sochi"},
     *      description="Get all sochis",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/sochi")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $sochis = $this->sochiRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($sochis->toArray(), 'Sochis retrieved successfully');
    }

    /**
     * @param CreatesochiAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/sochis",
     *      summary="Store a newly created sochi in storage",
     *      tags={"sochi"},
     *      description="Store sochi",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="sochi that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/sochi")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/sochi"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatesochiAPIRequest $request)
    {
        $input = $request->all();

        $sochi = $this->sochiRepository->create($input);

        return $this->sendResponse($sochi->toArray(), 'Sochi saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/sochis/{id}",
     *      summary="Display the specified sochi",
     *      tags={"sochi"},
     *      description="Get sochi",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of sochi",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/sochi"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var sochi $sochi */
        $sochi = $this->sochiRepository->find($id);

        if (empty($sochi)) {
            return $this->sendError('Sochi not found');
        }

        return $this->sendResponse($sochi->toArray(), 'Sochi retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatesochiAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/sochis/{id}",
     *      summary="Update the specified sochi in storage",
     *      tags={"sochi"},
     *      description="Update sochi",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of sochi",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="sochi that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/sochi")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/sochi"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatesochiAPIRequest $request)
    {
        $input = $request->all();

        /** @var sochi $sochi */
        $sochi = $this->sochiRepository->find($id);

        if (empty($sochi)) {
            return $this->sendError('Sochi not found');
        }

        $sochi = $this->sochiRepository->update($input, $id);

        return $this->sendResponse($sochi->toArray(), 'sochi updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/sochis/{id}",
     *      summary="Remove the specified sochi from storage",
     *      tags={"sochi"},
     *      description="Delete sochi",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of sochi",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var sochi $sochi */
        $sochi = $this->sochiRepository->find($id);

        if (empty($sochi)) {
            return $this->sendError('Sochi not found');
        }

        $sochi->delete();

        return $this->sendResponse($id, 'Sochi deleted successfully');
    }
}

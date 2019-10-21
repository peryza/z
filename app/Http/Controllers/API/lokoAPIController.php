<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatelokoAPIRequest;
use App\Http\Requests\API\UpdatelokoAPIRequest;
use App\Models\loko;
use App\Repositories\lokoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class lokoController
 * @package App\Http\Controllers\API
 */

class lokoAPIController extends AppBaseController
{
    /** @var  lokoRepository */
    private $lokoRepository;

    public function __construct(lokoRepository $lokoRepo)
    {
        $this->lokoRepository = $lokoRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/lokos",
     *      summary="Get a listing of the lokos.",
     *      tags={"loko"},
     *      description="Get all lokos",
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
     *                  @SWG\Items(ref="#/definitions/loko")
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
        $lokos = $this->lokoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($lokos->toArray(), 'Lokos retrieved successfully');
    }

    /**
     * @param CreatelokoAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/lokos",
     *      summary="Store a newly created loko in storage",
     *      tags={"loko"},
     *      description="Store loko",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="loko that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/loko")
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
     *                  ref="#/definitions/loko"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatelokoAPIRequest $request)
    {
        $input = $request->all();

        $loko = $this->lokoRepository->create($input);

        return $this->sendResponse($loko->toArray(), 'Loko saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/lokos/{id}",
     *      summary="Display the specified loko",
     *      tags={"loko"},
     *      description="Get loko",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of loko",
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
     *                  ref="#/definitions/loko"
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
        /** @var loko $loko */
        $loko = $this->lokoRepository->find($id);

        if (empty($loko)) {
            return $this->sendError('Loko not found');
        }

        return $this->sendResponse($loko->toArray(), 'Loko retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatelokoAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/lokos/{id}",
     *      summary="Update the specified loko in storage",
     *      tags={"loko"},
     *      description="Update loko",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of loko",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="loko that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/loko")
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
     *                  ref="#/definitions/loko"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatelokoAPIRequest $request)
    {
        $input = $request->all();

        /** @var loko $loko */
        $loko = $this->lokoRepository->find($id);

        if (empty($loko)) {
            return $this->sendError('Loko not found');
        }

        $loko = $this->lokoRepository->update($input, $id);

        return $this->sendResponse($loko->toArray(), 'loko updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/lokos/{id}",
     *      summary="Remove the specified loko from storage",
     *      tags={"loko"},
     *      description="Delete loko",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of loko",
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
        /** @var loko $loko */
        $loko = $this->lokoRepository->find($id);

        if (empty($loko)) {
            return $this->sendError('Loko not found');
        }

        $loko->delete();

        return $this->sendResponse($id, 'Loko deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDogAPIRequest;
use App\Http\Requests\API\UpdateDogAPIRequest;
use App\Models\Dog;
use App\Repositories\DogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DogController
 * @package App\Http\Controllers\API
 */

class DogAPIController extends AppBaseController
{
    /** @var  DogRepository */
    private $dogRepository;

    public function __construct(DogRepository $dogRepo)
    {
        $this->dogRepository = $dogRepo;
    }

    /**
     * Display a listing of the Dog.
     * GET|HEAD /dogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $dogs = $this->dogRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($dogs->toArray(), 'Dogs retrieved successfully');
    }

    /**
     * Store a newly created Dog in storage.
     * POST /dogs
     *
     * @param CreateDogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDogAPIRequest $request)
    {
        $input = $request->all();

        $dog = $this->dogRepository->create($input);

        return $this->sendResponse($dog->toArray(), 'Dog saved successfully');
    }

    /**
     * Display the specified Dog.
     * GET|HEAD /dogs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Dog $dog */
        $dog = $this->dogRepository->find($id);

        if (empty($dog)) {
            return $this->sendError('Dog not found');
        }

        return $this->sendResponse($dog->toArray(), 'Dog retrieved successfully');
    }

    /**
     * Update the specified Dog in storage.
     * PUT/PATCH /dogs/{id}
     *
     * @param int $id
     * @param UpdateDogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDogAPIRequest $request)
    {
        $input = $request->all();

        /** @var Dog $dog */
        $dog = $this->dogRepository->find($id);

        if (empty($dog)) {
            return $this->sendError('Dog not found');
        }

        $dog = $this->dogRepository->update($input, $id);

        return $this->sendResponse($dog->toArray(), 'Dog updated successfully');
    }

    /**
     * Remove the specified Dog from storage.
     * DELETE /dogs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Dog $dog */
        $dog = $this->dogRepository->find($id);

        if (empty($dog)) {
            return $this->sendError('Dog not found');
        }

        $dog->delete();

        return $this->sendResponse($id, 'Dog deleted successfully');
    }
}

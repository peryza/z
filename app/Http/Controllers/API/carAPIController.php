<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecarAPIRequest;
use App\Http\Requests\API\UpdatecarAPIRequest;
use App\Models\car;
use App\Repositories\carRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class carController
 * @package App\Http\Controllers\API
 */

class carAPIController extends AppBaseController
{
    /** @var  carRepository */
    private $carRepository;

    public function __construct(carRepository $carRepo)
    {
        $this->carRepository = $carRepo;
    }

    /**
     * Display a listing of the car.
     * GET|HEAD /cars
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cars = $this->carRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cars->toArray(), 'Cars retrieved successfully');
    }

    /**
     * Store a newly created car in storage.
     * POST /cars
     *
     * @param CreatecarAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecarAPIRequest $request)
    {
        $input = $request->all();

        $car = $this->carRepository->create($input);

        return $this->sendResponse($car->toArray(), 'Car saved successfully');
    }

    /**
     * Display the specified car.
     * GET|HEAD /cars/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var car $car */
        $car = $this->carRepository->find($id);

        if (empty($car)) {
            return $this->sendError('Car not found');
        }

        return $this->sendResponse($car->toArray(), 'Car retrieved successfully');
    }

    /**
     * Update the specified car in storage.
     * PUT/PATCH /cars/{id}
     *
     * @param int $id
     * @param UpdatecarAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecarAPIRequest $request)
    {
        $input = $request->all();

        /** @var car $car */
        $car = $this->carRepository->find($id);

        if (empty($car)) {
            return $this->sendError('Car not found');
        }

        $car = $this->carRepository->update($input, $id);

        return $this->sendResponse($car->toArray(), 'car updated successfully');
    }

    /**
     * Remove the specified car from storage.
     * DELETE /cars/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var car $car */
        $car = $this->carRepository->find($id);

        if (empty($car)) {
            return $this->sendError('Car not found');
        }

        $car->delete();

        return $this->sendResponse($id, 'Car deleted successfully');
    }
}

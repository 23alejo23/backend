<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatephotoDetailRequest;
use App\Http\Requests\UpdatephotoDetailRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\photoDetailRepository;
use Illuminate\Http\Request;
use Flash;

class photoDetailController extends AppBaseController
{
    /** @var photoDetailRepository $photoDetailRepository*/
    private $photoDetailRepository;

    public function __construct(photoDetailRepository $photoDetailRepo)
    {
        $this->photoDetailRepository = $photoDetailRepo;
    }

    /**
     * Display a listing of the photoDetail.
     */
    public function index(Request $request)
    {
        $photoDetails = $this->photoDetailRepository->paginate(10);

        return view('photo_details.index')
            ->with('photoDetails', $photoDetails);
    }

    /**
     * Show the form for creating a new photoDetail.
     */
    public function create()
    {
        return view('photo_details.create');
    }

    /**
     * Store a newly created photoDetail in storage.
     */
    public function store(CreatephotoDetailRequest $request)
    {
        $input = $request->all();

        $photoDetail = $this->photoDetailRepository->create($input);

        Flash::success('Photo Detail saved successfully.');

        return redirect(route('photoDetails.index'));
    }

    /**
     * Display the specified photoDetail.
     */
    public function show($id)
    {
        $photoDetail = $this->photoDetailRepository->find($id);

        if (empty($photoDetail)) {
            Flash::error('Photo Detail not found');

            return redirect(route('photoDetails.index'));
        }

        return view('photo_details.show')->with('photoDetail', $photoDetail);
    }

    /**
     * Show the form for editing the specified photoDetail.
     */
    public function edit($id)
    {
        $photoDetail = $this->photoDetailRepository->find($id);

        if (empty($photoDetail)) {
            Flash::error('Photo Detail not found');

            return redirect(route('photoDetails.index'));
        }

        return view('photo_details.edit')->with('photoDetail', $photoDetail);
    }

    /**
     * Update the specified photoDetail in storage.
     */
    public function update($id, UpdatephotoDetailRequest $request)
    {
        $photoDetail = $this->photoDetailRepository->find($id);

        if (empty($photoDetail)) {
            Flash::error('Photo Detail not found');

            return redirect(route('photoDetails.index'));
        }

        $photoDetail = $this->photoDetailRepository->update($request->all(), $id);

        Flash::success('Photo Detail updated successfully.');

        return redirect(route('photoDetails.index'));
    }

    /**
     * Remove the specified photoDetail from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $photoDetail = $this->photoDetailRepository->find($id);

        if (empty($photoDetail)) {
            Flash::error('Photo Detail not found');

            return redirect(route('photoDetails.index'));
        }

        $this->photoDetailRepository->delete($id);

        Flash::success('Photo Detail deleted successfully.');

        return redirect(route('photoDetails.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMapelRequest;
use App\Http\Requests\UpdateMapelRequest;
use App\Repositories\MapelRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class MapelController extends AppBaseController
{
    /** @var MapelRepository $mapelRepository*/
    private $mapelRepository;

    public function __construct(MapelRepository $mapelRepo)
    {
        $this->mapelRepository = $mapelRepo;
    }

    /**
     * Display a listing of the Mapel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $mapels = $this->mapelRepository->all();

        return view('mapels.index')
            ->with('mapels', $mapels);
    }

    /**
     * Show the form for creating a new Mapel.
     *
     * @return Response
     */
    public function create()
    {
        return view('mapels.create');
    }

    /**
     * Store a newly created Mapel in storage.
     *
     * @param CreateMapelRequest $request
     *
     * @return Response
     */
    public function store(CreateMapelRequest $request)
    {
        $input = $request->all();

        $mapel = $this->mapelRepository->create($input);

        Flash::success('Mapel saved successfully.');

        return redirect(route('mapels.index'));
    }

    /**
     * Display the specified Mapel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mapel = $this->mapelRepository->find($id);

        if (empty($mapel)) {
            Flash::error('Mapel not found');

            return redirect(route('mapels.index'));
        }

        return view('mapels.show')->with('mapel', $mapel);
    }

    /**
     * Show the form for editing the specified Mapel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mapel = $this->mapelRepository->find($id);

        if (empty($mapel)) {
            Flash::error('Mapel not found');

            return redirect(route('mapels.index'));
        }

        return view('mapels.edit')->with('mapel', $mapel);
    }

    /**
     * Update the specified Mapel in storage.
     *
     * @param int $id
     * @param UpdateMapelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMapelRequest $request)
    {
        $mapel = $this->mapelRepository->find($id);

        if (empty($mapel)) {
            Flash::error('Mapel not found');

            return redirect(route('mapels.index'));
        }

        $mapel = $this->mapelRepository->update($request->all(), $id);

        Flash::success('Mapel updated successfully.');

        return redirect(route('mapels.index'));
    }

    /**
     * Remove the specified Mapel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mapel = $this->mapelRepository->find($id);

        if (empty($mapel)) {
            Flash::error('Mapel not found');

            return redirect(route('mapels.index'));
        }

        $this->mapelRepository->delete($id);

        Flash::success('Mapel deleted successfully.');

        return redirect(route('mapels.index'));
    }
}

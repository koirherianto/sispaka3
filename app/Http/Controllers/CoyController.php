<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCoyRequest;
use App\Http\Requests\UpdateCoyRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CoyRepository;
use Illuminate\Http\Request;

use Validator;

use Flash;

class CoyController extends AppBaseController
{
    /** @var CoyRepository $coyRepository*/
    private $coyRepository;

    public function __construct(CoyRepository $coyRepo)
    {
        $this->coyRepository = $coyRepo;
    }

    /**
     * Display a listing of the Coy.
     */
    public function index(Request $request)
    {
        $coys = $this->coyRepository->paginate(10);

        return view('coys.index')
            ->with('coys', $coys);
    }

    /**
     * Show the form for creating a new Coy.
     */
    public function create()
    {
        return view('coys.create');
    }

    /**
     * Store a newly created Coy in storage.
     */
    public function store(CreateCoyRequest $request)
    {
        $input = $request->all();

        $coy = $this->coyRepository->create($input);

        Flash::success('Coy saved successfully.');

        return redirect(route('coys.index'));
    }

    /**
     * Display the specified Coy.
     */
    public function show($id)
    {
        $coy = $this->coyRepository->find($id);

        if (empty($coy)) {
            Flash::error('Coy not found');

            return redirect(route('coys.index'));
        }

        return view('coys.show')->with('coy', $coy);
    }

    /**
     * Show the form for editing the specified Coy.
     */
    public function edit($id)
    {
        $coy = $this->coyRepository->find($id);

        if (empty($coy)) {
            Flash::error('Coy not found');

            return redirect(route('coys.index'));
        }

        return view('coys.edit')->with('coy', $coy);
    }

    /**
     * Update the specified Coy in storage.
     */
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:11',
            'tanggal_lahir' => 'required',
            'tinggi' => 'required|min:10',
            'penjelasan' => 'required|string|max:65535',
            'created_at' => 'nullable',
            'updated_at' => 'nullable'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $coy = $this->coyRepository->find($id);

        if (empty($coy)) {
            Flash::error('Coy not found');

            return redirect(route('coys.index'));
        }

        $coy = $this->coyRepository->update($request->all(), $id);

        Flash::success('Coy updated successfully.');

        return redirect(route('coys.index'));
    }

    /**
     * Remove the specified Coy from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $coy = $this->coyRepository->find($id);

        if (empty($coy)) {
            Flash::error('Coy not found');

            return redirect(route('coys.index'));
        }

        $this->coyRepository->delete($id);

        Flash::success('Coy deleted successfully.');

        return redirect(route('coys.index'));
    }
}
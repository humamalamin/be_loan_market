<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\BranchRepository;

class BranchController extends Controller
{
    protected $repository;

    public function __construct(BranchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $branches = $this->repository->getAll();

        return view('home', compact('branches'));
    }

    public function show($id)
    {
        $branch = $this->repository->getByID($id);

        return view('branch.show', compact('branch'));
    }

    public function create()
    {
        return view('branch.create');
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'about' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ])->validate();

        $this->repository->store($request);

        return redirect()->route('branch')->with('success', 'Data has been saved!');
    }

    public function edit($id)
    {
        $branch = $this->repository->getByID($id);

        return view('branch.edit', compact('branch'));
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'about' => 'required',
            'lat' => 'required',
            'lng' => 'required',
        ])->validate();

        $this->repository->update($id, $request);

        return redirect()->route('branch')->with('success', 'Data has been updated!');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('branch')->with('success', 'Data has been deleted!');
    }
}

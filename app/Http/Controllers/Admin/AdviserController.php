<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\AdviserRepository;
use App\Repositories\BranchRepository;

class AdviserController extends Controller
{
    protected $repository;
    protected $branchRepository;

    public function __construct(AdviserRepository $repository, BranchRepository $branchRepository)
    {
        $this->repository = $repository;
        $this->branchRepository = $branchRepository;
    }

    public function index()
    {
        $advisers = $this->repository->getAll();

        return view('adviser.index', compact('advisers'));
    }

    public function show($id)
    {
        $adviser = $this->repository->getByID($id);

        return view('adviser.show', compact('adviser'));
    }

    public function create()
    {
        $branches = $this->branchRepository->getAll();

        return view('adviser.create', compact('branches'));
    }

    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|digits_between:8,15',
            'branch_id' => 'required|exists:branches,id',
            'image' => 'mimes:jpg,png,bmp'
        ])->validate();

        if ($request->has('image')) {
            $foto = $request->file('image');
            $fileName = time()."-".$foto->getClientOriginalName();
            $path = 'uploads/';
            $foto->move($path, $fileName);

            $request['foto'] = $path.$fileName;
        }

        $this->repository->store($request);

        return redirect()->route('adviser')->with('success', 'Data has been saved!');
    }

    public function edit($id)
    {
        $adviser = $this->repository->getByID($id);
        $branches = $this->branchRepository->getAll();

        return view('adviser.edit', compact('adviser', 'branches'));
    }

    public function update(Request $request, $id)
    {
        Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|digits_between:8,15',
            'branch_id' => 'required|exists:branches,id',
            'image' => 'mimes:jpg,png,bmp'
        ])->validate();

        $adviser = $this->repository->getByID($id);

        if ($request->has('image')) {
            $foto = $request->file('image');
            $fileName = time()."-".$foto->getClientOriginalName();
            $path = 'uploads/';
            $foto->move($path, $fileName);

            $request['foto'] = $path.$fileName;
        } else {
            $request['foto'] = $adviser->foto;
        }

        $this->repository->update($id, $request);

        return redirect()->route('adviser')->with('success', 'Data has been updated!');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('adviser')->with('success', 'Data has been deleted!');
    }
}

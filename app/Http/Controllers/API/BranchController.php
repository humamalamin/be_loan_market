<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BranchResource;
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

        return BranchResource::collection($branches);
    }

    public function show($id)
    {
        $branch = $this->repository->getByID($id);

        return new BranchResource($branch);
    }
}

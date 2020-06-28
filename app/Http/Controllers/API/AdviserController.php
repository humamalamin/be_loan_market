<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\AdviserResource;
use App\Repositories\AdviserRepository;

class AdviserController extends Controller
{
    protected $repository;

    public function __construct(AdviserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $advisers = $this->repository->getAll();

        return AdviserResource::collection($advisers);
    }

    public function getByBranch($branchID)
    {
        $advisers = $this->repository->getByBranchID($branchID);

        return AdviserResource::collection($advisers);
    }

    public function show($id)
    {
        $adviser = $this->repository->getByID($id);

        return new AdviserResource($adviser);
    }
}

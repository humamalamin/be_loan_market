<?php

namespace App\Repositories;

use App\Adviser;
use Illuminate\Http\Request;

class ADviserRepository
{
/**
     * Eloquent model instance
     */
    protected $model;

    /**
     * Load default class depedencies.
     *
     * @param Model model Illuminate\Database\Eloquent\Model
     */
    public function __construct(Adviser $model)
    {
        $this->model = $model;
    }

    /**
     * Get all item collections from database
     *
     * @return Collection of items
     */
    public function getAll()
    {
        return $this->model->orderBy('id', 'desc')->get();
    }

    /**
     * Get item collection by id
     *
     * @return single item
     */
    public function getByID($adviserID)
    {
        return $this->model->with('branch')->findOrFail($adviserID);
    }

    /**
     * Get item collection by id
     *
     * @return single item
     */
    public function getByBranchID($branchID)
    {
        return $this->model->where('branch_id', $branchID)->get();
    }

    /**
     * Create new record
     *
     * @param Request $request Illuminate\Http\Request
     * @return saved model object with data
     */
    public function store(Request $request)
    {
        $data = $this->setDataPayload($request);
        $item = $this->model;
        $item->fill($data);
        $item->save();

        return $item;
    }

    /**
     * Update existing data
     *
     * @param Integer $id integer item primary key
     * @param Request $request Illuminate\Http\Request
     * @return send updated item object.
     */
    public function update($adviserID, Request $request)
    {
        $data = $this->setDataPayload($request);
        $item = $this->model->findOrFail($adviserID);
        $item->fill($data);
        $item->save();

        return $item;
    }

    /**
     * Delete item by primary key id.
     *
     * @param  Integer $id integer of primary key id.
     * @return boolean
     */
    public function delete($adviserID)
    {
        return $this->model->destroy($adviserID);
    }

    /**
     * set data for saving
     *
     * @param  Request $request Illuminate\Http\Request
     * @return array of data.
     */
    protected function setDataPayload(Request $request)
    {
        return $request->all();
    }
}

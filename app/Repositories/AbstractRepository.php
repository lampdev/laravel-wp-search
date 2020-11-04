<?php

namespace App\Repositories;

/**
 * Class AbstractRepository.
 */
class AbstractRepository implements AbstractInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * @param int $limit
     * @return mixed
     */
    public function getAll(int $limit = 10)
    {
        return $this->model->select()
            ->orderBy('created_at', 'desc')
            ->paginate($limit);
    }

    /**
     * @return mixed
     */
    public function getAllNoLimit()
    {
        return $this->model->select()
            ->orderBy('created_at', 'desc')
            ->get();
    }

    /**
     * @param int $id
     * @param array $attributes
     * @param bool $getDataBack
     * @return mixed
     */
    public function update(int $id, array $attributes, bool $getDataBack = false)
    {
        $update = $this->model->where('id', $id)->update($attributes);

        if ($getDataBack) {
            $update = $this->getById($id);
        }

        return $update;
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function remove(int $id)
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        $data = $this->model->create($attributes);

        return $data;
    }

    /**
     * @param array $fillAttributes
     * @param array $searchAttributes
     * @return mixed
     */
    public function firstOrCreate(
        array $fillAttributes, array $searchAttributes = []
    ) {
        (count($searchAttributes))
            ? $data = $this->model->firstOrCreate($searchAttributes, $fillAttributes)
            : $data = $this->model->firstOrCreate($fillAttributes);

        return $data;
    }

    /**
     * @param array $fillAttributes
     * @param array $searchAttributes
     * @return mixed
     */
    public function updateOrCreate(
        array $fillAttributes, array $searchAttributes = []
    ) {
        (count($searchAttributes))
            ? $data = $this->model->updateOrCreate($searchAttributes, $fillAttributes)
            : $data = $this->model->updateOrCreate($fillAttributes);

        return $data;
    }
}

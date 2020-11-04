<?php

namespace App\Repositories;

/**
 * Interface AbstractInterface.
 */
interface AbstractInterface
{
    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id);

    /**
     * @param int $limit
     * @return mixed
     */
    public function getAll(int $limit = 10);

    /**
     * @return mixed
     */
    public function getAllNoLimit();

    /**
     * @param int $id
     * @param array $attributes
     * @param bool $getDataBack
     * @return mixed
     */
    public function update(int $id, array $attributes, bool $getDataBack = false);

    /**
     * @param int $id
     * @return mixed
     */
    public function remove(int $id);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * @param array $fillAttributes
     * @param array $searchAttributes
     * @return mixed
     */
    public function firstOrCreate(
        array $fillAttributes, array $searchAttributes = []
    );

    /**
     * @param array $fillAttributes
     * @param array $searchAttributes
     * @return mixed
     */
    public function updateOrCreate(
        array $fillAttributes, array $searchAttributes = []
    );
}

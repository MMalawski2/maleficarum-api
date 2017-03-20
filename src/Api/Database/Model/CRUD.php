<?php
/**
 * This interface is to be implemented by all CRUD enabled model classes.
 */

namespace Maleficarum\Api\Database\Model;

interface CRUD {
    /**
     * Persist data stored in this model as a new storage entry.
     *
     * @return \Maleficarum\Api\Database\Model\CRUD
     */
    public function create() : \Maleficarum\Api\Database\Model\CRUD;

    /**
     * Refresh this model with current data from the storage
     *
     * @return \Maleficarum\Api\Database\Model\CRUD
     * @throws \Maleficarum\Exception\NotFoundException
     */
    public function read() : \Maleficarum\Api\Database\Model\CRUD;

    /**
     * Update storage entry with data currently stored in this model.
     *
     * @return \Maleficarum\Api\Database\Model\CRUD
     */
    public function update() : \Maleficarum\Api\Database\Model\CRUD;

    /**
     * Delete an entry from the storage based on ID data stored in this model
     *
     * @return \Maleficarum\Api\Database\Model\CRUD
     */
    public function delete() : \Maleficarum\Api\Database\Model\CRUD;

    /**
     * Validate data stored in this model to check if it can be persisted in storage.
     *
     * @param bool $clear
     *
     * @return bool
     */
    public function validate(bool $clear = true) : bool;
}
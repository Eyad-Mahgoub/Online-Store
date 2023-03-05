<?php

namespace App\Repositories\Interface;

Interface CategoryInterface
{
    /**
     * Get all of the Caregory models from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all(): \Illuminate\Database\Eloquent\Collection;

    /**
     * Find a Category Model in the database using its ID.
     *
     * @param int $id
     * @return \App\Models\Category
     */
    public function find(int $id): \App\Models\Category;

    /**
     * Create a new category model and save it in the Database.
     *
     * @param array $data
     * @return \App\Models\Category
     */
    public function store(array $data): \App\Models\Category;

    /**
     * Updates a Category Record in the database using its ID.
     *
     * @param int $id
     * @param array $data
     * @return \App\Models\Category|false
     */
    public function update(int $id, array $data): \App\Models\Category | false;

    /**
     * Deletes a Category Record from the database using its ID.
     *
     * @param \App\Models\Category
     * @return bool
     */
    public function destroy(int $id): bool;
}

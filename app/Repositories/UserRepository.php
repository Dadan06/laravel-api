<?php

namespace App\Repositories;

use App\Models\User;
use App\Types\ListCriteria;
use App\Types\SearchCriteria;
use App\Utils\GenericUtils;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param ListCriteria $listCriteria
     * @param SearchCriteria $searchCriteria
     * @return User[]
     */
    public function paginated(ListCriteria $listCriteria, SearchCriteria $searchCriteria)
    {
        return GenericUtils::genericPaginatedList(User::class, $listCriteria, $searchCriteria);
    }

    /**
     * @param int $id
     * @return User
     */
    public function get(int $id): User
    {
        return User::find($id);
    }

    /**
     * @param int $id
     */
    public function delete(int $id): void
    {
        User::destroy($id);
    }

    /**
     * @param array $user
     * @return User
     */
    public function create(array $user)
    {
        return User::create($user);
    }

    /**
     * @param int $id
     * @param array $newData
     * @return User
     */
    public function update(int $id, array $newData): User
    {
        //
    }
}

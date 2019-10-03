<?php

namespace App\Utils;

use App\Types\ListCriteria;
use App\Types\SearchCriteria;

class GenericUtils
{
    /**
     * @param mixed $model
     * @param ListCriteria $listCriteria
     * @param SearchCriteria $searchCriteria
     * @return array
     */
    public static function genericPaginatedList($model, ListCriteria $listCriteria, SearchCriteria $searchCriteria)
    {
        $query = $model::whereNotNull('id');

        if ($searchCriteria->getValue()) {
            foreach ($searchCriteria->getFields() as $searchField) {
                $query->orWhere($searchField, $searchCriteria->getValue());
            }
        }

        $query = $query
            ->skip($listCriteria->getPage())
            ->take($listCriteria->getPageSize());

        return $query->get();
    }
}

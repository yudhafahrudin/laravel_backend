<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class MyDefaultCriteria.
 *
 * @package namespace App\Criteria;
 */
class MyDefaultCriteria implements CriteriaInterface {

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository) {

        $model = $model->where('status', '=', 1);
        return $model;
    }

}

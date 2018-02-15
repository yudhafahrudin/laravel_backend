<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CategorieRepository;
use App\Entities\Categorie;
use App\Validators\CategorieValidator;

/**
 * Class CategorieRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategorieRepositoryEloquent extends BaseRepository implements CategorieRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Categorie::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return CategorieValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}

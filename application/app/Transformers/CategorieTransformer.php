<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Categorie;

/**
 * Class CategorieTransformer.
 *
 * @package namespace App\Transformers;
 */
class CategorieTransformer extends TransformerAbstract
{
    /**
     * Transform the Categorie entity.
     *
     * @param \App\Entities\Categorie $model
     *
     * @return array
     */
    public function transform(Categorie $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}

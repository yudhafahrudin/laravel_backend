<?php

namespace App\Presenters;

use App\Transformers\CategorieTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CategoriePresenter.
 *
 * @package namespace App\Presenters;
 */
class CategoriePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CategorieTransformer();
    }
}

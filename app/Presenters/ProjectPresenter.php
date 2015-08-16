<?php
/**
 * Created by PhpStorm.
 * User: junior
 * Date: 16/08/15
 * Time: 12:25
 */

namespace CodeProject\Presenters;
use CodeProject\Transformers\ProjectTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class ProjectPresenter extends FractalPresenter
{
   public function getTransformer()
   {
	   return new ProjectTransformer();
   }
}
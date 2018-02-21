<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CategorieCreateRequest;
use App\Http\Requests\CategorieUpdateRequest;
use App\Repositories\CategorieRepository;
use App\Repositories\CategorieRepositoryEloquent;
use App\Validators\CategorieValidator;
use Illuminate\Support\Facades\Auth;

/**
 * Class CategoriesController.
 *
 * @package namespace App\Http\Controllers;
 */
class CategoriesController extends Controller {

    protected $repository;
    protected $validator;

    public function __construct(CategorieRepositoryEloquent $repository, CategorieValidator $validator) {
        parent::__construct();
        $this->repository = $repository;
        $this->validator = $validator;
    }
    

    public function index() {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $this->repository->pushCriteria(\App\Criteria\MyDefaultCriteria::class);
        $categories = $this->repository->all()->sortByDesc('id');
        
        $categories_deleted = $this->repository->skipCriteria()->findWhereNotIn('status', [1]);
        $categories_total = count($categories);
        $categories_deleted_total = count($categories_deleted);

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $categories,
            ]);
        }

        return view('categories.index', array(
            'categories' => $categories,
            'listNomor' => 1,
            'title' => 'Category',
            'total' => $categories_total,
            'totalDeleted' => $categories_deleted_total
                )
        );
    }

    public function addCategories() {
        return view('categories.add', array('title' => 'Category'));
    }

    public function store(CategorieCreateRequest $request) {

        $username = Auth::user()->username;

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $category = $this->repository->create($request->all());
            $category->created_by = $username;
            $category->save();

            $response = [
                'message' => 'Category created.',
                'data' => $category->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                            'error' => true,
                            'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function show($id) {
        $category = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                        'data' => $category,
            ]);
        }

        return view('categories.show', array('title' => 'Category', 'category' => $category));
    }

    public function edit($id) {
        $category = $this->repository->find($id);

        return view('categories.edit', ['title' => 'Category', 'category' => $category]);
    }

    public function update(CategorieUpdateRequest $request, $id) {
        $username = Auth::user()->username;
        $request_update = ['name' => $request->name, 'description' => $request->description];

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $category = $this->repository->update($request_update, $id);
            $category->created_by = $username;
            $category->save();

            $response = [
                'message' => 'Category updated.',
                'data' => $category->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                            'error' => true,
                            'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function delete($id) {

        try {

            $category = $this->repository->find($id);
            $category->status = 0;
            $category->save();

            $response = [
                'message' => 'Category deleted.',
                'data' => $category->toArray(),
            ];

//            if ($request->wantsJson()) {
//
//                return response()->json($response);
//            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                            'error' => true,
                            'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function destroy($id) {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                        'message' => 'Category destroyed.',
                        'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Category destroyed.');
    }

}

<?php

namespace App\Modules\Movement;

use App\Http\Controllers\Controller;
use App\Modules\Movement\Services\MovementService;
use App\Modules\Utils\Constants;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    /**
     * @var MovementService $movementService
     */
    protected MovementService $movementService;


    public function __construct()
    {
        $this->movementService = new MovementService();
    }

    /**
     * @return Factory|View|Application
     */
    public function read(): Factory|View|Application
    {
        $records = $this->movementService->read();
        return view('Movement.index', compact("records"));
    }

    /**
     * @return Factory|View|Application
     */
    public function new(): Factory|View|Application
    {
        return view('Movement._new');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse
    {
        $this->movementService->create($request);
        return redirect()->route('movements')->with('success', Constants::SUCCESS_MSG['movement']['saveRecords']);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $records = $this->movementService->edit($id)[0];
        return view('Movement._edit', compact('records'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $response = $this->movementService->update($request->all(), $id);

        if($response > 0){
            return redirect()->route('movement')->with('success', Constants::SUCCESS_MSG['movement']['updateRecords']);
        }

        return redirect()->route('movement')->with('errors', Constants::ERROR_MSG['movement']['updateRecords']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $response = $this->movementService->delete($id);

        if($response > 0){
            return redirect()->route('movement')->with('success', Constants::SUCCESS_MSG['movement']['deleteRecords']);
        }
        return redirect()->route('movement')->with('errors', Constants::ERROR_MSG['movement']['deleteRecords']);
    }
}

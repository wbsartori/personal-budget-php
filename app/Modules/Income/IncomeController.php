<?php

namespace App\Modules\Income;

use App\Http\Controllers\Controller;
use App\Modules\Income\Services\IncomeService;
use App\Modules\Utils\Constants;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * @var IncomeService $incomeService
     */
    protected IncomeService $incomeService;


    public function __construct()
    {
        $this->incomeService = new IncomeService();
    }

    /**
     * @return Factory|View|Application
     */
    public function read(): Factory|View|Application
    {
        $records = $this->incomeService->read();
        return view('Income.index', compact("records"));
    }

    /**
     * @return Factory|View|Application
     */
    public function new(): Factory|View|Application
    {
        return view('Income._new');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function save(Request $request): RedirectResponse
    {
        $this->incomeService->create($request);
        return redirect()->route('income')->with('success', Constants::SUCCESS_MSG['income']['saveRecords']);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $records = $this->incomeService->edit($id)[0];
        return view('Income._edit', compact('records'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $response = $this->incomeService->update($request->all(), $id);

        if($response > 0){
            return redirect()->route('income')->with('success', Constants::SUCCESS_MSG['income']['updateRecords']);
        }

        return redirect()->route('income')->with('errors', Constants::ERROR_MSG['income']['updateRecords']);
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function delete($id): RedirectResponse
    {
        $response = $this->incomeService->delete($id);

        if($response > 0){
            return redirect()->route('income')->with('success', Constants::SUCCESS_MSG['income']['deleteRecords']);
        }
        return redirect()->route('income')->with('errors', Constants::ERROR_MSG['income']['deleteRecords']);
    }
}

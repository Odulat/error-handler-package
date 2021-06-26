<?php

namespace Dulat\ErrorHandler\Http\Controllers;

use App\Http\Controllers\Controller;
use Dulat\ErrorHandler\Models\ErrorException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $exceptions = ErrorException::query()->latest()->paginate(20);

        return view('error-handler::index', compact('exceptions'));
    }

    /**
     * Display the detail of the lapse
     *
     * @return Application|Factory|View
     */
    public function detail(Request $request)
    {
        $exception = ErrorException::query()
            ->find($request->id);
        return view('error-handler::detail',compact('exception'));
    }

    /**
     * Delete the record
     *
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        ErrorException::query()->findOrFail($id)->delete();

        return redirect()->route('index');
    }

    /**
     * Delete all of the records
     *
     * @return RedirectResponse
     */
    public function clear()
    {
        ErrorException::query()->truncate();

        return redirect()->back();
    }
}
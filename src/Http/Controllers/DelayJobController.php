<?php


namespace Cblink\Queuer\Http\Controllers;


use Cblink\Queuer\DelayJob;
use Illuminate\Http\Request;

class DelayJobController extends Controller
{

    public function index(DelayJob $queuer)
    {
        $delays = $queuer->jobs();

        return view('queue::delay', compact('delays'));
    }

    public function destroy(Request $request, DelayJob $queuer)
    {
        $queuer->delete($request->get('payload'));

        return redirect(route('queuer.delay.index'));
    }

}
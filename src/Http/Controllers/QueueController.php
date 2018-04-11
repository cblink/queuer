<?php


namespace Cblink\Queuer\Http\Controllers;


use Cblink\Queuer\Queuer;
use Illuminate\Http\Request;

class QueueController extends Controller
{

    public function index(Queuer $queuer)
    {
        $delays = $queuer->getDelay();

        return view('queue::app', compact('delays'));
    }

    public function destroy(Request $request, Queuer $queuer)
    {
        $queuer->removeDelay($request->get('payload'));

        return redirect(route('queuer.delay.index'));
    }

}
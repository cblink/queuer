<?php


namespace Cblink\Queuer\Http\Controllers;


use Cblink\Queuer\FailJob;
use Illuminate\Http\Request;

class FailJobController extends Controller
{

    public function index(FailJob $queuer)
    {
        $fails = $queuer->jobs();

        return view('queue::fail', compact('fails'));
    }

    public function destroy($id, FailJob $queuer)
    {
        $queuer->delete($id);

        return redirect(route('queuer.fail.index'));
    }
}
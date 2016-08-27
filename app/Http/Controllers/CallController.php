<?php

namespace App\Http\Controllers;

use App\Call;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //init sort data
        $sort_sender_num = 'sender_num';
        $sort_recipient_num = 'recipient_num';
        $sort_route = 'route';
        //default sort column & order
        $sort_condition = 'id';
        $sort_direction = 'asc';
        //links & model sorting
        if ($request->isMethod('get')) {
            $sort = $request->input('sort');

            switch ($sort) {
                case ('sender_num') :
                    $sort_sender_num = 'sender_num_desc';
                    $sort_condition = 'sender_num';
                    break;
                case ('sender_num_desc') :
                    $sort_sender_num = 'sender_num';
                    $sort_condition = $sort_sender_num;
                    $sort_direction = 'desc';
                case ('recipient_num') :
                    $sort_recipient_num = 'recipient_num_desc';
                    $sort_condition = 'recipient_num';
                    break;
                case ('recipient_num_desc') :
                    $sort_recipient_num = 'recipient_num';
                    $sort_condition = $sort_recipient_num;
                    $sort_direction = 'desc';
                case ('route') :
                    $sort_route = 'route_desc';
                    $sort_condition = 'route';
                    break;
                case ('route_desc') :
                    $sort_route = 'route';
                    $sort_condition = $sort_route;
                    $sort_direction = 'desc';
                    break;
            }

            if ($date_start = $request->input('sort_date_start')) {
                $date_start = \DateTime::createFromFormat("d/m/Y", $date_start)->getTimestamp();
            }
            if ($date_end = $request->input('sort_date_end')) {
                $date_end = \DateTime::createFromFormat("d/m/Y", $date_end)->getTimestamp();
            }
        }

        if ($date_start && $date_end) {
            $model = DB::table('call')
                ->orderBy($sort_condition, $sort_direction)
                ->where('time_init', '<=', $date_end)
                ->where('time_init', '>=', $date_start)
                ->paginate(15);
        } else {
            $model = DB::table('call')
                ->orderBy($sort_condition, $sort_direction)
                ->paginate(15);
        }


        return view('call.index')->with([
            'model' => $model,
            'sort_sender_num' => $sort_sender_num,
            'sort_recipient_num' => $sort_recipient_num,
            'sort_route' => $sort_route,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Call::findOrFail($id);

        return view('call.edit')->with(['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), ['comment' => 'required']);
        if ($validator->fails()) {
            Session::flash('error', 'Comment can\'t be blank');
        } else {
            $model = Call::findOrfail($id);
            $model->comment = $request->input('comment');
            $model->save();
            Session::flash('success', 'Comment was updated successfully');
        }

        return Redirect::to('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Call::destroy($id);
        Session::flash('success', 'Call was deleted successfully');

        return Redirect::to('/');
    }

    public function www()
    {

    }
}

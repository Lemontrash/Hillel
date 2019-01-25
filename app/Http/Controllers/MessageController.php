<?php

namespace App\Http\Controllers;

use App\Message;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function store(Request $request)
    {
        $recaptcha = Input::get('g-recaptcha-response');

        $client = new Client([
            'base_uri' => 'https://google.com/recaptcha/api/',
            'timeout' => 2.0
        ]);

        $response = $client->request('POST', 'siteverify', [
            'query' => [
                'secret' => '6Ld81YsUAAAAAEONNCGQN5seUSMR-2Aopzs6pO4u',
                'response' => $recaptcha]]);

        if( json_decode($response->getBody())->success){
            $request->validate([
                'email' => 'required|email|max:255',
                'name' => 'required|max:255',
                'message' => 'required|max:255'
            ]);

            $name = $request->input('name');
            $email = $request->input('email');
            $message = $request->input('message');

            $data = [
                'name' => $name,
                'email' => $email,
                'message' => $message,
                'created_at' => date('d-m-y'),
                'updated_at' => date('d-m-y'),
            ];
            DB::table('messages')->insert($data);
            return redirect('/');
        }
        return back();




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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

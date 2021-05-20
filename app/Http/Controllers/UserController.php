<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use \App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $imoveis = User::find(Auth::user()->id)->hasImoveis;
        return view('user.profile',['imoveis'=> $imoveis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
   /* public function create()
    {

    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function show(int $id)
    {
        $user = User::find($id);
        if($user === null){
            $user = User::latest()->first();
        }
        $imoveis = $user->hasImoveis;


        return view('user.show', ['user'=>$user, 'imoveis'=>$imoveis]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return Application|Factory|View|Response
     */
    public function edit()
    {

        return view('user.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);


        $data = $request->only('name', 'email', 'address');

        $user->update($data);

        return redirect('/user/profile/me');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function destroy()
    {
        $user = User::find(Auth::user()->id);
        $user->delete();
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ad;
use App\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;


class CabinetController extends Controller
{


    public function index(Ad $ad)
    {

        $user = auth()->user();
        $adsList = $ad->where('user_id', $user->id)->get();

        return view('cabinet', compact('adsList', 'user'));
    }

    public function saveUser(UpdateUserRequest $request, User $user)
    {

        $data = $request->all();
        if ($data['password'] == null) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }
        $result = $user->update($data);

        if ($result) {
            return redirect()
                ->route('cabinet.index')
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}

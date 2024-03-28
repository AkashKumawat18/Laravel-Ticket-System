<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAvatarRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * @param UpdateAvatarRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateAvatarRequest $request): RedirectResponse
    {

        $path = $request->file('avatar')->store('avatars','public');
        if($oldAvatar = $request->user()->avatar){
            Storage::disk('public ')->delete($oldAvatar);
        }
        auth()->user()->update(['avatar'=> $path]);
        return redirect('profile')->with('status','avatar is updated');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    private UserRepository $repo;

    public function __construct(UserRepository $repo)
    {
        $this->repo = $repo;
    }
    
    public function viewProfile()
    {
        return view('auth.profile');
    }
    public function formUpdate(int $id)
    {
        return view('auth.profile-update', [
            'user' => $this->repo->findOrFail($id)
        ]);
    }

    public function processUpdate(int $id, Request $request)
    {
        try{
             $user =  $this->repo->findOrFail($id);
             $request->validate(User::validationRules(), User::validationMessages());
             $data = $request->except(['_token','password']);
             $oldAvatar = null;
             
             if($request->hasFile('avatar')) {
                 $data['avatar'] = $this->uploadAvatar($request);
                 $oldAvatar = $user->avatar;
                }

            $this->repo->update($id, $data);
            $this->deleteAvatar($oldAvatar);
            return redirect()
            ->route('auth.profile ')
            ->with('feedback.message', 'Se editó con éxito.');
        }catch(\Exception $e){
            return redirect()
            ->route('auth.formUpdate', ['id' => $id])
            ->withInput()
            ->with('feedback.message', 'Ocurrió un error al tratar de editar. Por favor, probá de nuevo en un rato. Y si el problema persiste, comunicate con nosotros.')
            ->with('feedback.type', 'danger');

        }
    }
    
    protected function uploadAvatar(Request $request): string
    {

        $avatar = $request->file('avatar');


        $avatarName = date('YmdHis_') . Str::slug($request->input('title')) . "." . $avatar->guessExtension();


        $avatar->storeAs('imgs', $avatarName);

        return $avatarName;
    }

    protected function deleteAvatar(?string $file): void
    {
        if($file !== null && Storage::has('imgs/' . $file)) {
            Storage::delete('imgs/' . $file);
        }
    }

}

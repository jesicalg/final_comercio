<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Repositories\Contracts\UserRepository;
use Hash;
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
        //TODO:falta revisar suscripciones y traerlas
    }
    public function formUpdate(int $id)
    {
        $idUserSession = auth()->id();
        if($id != $idUserSession){
            return redirect()
            ->route('errors.403')
            ->with('message', 'Error al intentar traer información');
        }
        return view('auth.form-update', [
            'user' => $this->repo->findOrFail($id)
        ]);
    }

    public function processUpdate(int $id, Request $request)
    {
        $idUserSession = auth()->id();
        if($id != $idUserSession){
            return redirect()
            ->route('errors.403')
            ->with('message', 'Error al editar usuario');
        }
        $request->validate(User::validationRules(auth()->id(), 'update'), User::validationMessages());
        
        try{

            $user =  $this->repo->findOrFail($id);
            
            $data = $request->only('username', 'avatar');
            $oldAvatar = null;
             
            if($request->hasFile('avatar')) {
                $data['avatar'] = $this->uploadAvatar($request);
                $oldAvatar = $user->avatar;
            }else
            {
                unset($data['avatar']);

            }


            $this->repo->update($id, $data);

            if($oldAvatar != null)
            {
                $this->deleteAvatar($oldAvatar);
            }
            return redirect()
            ->route('auth.viewProfile')
            ->with('feedback.message', 'Se editó con éxito.')
            ->with('feedback.type', 'green');
        }catch(\Exception $e){
            return redirect()
            ->route('auth.updateProfile', ['id' => $id])
            ->withInput()
            ->with('feedback.message', 'Ocurrió un error al tratar de editar. Por favor, probá de nuevo en un rato. Y si el problema persiste, comunicate con nosotros.')
            ->with('feedback.type', 'danger');

        }
    }
    public function formUpdatePass(int $id)
    {
        $idUserSession = auth()->id();
        if($id != $idUserSession){
            return redirect()
            ->route('errors.403')
            ->with('message', 'Error al intentar traer información');
        }
        return view('auth.form-update-pass', [
            'user' => $this->repo->findOrFail($id)
        ]);
    }
    public function processUpdatePassword(int $id, Request $request)
    {   
        $idUserSession = auth()->id();
        if($id != $idUserSession){
            return redirect()
            ->route('errors.403')
            ->with('message', 'Error al editar usuario');
        }

        $request->validate(User::validationRules(auth()->id(), 'update_password'), User::validationMessages());

        try{
            $user =  $this->repo->findOrFail($id);

            $data = $request->only('password');

            $password = $request->current_password;

            if(!Hash::check($password, $user['password'])){
                return redirect()
                ->route('auth.updatePassword', ['id' => $id])
                ->with('feedback.message', 'Ocurrió un error al tratar de editar. Por favor, verificá que la contraseña sea correcta')
                ->with('feedback.type', 'danger');
            }

            $data['password'] = Hash::make($data['password']);
            $this->repo->update($id, $data);

            return redirect()
            ->route('auth.viewProfile')
            ->with('feedback.message', 'Se editó tu contraseña con éxito.')
            ->with('feedback.type', 'green');

        }catch(\Exception $e){
            return redirect()
            ->route('auth.updatePassword', ['id' => $id])
            ->withInput()
            ->with('feedback.message', 'Ocurrió un error al tratar de editar.')
            ->with('feedback.type', 'danger');

        }

    }
    public function formUpdateEmail(int $id)
    {
        $idUserSession = auth()->id();
        if($id != $idUserSession){
            return redirect()
            ->route('errors.403')
            ->with('message', 'Error al intentar traer información');
        }
        return view('auth.form-update-email', [
            'user' => $this->repo->findOrFail($id)
        ]);
    }
    public function processUpdateEmail(int $id, Request $request)
    {   
        $idUserSession = auth()->id();
        if($id != $idUserSession){
            return redirect()
            ->route('errors.403')
            ->with('message', 'Error al editar usuario');
        }

        $request->validate(User::validationRules(auth()->id(), 'update_email'), User::validationMessages());

        try{
            $user =  $this->repo->findOrFail($id);

            $password = $request->password;

            if(!Hash::check($password, $user['password'])){
                return redirect()
                ->route('auth.updateEmail', ['id' => $id])
                ->with('feedback.message', 'La contraseña es incorrecta')
                ->with('feedback.type', 'danger');
            }
            
            $data = $request->only('email');
            $this->repo->update($id, $data);

            return redirect()
            ->route('auth.viewProfile')
            ->with('feedback.message', 'Se editó tu email con éxito.')
            ->with('feedback.type', 'green');

        }catch(\Exception $e){
            return redirect()
            ->route('auth.updateEmail', ['id' => $id])
            ->withInput()
            ->with('feedback.message', 'Ocurrió un error al tratar de editar. Por favor, verificá que la contraseña sea correcta')
            ->with('feedback.type', 'danger');

        }

    }

    
    protected function uploadAvatar(Request $request): string
    {

        $avatar = $request->file('avatar');


        $avatarName = date('YmdHis_') . Str::slug($request->input('username')) . "." . $avatar->guessExtension();


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

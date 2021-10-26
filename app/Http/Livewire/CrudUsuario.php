<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;

class CrudUsuario extends Component
{
    use WithPagination;

    public $id_user, $name, $email, $profile_photo_path, $github;
    public $data;
    public $isOpen = false;

    public function render()
    {
        $data = $this->data;
        $users = DB::table('cliente')
            ->select('cliente.*')
            ->where(function ($query) use ($data) {
                $query = $query->orWhere('name', 'LIKE', "%$data%");
                $query = $query->orWhere('email', 'LIKE', "%$data%");
            })->paginate(10);
        return view('livewire.crud_user.user-crud', compact('users'));
    }

    public function store()
    {
//        if (!($this->id_user)) {
//            $this->validate(['password' => "required"]);
//        }

        $data = $this->validate([
            'name' => "required",
            'email' => 'required|email',
            'profile_photo_path' => 'required',
            'github' => 'required'

        ]);
        $data = $this->arrayResellerInitial();
        Client::updateOrCreate(['id_cliente' => $this->id_user], $data);
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'User actualizado con exito!!',
            'timeout' => 1000
        ]);
        $this->closeModal();
        $this->resetInputFields();
    }

    private function resetInputFields()
    {
        $this->id_user = null;
        $this->name = '';
        $this->email = '';
        $this->github = '';
        $this->profile_photo_path = '';

    }

    public function edit($id)
    {
        $user = Client::findOrFail($id);
        $this->id_user = $id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->github = '';
        $this->profile_photo_path = $user->profile_photo_path;
        $this->openModal();
    }

    public function delete($id)
    {
        $this->id_user = $id;
        Client::find($id)->delete();
        $this->emit('swal:alert', [
            'icon' => 'success',
            'title' => 'Registro eliminado con exito!!',
            'timeout' => 1000
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function arrayResellerInitial(): array
    {
        return array(
            'name' => $this->name,
            'email' => $this->email,
            'github' =>$this->github,
            'profile_photo_path' => $this->profile_photo_path,
        );
    }

}

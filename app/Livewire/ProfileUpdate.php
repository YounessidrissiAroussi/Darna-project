<?php

namespace App\Livewire;


use Livewire\Component;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class ProfileUpdate extends Component
{
  public $name;
  public $email;
  public $image;
  public $password;
  

 
public function update()
{
   
    $user = request()->user(); // Get the authenticated user
    $item = Profile::find($user->id); // Retrieve the user record from the database
   
        $item->update([
                'name' => $this->name,
                'email' => $item->email,
                'password' => Hash::make($this->password), // Hash the password
            ]);
           
            
            session()->flash('warning','Ur Profile updating successfully...');
            return redirect()->back()->with('success', 'User updated successfully');
    
   }
    public function render()
    {
        return view('livewire.profile-update',['user'=> request()->user()]);
    }
}

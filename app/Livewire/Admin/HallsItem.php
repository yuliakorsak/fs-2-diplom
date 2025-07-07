<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class HallsItem extends Component
{
    public $hall;

    public function deleteHall()
    {
        try {
            DB::beginTransaction();
            $this->hall->seats->each->delete();
            $this->hall->delete();
            DB::commit();
            return redirect(request()->header('Referer'));
        } catch (\Exception $e) {
            DB::rollBack();
            return response($e, 500);
        }
    }

    public function render()
    {
        return view('livewire.admin.halls-item');
    }
}

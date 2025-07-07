<?php

namespace App\Livewire\Admin\Forms;

use Livewire\Component;
use App\Models\Hall;
use App\Models\Seat;
use App\Livewire\Admin\OpenSales;
use Illuminate\Support\Facades\DB;

class NewHall extends Component
{
    public $active = false;

    public $title;
    public $rows_count;
    public $seats_count;
    public $price_standart;
    public $price_vip;

    protected $rules = [
        'title' => 'required|string|max:50',
        'rows_count' => 'required|integer|min:1',
        'seats_count' => 'required|integer|min:1',
        'price_standart' => 'required|integer|min:0',
        'price_vip' => 'required|integer|min:0',
    ];

    protected $messages = [
        'title.max' => 'Название не может быть длиннее 50 символов',
        '*.required' => 'Поле не должно быть пустым',
        '*.integer' => 'Значение должно быть целым числом',
        '*count.min' => 'Минимальное значение: 1',
        'price*.min' => 'Цена не может быть отрицательной',
    ];

    protected $listeners = ['new-hall' => 'openPopup'];

    public function openPopup()
    {
        $this->active = true;
    }
    public function discard()
    {
        $this->reset();
        $this->resetValidation();
        $this->active = false;
    }

    public function save()
    {
        $this->validate();
        try {
            
            DB::beginTransaction();
            $hall = Hall::create([
                'title' => $this->title,
                'rows_count' => intval($this->rows_count),
                'seats_count' => intval($this->seats_count),
                'price_standart' => intval($this->price_standart),
                'price_vip' => intval($this->price_vip),
                'active' => false,
            ]);
            for ($i = 1; $i <= intval($this->rows_count); $i++) {
                for ($j = 1; $j <= intval($this->seats_count); $j++) {
                    Seat::create([
                        'hall_id' => $hall->id,
                        'row' => $i,
                        'seat' => $j,
                        'type' => 'standart',
                    ]);
                }
            }
            DB::commit();
            $this->dispatch('inactive-hall')->to(OpenSales::class);
            return redirect(request()->header('Referer'));
        } catch (\Exception $e) {
            DB::rollback();
            return response($e, 500);
        }
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function render()
    {
        return view('livewire.admin.forms.new-hall');
    }
}

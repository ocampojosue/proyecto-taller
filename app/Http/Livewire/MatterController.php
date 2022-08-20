<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Matter;
use Livewire\WithPagination;

class MatterController extends Component
{
   use WithPagination;
   public $pageTitle, $componentName, $selected_id, $name, $search, $course, $grade;

   protected $paginationTheme = 'bootstrap';

   public function mount(){
      $this->pageTitle = 'LISTADO';
      $this->componentName = 'MATERIAS';
   }
   public function updatingSearch(){
      $this->resetPage();
   }
   protected $listeners = [
      'destroy'
   ];
   public function render()
   {
      if (strlen($this->search) > 0) {
         $matters = Matter::where('name', 'like', '%' . $this->search . '%')->paginate(5);
      } else {
         $matters = Matter::orderBy('id', 'desc')->paginate(5);
      }
      return view('livewire.matter.matter-controller', compact('matters'))
         ->extends('layouts.theme.app')
         ->section('content');
   }
   public function store(){
      $rules = [
         'name' => 'required|unique:matters|min:3',
      ];
      $messages = [
         'name.required' => 'Nombre de la Materia es requerido',
         'name.unique' => 'El nombre de la Materia ya existe',
         'name.min' => 'EL nombre de la Materia debe tener al menos 3 caracteres'
      ];
      $this->validate($rules, $messages);
      Matter::create([
         'name' => $this->name,
         'grade' => 'Primaria',
         'course' => 'Sexto',
      ]);
      $this->resetUI();
      $this->emit('matter-added', 'Materia agregada');
   }
   public function edit($id){
      $matter = Matter::find($id, ['id', 'name', 'grade', 'course']);
      $this->name = $matter->name;
      $this->course = $matter->course;
      $this->grade = $matter->grade;
      $this->selected_id = $matter->id;
      $this->emit('show-modal');
   }
   public function update(){
      $rules = [
         'name' => "required|unique:matters,name,{$this->selected_id}|min:3",
      ];
      $messages = [
         'name.required' => 'Nombre de la Materia es requerido',
         'name.unique' => 'El nombre de la Materia ya existe',
         'name.min' => 'EL nombre de la Materia debe tener al menos 3 caracteres'
      ];
      $this->validate($rules, $messages);
      $matter = Matter::find($this->selected_id);
      $matter->update([
         'name' => $this->name,
      ]);
      $this->resetUI();
      $this->emit('materia-updated', 'Materia Actualizada');
   }
   public function show($id){
      $matter = Matter::find($id, ['id', 'name', 'course', 'grade']);
      $this->name = $matter->name;
      $this->course = $matter->course;
      $this->grade = $matter->grade;
      $this->emit('show-matter', 'Show Modal!!');
   }
   public function resetUI(){
      $this->name = '';
      $this->selected_id = 0;
   }
   public function destroy(Matter $matter){
      $matter->delete();
      $this->emit('matter-deleted', 'Materia eliminada');
   }
}
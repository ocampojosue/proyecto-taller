@include('layouts.modals.modalHeader')
   <div class="form-group form-group-sm">
      <label for="name" class="font-weight-bold text-dark">Materia</label>
      <input type="text" class="form-control form-control-sm" wire:model="name" id="name" placeholder="Ingrese el Nombre de la Materia">
      @error('name')
         <span class="text-danger font-weight-bold ml-1">{{$message}}</span>
      @enderror
   </div>
@include('layouts.modals.modalFooter')
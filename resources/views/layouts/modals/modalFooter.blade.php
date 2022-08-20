         </div>
         <div class="modal-footer">
            @if ($selected_id < 1)
               <button wire:click="store()" type="button" class="btn btn-info">Guardar</button>
            @else
                <button wire:click="update()" type="button" class="btn btn-info">Actualizar</button>
            @endif
            <button type="button" class="btn btn-danger" onclick="closeModal()"> Cerrar</button>
         </div>
      </div>
   </div>
</div>
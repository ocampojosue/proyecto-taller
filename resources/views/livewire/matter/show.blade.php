<div wire:ignore.self class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header ">
            <h5 class="modal-title" id="showModalLabel">
               <b>Ver | {{$componentName}}</b>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-x text-dark font-weight-bold">
                  <line x1="18" y1="6" x2="6" y2="18"></line>
                  <line x1="6" y1="6" x2="18" y2="18"></line>
               </svg>
            </button>
         </div>
         <div class="modal-body">
            <div>
               <label for="">
                  <h6>
                     <b>Nombre de la Materia: </b>
                  </h6>
               </label> {{$name}}
            </div>
            <div>
               <label for="">
                  <h6>
                     <b>Curso: </b>
                  </h6>
               </label> {{$course}}
            </div>
            <div>
               <label for="">
                  <h6>
                     <b>Grado: </b>
                  </h6>
               </label> {{$grade}}
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" onclick="closeModal()"> Cerrar</button>
         </div>
      </div>
   </div>
</div>
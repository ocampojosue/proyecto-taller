<div>
   <div class="layout-px-spacing">
      <div class="row">
         <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
               <div class="widget-header">
                  <div class="row px-4 mt-3">
                     <div class="col-xl-6 col-md-8 col-sm-8 col-11">
                        <h3>{{$pageTitle}} | {{$componentName}}</h3>
                     </div>
                     <div class="col-xl-6 col-md-4 col-sm-4 col-1">
                        <a href="javascript:void(0)" class="btn btn-sm btn-success mb-2 float-right" data-toggle="modal"
                           data-target="#theModal">
                           AGREGAR
                        </a>
                     </div>
                  </div>
                  <div class="row px-3">
                     <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        @include('livewire.search-controller')
                     </div>
                  </div>
               </div>
               <div class="widget-content widget-content-area py-0">
                  <div class="table-responsive">
                     <table
                        class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                           <tr>
                              <th class="">Código</th>
                              <th class="">Nombre de Materia</th>
                              <th class="">Curso</th>
                              <th class="">Grado</th>
                              <th class="text-center">Acciones</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if ($matters->count())
                           @foreach ($matters as $matter)
                           <tr>
                              <td>
                                 <p class="mb-0">{{$matter->id}}</p>
                              </td>
                              <td>{{$matter->name}}</td>
                              <td>{{$matter->course}}</td>
                              <td>{{$matter->grade}}</td>
                              <td class="text-center">
                                 <ul class="table-controls">
                                    <li>
                                       <a href="javascript:void(0);" wire:click="show({{$matter->id}})">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-eye text-primary">
                                             <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                             <circle cx="12" cy="12" r="3"></circle>
                                          </svg>
                                       </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)" wire:click="edit({{$matter->id}})">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="feather feather-edit-2 text-success">
                                             <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                          </svg>
                                       </a>
                                    </li>
                                    <li>
                                       <a href="javascript:void(0)" onclick="Confirm('{{$matter->id}}')">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger">
                                             <polyline points="3 6 5 6 21 6"></polyline>
                                             <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                             </path>
                                             <line x1="10" y1="11" x2="10" y2="17"></line>
                                             <line x1="14" y1="11" x2="14" y2="17"></line>
                                          </svg>
                                       </a>
                                    </li>
                                 </ul>
                              </td>
                           </tr>
                           @endforeach
                           @else
                           <tr>
                              <td colspan="5">
                                 <h6 class="text-center">
                                    <b>No se encontraron coincidencias</b>
                                 </h6>
                              </td>
                           </tr>
                           @endif
                        </tbody>
                     </table>
                     {{$matters->links()}}
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="footer-wrapper">
         <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights
               reserved.</p>
         </div>
         <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                  fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-heart">
                  <path
                     d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                  </path>
               </svg></p>
         </div>
      </div>
   </div>
   @include('livewire.matter.form')
   @include('livewire.matter.show')
</div>
<script>
   document.addEventListener('DOMContentLoaded', function () {
      window.livewire.on('matter-added', msg => {
         $('#theModal').modal('hide')
         noty(msg)
      });
      window.livewire.on('materia-updated', msg => {
         $('#theModal').modal('hide')
         noty(msg)
      });
      window.livewire.on('show-modal', msg => {
         $('#theModal').modal('show')
      });
      window.livewire.on('show-matter', msg => {
         $('#showModal').modal('show')
      });
      window.livewire.on('matter-deleted', msg => {
         noty(msg)
      });
   });
   function Confirm(id) {
      swal({
         title: 'CONFIRMAR',
         text: '¿CONFIRMAS ELIMINAR EL REGISTRO?',
         type: 'warning',
         showCancelButton: true,
         cancelButtonText: 'Cancelar',
         cancelButtonColor: '#fff',
         confirmButtonColor: '#3b3f5c',
         confirmButtonText: 'Aceptar'
      }).then(function (result) {
         if (result.value) {
            window.livewire.emit('destroy', id)
            swal.close()
         }
      })
   }
   function closeModal(){
      $('#theModal').modal('hide')
   }
</script>
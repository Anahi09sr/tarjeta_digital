
<button class="btn btn-secondary newBtnElement" type="button" data-bs-toggle="modal" data-bs-target="#modalNvoCliente">Nuevo</button>
<div class="modal-cliente">
  <div class="modal" id="modalNvoCliente" aria-hidden="true" aria-labelledby="modalNvoCliente-gralLabel" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="modalNvoClienteLabel">Añadir nuevo <strong>Cliente</strong></h2>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="content-form">
            <form action="">
              <div class="form-floating mb-3"> 
                <input class="form-control form-control-lg" placeholder="RFC" type="text" name="rfc" maxlength="13"/>
                <label class="form-label" for="rfc">RFC</label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Nombre" type="text" name="nombre" maxlength="80" required="required"/>
                <label class="form-label" for="nombre">Nombre</label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Direccion" type="text" name="direccion" maxlength="100" required="required"/>
                <label class="form-label" for="direccion">Direccion  </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Estado" type="text" name="estado" maxlength="50" required="required"/>
                <label class="form-label" for="estado">Estado   </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Codigo Postal" type="text" name="cp" maxlength="5" required="required"/>
                <label class="form-label" for="cp">Código Postal</label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Regimen Fiscal" type="text" name="rf" maxlength="45"/>
                <label class="form-label" for="rf">Régimen Fiscal </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="telefono" type="text" name="telefono" maxlength="10" required="required"/>
                <label class="form-label" for="telefono">Télefono </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Nombre de contacto" type="text" name="nom_contacto" maxlength="50" required="required"/>
                <label class="form-label" for="nom_contacto">Nombre de contacto</label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Correo electronico" type="email" name="correo" maxlength="50" required="required"/>
                <label class="form-label" for="correo">Correo Electronico  </label>
              </div>
              <div class="form-floating mb-3">
                <input class="form-control form-control-lg" placeholder="Contraseña" type="password" name="password" maxlength="12" required="required"/>
                <label class="form-label" for="password">Contraseña</label>
              </div>
            </form>
          </div>
          <div class="modal-body__buttons"> 
            <button class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
            <button class="btn btn-success" data-bs-target="#modalCliente" data-bs-toggle="modal" data-bs-dismiss="modal">Guardar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalCliente" aria-hidden="true" aria-labelledby="modalCliente" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="modalCliente">Nuevo cliente </h3>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Cliente creado!</div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#modalCliente" data-bs-toggle="modal" data-bs-dismiss="modal">Cancelar </button>
          <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
</div>
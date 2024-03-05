<?php

include './components/head.php';
include './components/header-usuario.php';
include './model/conexion.php';
?>
<main class="control-tarjetas">
  <section class="tarjeta">
    <div class="tarjeta__title">
      <h1>Mis Tarjetas</h1>
    </div>
  </section>
  <section class="tarjeta__content">
    <?php include 'nueva-tarjeta.php'; ?>
    <div class="tab-content" id="myTabContent">
      <div class="tab-pane fade show active" id="usuario-tab-pane" role="tabpanel" aria-labelledby="usuario-tab" tabindex="0">
        <div class="content__tarjetas__tabs__item__body">
          <div class="table-wrapper content__tarjetas__tabs__item__body__table">
            <table class="display" id="myTable" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>N°</th>
                  <th>Nombre</th>
                  <th>Empresa</th>
                  <th>Teléfono</th>
                  <th>Correo electrónico</th>
                  <th>Ver/Editar</th>
                  <th>Eliminar</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = $bd->query("SELECT id_details, nombre,foto,empresa,logo,puesto,telefono,email1,email2,whatsapp,instagram,facebook,linkedin,tiktok,twitter,github,sitioWeb FROM details");
                $details = $query->fetchAll(PDO::FETCH_OBJ);
                if (!$details) {
                  echo "<tr><td colspan='6'>No existen Tarjetas</td></tr>";
                } else {
                  foreach ($details as $info) {
                ?>
                    <tr>
                      <td><?= $info->id_details; ?></td>
                      <td><?= $info->nombre; ?></td>
                      <td><?= $info->empresa; ?></td>
                      <td><?= $info->telefono; ?></td>
                      <td><?= $info->email1; ?></td>
                      <td>
                        <a href="editar_producto.php?id=<?= $info->id_details ?>" data-id="<?= $info->id_details ?>" data-bs-toggle="modal" data-bs-target="#modalEdit<?=$info->id_details ?>" title="Modificar">
                          <i class="bi bi-pencil-square" id="btn_editar"></i>
                        </a>
                      </td>
                      <td>
                        <a href="eliminar_producto.php?id=<?=$info->id_details ?>" data-id="<?=$info->id_details ?>" data-bs-toggle="modal" data-bs-target="#modalEliminar" title="Eliminar">
                        <i class="bi bi-trash3-fill" id="btn_eliminar"></i>
                        </a>
                      </td>
                    </tr>
                    <div class="modal-tarjeta">
                      <div class="modal fade" id="modalEdit<?=$info->id_details ?>" aria-hidden="true" aria-labelledby="modalEditar<?=$info->id_details ?>Label" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalEditar<?=$info->id_details ?>Label">Detalles de la <br /><strong>Tarjeta</strong></h5>
                              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <div class="content-form formulario-container" data-info-id="<?php echo $info->id_details; ?>">
                            <form action="./edit_tarjeta.php" id="formularioEditTarjeta<?= $info->id_details?>" method="POST" enctype="multipart/form-data">
    <!-- Agrega el campo oculto para id_details -->
    <input type="hidden" name="id_details" value="<?php echo $info->id_details; ?>">
                                <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg" value="<?= $info->nombre;?>" placeholder="nombre" type="text" name="nombre" maxlength="100" />
                                    <label class="form-label" for="nombre">Nombre</label>
                                  </div>
                                  <div class="mb-3 formEdit-img"><?php 
                                      $imagen_decodificada = base64_encode($info->foto);
                                      ?>
                                      <img class="" src="data:<?php echo "$info->tipofoto"?>;base64,<?php echo $imagen_decodificada;?>" alt="Imagen">
                                    <div class="formEdit-img__file">
                                      <label class="form-label" id="formFile" for="ctaImagen">Modificar foto</label>
                                      <input class="form-control form-control-lg" type="file" name="foto" id="foto<?= $info->id_details;?>" accept="image/jpeg, image/png/">
                                    </div> 
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg" value="<?= $info->empresa;?>" placeholder="Empresa" type="text" name="empresa" maxlength="50" required="required" />
                                    <label class="form-label" for="empresa">Empresa</label>
                                  </div>
                                  <div class="mb-3 formEdit-img"><?php 
                                      $imagen_decodificada = base64_encode($info->logo);
                                      ?>
                                      <img class="" src="data:<?php echo "$info->tipofoto"?>;base64,<?php echo $imagen_decodificada;?>" alt="Imagen">
                                    <div class="formEdit-img__file">
                                      <label class="form-label" id="formFile" for="ctaImagen">Modificar logo</label>
                                      <input class="form-control form-control-lg" type="file" name="logo" id="logo<?= $info->id_details;?>" accept="image/jpeg, image/png/">
                                    </div> 
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg" value="<?= $info->puesto;?>" placeholder="Puesto" type="text" name="puesto" maxlength="50" required="required" />
                                    <label class="form-label" for="puesto">Puesto</label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->telefono;?>" placeholder="telefono" type="text" name="telefono" maxlength="10" required="required" />
                                    <label class="form-label" for="telefono">Télefono </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->email1;?>" placeholder="Correo electronico" type="email" name="email1" maxlength="50" required="required" />
                                    <label class="form-label" for="correo">Correo Electronico </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->email2;?>" placeholder="Correo electronico" type="email" name="email2" maxlength="50" />
                                    <label class="form-label" for="correo2">Correo Electronico (opcional) </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->whatsapp;?>" placeholder="whatsApp" type="text" name="whatsapp" maxlength="10"  />
                                    <label class="form-label" for="whatsapp">WhatsApp </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->instagram;?>" placeholder="instagram" type="text" name="instagram" maxlength="80"  />
                                    <label class="form-label" for="instagram">Instagram </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->facebook;?>" placeholder="facebook" type="text" name="facebook" maxlength="80" />
                                    <label class="form-label" for="facebook">Facebook </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->linkedin;?>" placeholder="linkedin" type="text" name="linkedin" maxlength="80"  />
                                    <label class="form-label" for="linkedin">Linkedin </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->tiktok;?>" placeholder="tiktok" type="text" name="tiktok" maxlength="80"  />
                                    <label class="form-label" for="tiktok">Tik-tok </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->twitter;?>" placeholder="twitter" type="text" name="twitter" maxlength="80"  />
                                    <label class="form-label" for="twitter">Twitter </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->github;?>" placeholder="github" type="text" name="github" maxlength="80" " />
                                    <label class="form-label" for="github">Github </label>
                                  </div>
                                  <div class="form-floating mb-3">
                                    <input class="form-control form-control-lg"  value="<?= $info->sitioWeb;?>" placeholder="sitioweb" type="text" name="sitioWeb" maxlength="80"  />
                                    <label class="form-label" for="sitioWeb">Sitio web </label>
                                  </div>
                              </div>
                              <div class="form-floating mb-3">
                                <input type="hidden" value=1 name="oculto">
                              </div>
                              <div class="modal-body__buttons">
                                <button class="btn btn-danger btn-lg" data-bs-dismiss="modal" aria-label="Close" id="modalCancelarBtn">Cancelar</button>
                                <button class="btn btn-success btn-lg" type="submit" name="guardar">Editar</button>
                              </div>
                              <div class="form-floating mb-3">
                                <div class="" id="mensajeEditTarjeta<?=$info->id_details?>"></div>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal fade" id="modalEliminar" aria-hidden="true" aria-labelledby="modalEliminarLabel" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalEliminarModalLabel">Eliminar</h5>
                                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">¿Estas seguro que desdeas eliminar?</div>
                              <div class="modal-footer">
                                <button class="btn btn-primary" data-bs-target="#modalEliminar" data-bs-toggle="modal" data-bs-dismiss="modal">Cancelar </button>
                                <button id="confirmarEliminar" class="btn btn-secondary" type="button" data-bs-dismiss="modal">Aceptar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                  <?php }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        $('#myTable').DataTable();
      });
    </script>
  </section>
  <script src="./js/ajax_modal_editTarjeta.js"></script>
  <script src="js/script.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</main>
<?php include './components/footer-usuario.php'; ?>
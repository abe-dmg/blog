<!-- Barras de navegación laterales -->
<div class="row">
  <div class="col s12 m4 l3">
    <div class="card-panel">
      <span class="coral">
        <i class="material-icons left">view_list </i>
        Categorías
      </span>
    </div>
    <div class="collection z-depth-1">
      <?php $data->getCategories(); ?>
    </div>
  </div>
  <div class="col s12 m8 l9">
    <div class="card-panel">
      <span class="coral">
        <i class="material-icons left">library_books </i>
        Notas recientes
      </span>
    </div>
    <?php if(isset($_GET['idCategory'])){ { ?>
      <?php $data->getAllCategories(); ?>
    <?php } ?>
    <?php }else{ { ?>
      <?php $data->getAllNotes(); ?>
    <?php } ?>
    <?php }; ?>
  </div>
</div>
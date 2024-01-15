<!-- Cabezote -->
<header class="container-fluid bg-dark text-white">
    <div class="container">
        <div class="row">
            <!--=====================================
			LOGOTIPO

			pantalla dispositivo movil (vertical 320 px (col) - horizontal 576 px (col-sm-))
			pantalla dispositivo tablet (vertical 768 px (col-md-) - horizontal 1024 px (col-lg-))
			pantalla de escritorio 1366 px (col-xl-)
			======================================-->
            <div class="col-12 col-sm-3 col-lg-2 py-1 py-sm-4 py-md-3 logotipo">
                <img src="vistas/img/plantilla/logo.png" class="img-fluid pt-1">
            </div>

            <!-- Categorias y buscador -->
            <div class="col-12 col-sm-9 col-lg-5 pl-sm-4 pt-3">
                <div class="input-group mb-3">
                    <!--Boton izquierdo-->
                    <div class="input-group-append">
                        <button class="btn backColor" type="button" data-toggle="modal" data-target="#modalCategorias">
                            <span class="float-left pt-1 mx-2 small text-uppercase d-none d-md-block">Categorías</span>
                            <span class="float-righ mx-2">
                                <i class="fas fa-bars text-white"></i>
                            </span>
                        </button>  
                    </div>
                    <input type="text" class="form-control" placeholder="Buscar cursos">
                    <!--Boton derecho-->
                    <div class="input-group-append">
                        <button class="btn backColor" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i> <!-- Icono lupa -->
                        </button>  
                    </div>
                </div> 
            </div>

            <!-- Redes sociales top-->
            <div class="d-none d-lg-block col-lg-3 pt-lg-3 text-center">
                <ul class="list-inline pt-lg-1">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/" target="_blank">
                            <h3><i class="fab fa-facebook-square text-white"></i></h3>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/" target="_blank">
                            <h3><i class="fab fa-youtube-square text-white"></i></h3>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/" target="_blank">
                            <h3><i class="fab fa-twitter-square text-white"></i></h3>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a>
                            <h3><i class="fab fa-linkedin text-white"></i></h3>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.plus.google.com/" target="_blank">
                            <h3><i class="fab fa-google-plus-square text-white"></i></h3>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Ingreso usuarios top -->
            <div class="d-none d-lg-block col-lg-2 pt-lg-4">
                <ul class="list-inline">
                    <li class="list-inline-item text-white small">Ingresar</li>
                    <li class="list-inline-item text-white small">|</li>
                    <li class="list-inline-item text-white small">Registro</li>
                </ul>
            </div>

            <!-- Footer -->
            <div class="fixed-bottom bg-dark d-lg-none text-center pt-2 row">

                <!-- Redes sociales bottom -->
                <ul  class="list-inline col-12 col-sm-6 mb-0">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/" target="_blank">
                            <h3><i class="fab fa-facebook-square text-white"></i></h3>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/" target="_blank">
                            <h3><i class="fab fa-youtube-square text-white"></i></h3>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.twitter.com/" target="_blank">
                            <h3><i class="fab fa-twitter-square text-white"></i></h3>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/" target="_blank">
                            <h3><i class="fab fa-linkedin text-white"></i></h3>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.plus.google.com/" target="_blank">
                            <h3><i class="fab fa-google-plus-square text-white"></i></h3>
                        </a>
                    </li>
                </ul>

                <!-- Ingreso usuarios top -->
                <ul class="list-inline col-12 col-sm-6 mb-0">
                    <li class="list-inline-item text-white small">Ingresar</li>
                    <li class="list-inline-item text-white small">|</li>
                    <li class="list-inline-item text-white small">Registro</li>
                </ul>

            </div>

        </div>
    </div>
</header>

<!-- The Modal -->
<div class="modal" id="modalCategorias">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-0 border-0">

                <!-- Modal body -->
                <div class="modal-body p-0">
                    <button type="button" class="close pr-2 d-sm-none" data-dismiss="modal">&times;</button>

                    <div class="row">
                    
                    <!-- Categorias -->
                    <ul class="col-12 col-sm-6 col-lg-3 p-3 pl-4 listaCategorias">
                        <?php
                            $tabla = "categorias";
                            $item = null;
                            $valor = null;

                            $categorias = ControladorCategorias::ctrMostrarCATySUB($tabla,$item,$valor);
                    
                            foreach ($categorias as $key => $value) {
                                echo '<a href="#" class="text-secondary">
                                        <li class="small my-2" idCategoria="'.$value["id"].'"> 
                                            <span class="badge badge-pill"><i class="'.$value["icono"].'"></i></span>'.$value["categoria"].' 
                                         </li>
                                    </a>';
                            }
                        ?>
                    </ul>

                    <!-- Sub-categorias-->
                    <div class="d-none d-sm-block col-12 col-sm-6 col-lg-4 bg-light p-3 pl-4">
                        <h5 class="text-danger">Cursos de <span class="tituloCategoria"><?php echo $categorias[0]["categoria"]?></span></h5>
                        <hr>
                        <ul class="list-unstyled listaSubcategorias"> <!-- La clase list-unstyled es para quitar estilos de la lista-->
                            <?php
                                $tabla = "subcategorias";
                                $item = "id_categoria";
                                $valor = 1;

                                $subcategorias = ControladorCategorias::ctrMostrarCATySUB($tabla,$item,$valor);

                                foreach ($subcategorias as $key => $value) {
                                    echo '<a href="#" class="text-secondary">
                                            <li class="small my-2">'.$value["subcategoria"].'</li>
                                        </a>';
                                }
                            ?>
                        </ul>
                    </div>
                    <!-- DESCRIPCIÓN BREVE CATEGORIA -->
                    <div class="d-none d-lg-block col-lg-5 pt-3">
                        <div class="card mr-lg-3">
                            <img class="card-img-top imgCategoria" src="<?php echo $categorias[0]["imgOferta"];  ?>">
                            <div class="card-body">
                                <h5 class="card-title text-danger">Cursos de <span class="tituloCategoria"><?php echo $categorias[0]["categoria"]?></span></h5>
                                <p class="card-text small desCategoria"><?php echo $categorias[0]["descripcion"]?></p>
                                <a href="#" class="btn backColor">Ver cursos</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Botonera auxiliar -->
<div class="container">
    <div class="row p-0">

        <!-- Categorias -->
        <div class="col-md-11 p-0">
            <ul class="nav nav-tabs nav-justified border-bottom-0">
                <div class="nav-item dropdown botoneraAuxiliar">
                    <a class="nav-link dropdown-toggle text-secondary small" href="#" data-toggle="dropdown">Otros</a>
                    <div class="dropdown-menu dropdown-menu-right botoneraOtros"></div>
                </div>
            </ul>
        </div>

        <!-- Idiomas -->
        <div class="col-md-1 dropdown p-sm-1 mt-1 mt-sm-0">
            <button type="button" class="btn btn-secondary dropdown-toggle w-100 btn-sm" data-toggle="dropdown">
		    	 <small>ES</small>
		 	 </button>
             <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item small" href="#">Inglés</a>
				<a class="dropdown-item small" href="#">Español</a>
             </div>
        </div>
    </div>
</div>
<?php include '../views/navbar.php'; ?> <!-- Incluye el navbar aquí -->

</header>

<!--panel principal-->

<div class="main-image">
    <div class="container-image">
        <h1><span>Bienvenidos</span></h1>
        <span class="cen">Diseño web</span>
        <a class="button" href="#">Click here</a>

    </div>
</div>

<!--Apartado de mision, vision y valores (tarjetas y model)-->

<section id="componentes">
<div class="contenedor">
    <br>
    <br>
    <h2 class="text-center">Conoce más acerca de nosotros</h2>
    <br>
    <br>
</div>
<!-- Misión -->
<div class="row">
    <div class="col-md-4">
        <div class="card-1">
            <img src="../public/imagenes/Misión.gif" class="card-img-top" alt="Misión">
            <div class="card-body">
                <br>
                <h5>Nuestra Misión</h5>
                <section class="container my-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MisionModal">
                        Ver más
                    </button>
                </section>

                <!-- Modal Misión -->
                <div class="modal fade" id="MisionModal" tabindex="-1" aria-labelledby="MisionModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="MisionModalLabel">Nuestra Misión</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Ofrecer productos de calidad que mejoren la vida de nuestros clientes,
                                con un servicio excepcional y un compromiso constante con la innovación
                                y la sostenibilidad.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Visión -->
    <div class="col-md-4">
        <div class="card-2">
            <img src="../public/imagenes/Visión.gif" class="card-img-top" alt="Visión">
            <div class="card-body">
                <br>
                <h5>Nuestra Visión</h5>
                <section class="container my-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#VisionModal">
                        Ver más
                    </button>
                </section>

                <!-- Modal Visión -->
                <div class="modal fade" id="VisionModal" tabindex="-1" aria-labelledby="VisionModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="VisionModalLabel">Nuestra Visión</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Ser la empresa líder en soluciones innovadoras y sostenibles que impacten positivamente la vida de nuestros clientes, inspirando confianza y compromiso en cada experiencia. Nos esforzamos por establecer un estándar de excelencia en calidad y servicio,
                                con el objetivo de contribuir a un futuro más saludable y responsable para la sociedad y el planeta.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Valores -->
    <div class="col-md-4">
        <div class="card-3">
            <img src="../public/imagenes/Valores.gif" class="card-img-top" alt="Valores">
            <div class="card-body">
                <br>
                <h5>Nuestros Valores</h5>
                <section class="container my-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ValoresModal">
                        Ver más
                    </button>
                </section>

                <!-- Modal Valores -->
                <div class="modal fade" id="ValoresModal" tabindex="-1" aria-labelledby="ValoresModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ValoresModalLabel">Nuestros Valores</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ol>
                                    <li>
                                        Calidad: Nos comprometemos a ofrecer productos y servicios que superen las expectativas de nuestros clientes, asegurando altos estándares en cada etapa.
                                    </li>

                                    <li>
                                        Innovación: Fomentamos un ambiente creativo y dinámico donde las ideas nuevas impulsan nuestro crecimiento y nos permiten adaptarnos a los cambios del mercado.
                                    </li>
                                    <li>
                                        Sostenibilidad: Valoramos el cuidado del medio ambiente y asumimos la responsabilidad de minimizar nuestro impacto ecológico, promoviendo prácticas sostenibles en toda la empresa.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>


<br>
<br>
<!--lista de productos-->
<h1>Lista de productos</h1>
<br>
<br>

<ol class="list-group list-group-numbered">
<li class="list-group-item d-flex justify-content-between align-items-start">
<div class="ms-2 me-auto">
    <div class="fw-bold">Barra de chocolate</div>
    Un dulce que tiene mucho chocolate.
</div>
<span class="badge text-bg-primary rounded-pill">10</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-start">
<div class="ms-2 me-auto">
    <div class="fw-bold">Cereales</div>
    Alimento perfecto para los desayunos.
</div>
<span class="badge text-bg-primary rounded-pill">14</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-start">
<div class="ms-2 me-auto">
    <div class="fw-bold">Subheading</div>
    Content for list item
</div>
<span class="badge text-bg-primary rounded-pill">14</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
        <div class="fw-bold">Subheading</div>
        Content for list item
    </div>
    <span class="badge text-bg-primary rounded-pill">14</span>
    </li>
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="ms-2 me-auto">
            <div class="fw-bold">Subheading</div>
            Content for list item
        </div>
        <span class="badge text-bg-primary rounded-pill">14</span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Subheading</div>
                Content for list item
            </div>
            <span class="badge text-bg-primary rounded-pill">14</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">Subheading</div>
                    Content for list item
                </div>
                <span class="badge text-bg-primary rounded-pill">14</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Subheading</div>
                        Content for list item
                    </div>
                    <span class="badge text-bg-primary rounded-pill">14</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold">Subheading</div>
                            Content for list item
                        </div>
                        <span class="badge text-bg-primary rounded-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">Subheading</div>
                                Content for list item
                            </div>
                            <span class="badge text-bg-primary rounded-pill">14</span>
                            </li>
</ol>


<!--Carrusel de imagenes-->
<section id="carrusel" class="container my-5">
    <h2 class="text-center">Carrusel de imagenes</h2>
    <br>
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="../public/imagenes/imagen1.jpg" class="d-block w-50 mx-auto" alt="1">
        </div>
        <div class="carousel-item">
            <img src="../public/imagenes/imagen2.jpg" class="d-block w-50 mx-auto" alt="2">
        </div>
        <div class="carousel-item">
            <img src="../public/imagenes/imagen3.jpg" class="d-block w-50 mx-auto" alt="3">
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bg-black" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon bg-black" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


<!--tarjetas de información-->

<section id="componentes">
    <div class="contenedor">
        <br>
        <br>
        <h2 class="text-center"> Tarjetas de información</h2>
        <br>
        <br>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card-1">
                <img src="../public/imagenes/productos.png" class="card-img-top" alt="ejemplo de tarjeta1">
                <div class="card-body">
                    <h5>Nuestros Productos</h5>
                    <p class="card-text">Los productos podemos visualizarlos según la disponibilidad que se encuentre según los administradores.</p>
                    

                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card-2">
                <img src="../public/imagenes/usuarios.png" class="card-img-top" alt="ejemplo de tarjeta2">
                <div class="card-body">
                    <h5>Nuestros Usuarios</h5>
                    <p class="card-text">Los usuarios se pueden registrar con el fin de visyualixzar los productos y hacer pedidos en nuestra tienda.</p>
                    

                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card-3">
                <img src="../public/imagenes/pedido.png" class="card-img-top" alt="ejemplo de tarjeta3">
                <div class="card-body">
                    <h5>Nuestros Pedidos</h5>
                    <p class="card-text">Son realizados con por los usuarios dependiendo lo que deseen.</p>
                    
                    <br>
                    <br>
                    <br>
                </div>

            </div>
        </div>




<!--Formulario para registrar usuarios-->

<section id="contenedor-registro my-6">
<div class="contenedor-registro">
    <h1> Formulario para el registro del usuario</h1>
    <form>

        <div class="form-group">
            <label1> Nombre del usuario:</label1>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
            
        </div>
        <br>


        <div class="form-group">
            <label2> Correo electronico:</label2>
            <input type="text" id="correo" name="correo"
                placeholder="Ingrese su correo electronico" required>
        </div>
        <br>

        <div class="form-group">
            <label3> Numero de telefono</label3>
            <input type="text" id="telefono" name="telefono"
            placeholder="Introduce su numero de telefono" required>
            
        </div>
        <br>
        <br>

        <div class="form-group">
            <button type="submit"> Guardar usuario </button>

        </div>
        
    </form>
</div>
</section>





    <!--redes sociales-->
    <div class="redsocial">
        <img src="imagenes/redes sociales.png" alt="">

    </div>
    <div class="container-social">
        <ul>
            <li class="instagram"><a href="https://www.instagram.com/honey69sugat/"
                    target="_blank">
                    <i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
            <li class="google"><a href="https://mail.google.com/mail/u/0/#inbox?compose=new"
                    target="_blank">
                    <i class="fa fa-google fa-2x" aria-hidden="true"></i></a></li>
            <li class="whatsapp"><a href="https://api.whatsapp.com/send?phone=3206831437"
                    target="_blank"><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>
</div>
</div>



<?php include '../views/footer.php'; ?> <!-- Incluye el footer aquí -->
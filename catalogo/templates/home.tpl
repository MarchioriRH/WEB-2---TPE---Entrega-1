{include file="header.tpl"}
    <div class="container">
        <section class="catalogo">
            <h1>Catalogo de Vehiculos 2021</h1>
            <div>
                <a class="btn btn-danger" href="verCatalogoCompleto">Ver todos los items</a>
                <a class="btn btn-danger" href="deleteTask/'.$tarea->id_tarea.'">Ver todas las categorias</a>
            </div>
        </section>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./img/catalogo/Aprilia-RS-660-3_600x374.jpg" class="d-block w-100" alt="Aprilia RS-660">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Aprilia RS-660</h5>
                        <p>0 km - Fecha de ingreso al pais a confirmar.</p>
                    </div>
            </div>
            <div class="carousel-item">
                <img src="./img/catalogo/Ford_F-150_Raptor_2021_600x344.jpg" class="d-block w-100" alt="F150 Raptor">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>F150 Raptor</h5>
                        <p>0 km - Modelo 2021 - Disponible para entrega inmediata.</p>
                    </div>
            </div>
            <div class="carousel-item">
                <img src="./img/catalogo/2011LamborghiniAventador_497x227.jpg" class="d-block w-100" alt="Lamborghini Aventador 2011">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Lamborghini Aventador</h5>
                        <p>1245 kms - Modelo 2011 - Disponible para entrega inmediata</p>
                    </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

{include file="footer.tpl"}
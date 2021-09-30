<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo</title>
    <link rel="icon" href="img/koe.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header class="header">
        <div class="container-cabecera">
            <div class="cabecera-izq">
                <div class="logo">
                    <img class="imagen" src="img/koe.ico" alt="logo">
                </div>
                <div class="your-car">
                    <a href="catalogo" id="your">YOUR</a>
                    <a href="catalogo" id="car">CAR</a>
                </div>
            </div>
            <div class="menu">
                <ul class="navigation">
                        <li><a href="catalogo">HOME</a></li>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                CATALOGO
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="verCatalogoCompleto">Ver todos los vehiculos</a>
                                <a class="dropdown-item" href="verCatalogoCategoria">Ver todas las categorias</a>
                            </ul>
                        </div>
                        <li><a href="login">LOGIN</a></li>
                        <li><a href="registro">REGISTRO</a></li>
                    </ul>
            </div>
            <div class="btn_menu"> 
                    <div class="menu">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                MENU
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                                <a class="dropdown-item" href="catalogo">HOME</a>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header">CATALOGO</h6>
                                <a class="dropdown-item" href="verCatalogoCompleto">Ver todos los vehiculos</a>
                                <a class="dropdown-item" href="verCatalogoCategoria">Ver todas las categorias</a>
                                <div class="dropdown-divider"></div>
                                <h6 class="dropdown-header"></h6>
                                <a class="dropdown-item" href="login">LOGIN</a>
                                <a class="dropdown-item" href="registro">REGISTRO</a>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
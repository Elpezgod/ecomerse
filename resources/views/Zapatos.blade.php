
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->


        <style>
        /* Estilos básicos */
        body {
            background-image: url('{{ asset('img/FONDO.jpg') }}'); /* Usando la función asset de Laravel */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif; /* Ajusta la fuente según tu preferencia */
        }

        .interaction-bar {
            position: fixed;
            top: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            border-bottom-left-radius: 10px;
        }

        .interaction-bar a {
            margin-left: 10px;
            color: #666;
            text-decoration: none;
            font-weight: bold;
        }

        .interaction-bar a:hover {
            color: #333;
        }

        .interaction-bar-left {
        display: flex;
        align-items: center;
    }

    .dropdown {
        position: relative;
    }

    .dropbtn {
        background-color: #ffffff;
        color: black;
        padding: 12px;
        font-size: 16px;
        border: none;
        cursor: pointer;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #f1f1f1;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #f1f1f1;}

    .interaction-bar-left a {
        padding: 12px;
        text-decoration: none;
        color: black;
    }
    .mensaje {
    display: none;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    margin-top: 10px;
  }
  .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Fondo semitransparente */
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 999; /* Asegura que esté por encima de otros elementos */
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
        }
        /* Estilos adicionales para el formulario */
        input[type="text"], input[type="email"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>

<!-- Barra de interacciones -->
<div class="interaction-bar">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Log in</a>
            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    @endif
</div>
<div>
<div class="interaction-bar-left">
    <div class="dropdown">
        <button class="dropbtn">Categorías</button>
        <div class="dropdown-content">
            <a href="{{ url('/welcome') }}">Playera</a>
            <a href="{{ url('/Zapatos') }}"style="background-color: pink; color: black;">Zapatos</a>
            <a href="{{ url('/Pantalones') }}">Pantalones</a>
            <a href="{{ url('/Tenis') }}">Tenis</a>
        </div>
    </div>
    <div id="carrito-container">
        <a href="#" id="carrito">Carrito</a>
    </div>
</div>

  
</div>
<!-- Contenido principal -->
<div style="margin-top: 50px; display: flex; flex-wrap: wrap; justify-content: center; align-items: flex-start;">
    <!-- Imagen 1 -->
    <div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA1.jpeg') }}" alt="Producto 1" style="width: 50%; height: auto; border-radius: 20px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">Playera Veraniega $150</p>
        <div>
                <button id="agregarAlCarrito1" style="margin-right: 10px;">Agregar al carrito</button>
                <button id="mostrarFormulario">Comprar</button>
            </div>
        </div>
    </div>

    <div id="formularioEmergente" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999; justify-content: center; align-items: center;">
    <div style="background-color: white; padding: 20px; border-radius: 10px;">
        <h2>Completa tu Compra</h2>
        <form id="formularioCompra">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br><br>
            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br><br>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required><br><br>
            <label for="correo">Correo electrónico:</label>
            <input type="email" id="correo" name="correo" required><br><br>
            <button type="submit">Enviar</button>
            <button id="cerrarFormulario">Cerrar</button>
        </form>
        <button id="cerrarFormulario">Cerrar</button>
    </div>
</div>


    <!-- Imagen 2 -->
<div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA2.jpeg') }}" alt="Producto 2" style="width: 50%; height: auto; border-radius: 10px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">Descripción del producto 2</p>
        <div>
            <button id="agregarAlCarrito2" style="margin-right: 10px;">Agregar al carrito</button>
            <button class="mostrarFormulario">Comprar</button>
        </div>
    </div>
</div>

<!-- Imagen 3 -->
<div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA3.jpeg') }}" alt="Producto 3" style="width: 50%; height: auto; border-radius: 10px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">Descripción del producto 3</p>
        <div>
            <button id="agregarAlCarrito3" style="margin-right: 10px;">Agregar al carrito</button>
            <button class="mostrarFormulario">Comprar</button>
        </div>
    </div>
</div>

<!-- Imagen 4 -->
<div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA4.jpeg') }}" alt="Producto 4" style="width: 50%; height: auto; border-radius: 10px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">Descripción del producto 4</p>
        <div>
            <button id="agregarAlCarrito4" style="margin-right: 10px;">Agregar al carrito</button>
            <button class="mostrarFormulario">Comprar</button>
        </div>
    </div>
</div>

<!-- Imagen 5 -->
<div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA5.jpeg') }}" alt="Producto 5" style="width: 50%; height: auto; border-radius: 10px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">PLAYERA DE CONSOLA $120</p>
        <div>
            <button id="agregarAlCarrito5" style="margin-right: 10px;">Agregar al carrito</button>
            <button class="mostrarFormulario">Comprar</button>
        </div>
    </div>
</div>

<!-- Imagen 6 -->
<div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA6.jpeg') }}" alt="Producto 6" style="width: 50%; height: auto; border-radius: 10px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">PLAYERA DE VIDEOJUEGOS $100</p>
        <div>
            <button id="agregarAlCarrito6" style="margin-right: 10px;">Agregar al carrito</button>
            <button class="mostrarFormulario">Comprar</button>
        </div>
    </div>
</div>



<script>
    document.getElementById("agregarAlCarrito1").addEventListener("click", function() {
        alert("Agregado exitosamente al carrito.");
    });
    document.getElementById("agregarAlCarrito2").addEventListener("click", function() {
        alert("Agregado exitosamente al carrito.");
    });
    document.getElementById("agregarAlCarrito3").addEventListener("click", function() {
        alert("Agregado exitosamente al carrito.");
    });
    document.getElementById("agregarAlCarrito4").addEventListener("click", function() {
        alert("Agregado exitosamente al carrito.");
    });
    document.getElementById("agregarAlCarrito5").addEventListener("click", function() {
        alert("Agregado exitosamente al carrito.");
    });
    document.getElementById("agregarAlCarrito6").addEventListener("click", function() {
        alert("Agregado exitosamente al carrito.");
    });

    document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('mostrarFormulario').addEventListener('click', function() {
                document.getElementById('formularioEmergente').style.display = 'flex';
            });

            document.getElementById('formularioCompra').addEventListener('submit', function(event) {
                // Aquí puedes agregar la lógica para enviar los datos del formulario
                alert('¡Gracias por tu compra!');
                // Aquí puedes agregar el código para enviar los datos del formulario al servidor si lo necesitas
                document.getElementById('formularioEmergente').style.display = 'none'; // Oculta el formulario después de enviar
                event.preventDefault(); // Evita que el formulario se envíe realmente
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
    var botonesFormulario = document.querySelectorAll('.mostrarFormulario');

    botonesFormulario.forEach(function(boton) {
        boton.addEventListener('click', function() {
            document.getElementById('formularioEmergente').style.display = 'flex';
        });
    });

    document.getElementById('formularioCompra').addEventListener('submit', function(event) {
        // Aquí puedes agregar la lógica para enviar los datos del formulario
        alert('¡Gracias por tu compra!');
        // Aquí puedes agregar el código para enviar los datos del formulario al servidor si lo necesitas
        document.getElementById('formularioEmergente').style.display = 'none'; // Oculta el formulario después de enviar
        event.preventDefault(); // Evita que el formulario se envíe realmente
    });

    // Evento clic en el botón de cerrar formulario
    document.getElementById('cerrarFormulario').addEventListener('click', function() {
        // Oculta el formulario
        document.getElementById('formularioEmergente').style.display = 'none';
    });
});

</script>
 
    
</body>
</html>
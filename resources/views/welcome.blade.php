
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Hola bienvenido!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="scripts.js"></script>
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

.dropdown-content a:hover {
    background-color: #f1f1f1;
}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #f1f1f1;
}

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

/* Estilos para el carrito */
#carrito {
    display: none;
    position: fixed;
    top: 50px;
    left: 50%;
    transform: translateX(-50%);
    width: 400px;
    max-height: 80%;
    overflow-y: auto;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
    padding: 20px;
}

#carrito h3 {
    text-align: center;
    margin-bottom: 15px;
    font-size: 1.5rem;
    color: #333;
}

#carrito #productos {
    max-height: 300px;
    overflow-y: auto;
    padding-right: 15px;
}

#carrito hr {
    margin-top: 15px;
    margin-bottom: 15px;
    border: 0.5px solid #ddd;
}

#carrito #total {
    font-weight: bold;
    text-align: right;
    margin-top: 10px;
    font-size: 1.2rem;
}

#carrito #cerrarCarrito {
    background-color: #333;
    color: white;
    border: none;
    padding: 8px 15px;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    float: right;
}

#carrito #cerrarCarrito:hover {
    background-color: #555;
}

/* Estilos para el botón de eliminar producto */
.eliminar-producto {
    background-color: #050C9C; /* Color de fondo azul */
    color: white; /* Color de texto blanco */
    border: none; /* Sin borde */
    padding: 5px 10px; /* Relleno interno */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambiar cursor al pasar el mouse */
}

.eliminar-producto:hover {
    background-color: #68D2E8; /* Color de fondo azul claro al pasar el mouse */
}

body {
    font-family: Arial, sans-serif;
}

/* #carrito-container {
    position: fixed;
    top: 10px;
    right: 10px;
} */

#carrito-container a {
    text-decoration: none;
    color: #333;
    font-size: 1.2rem;
    margin-right: 10px;
}

#contador-carrito {
    background-color: #dc3545;
    color: white;
    border-radius: 50%;
    padding: 0 8px;
    font-size: 1rem;
}

#formularioEmergente {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 400px; /* Aumentar el ancho */
    padding: 25px; /* Aumentar el padding */
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    z-index: 1001;
}

#formularioEmergente h3 {
    text-align: center;
    margin-bottom: 25px; /* Aumentar el margen inferior */
    font-size: 1.5rem;
    color: #333;
}

#formularioEmergente form div {
    margin-bottom: 20px; /* Aumentar el margen inferior */
}

#formularioEmergente label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

#formularioEmergente input {
    width: calc(100% - 16px); /* Ajustar el ancho para el nuevo padding */
    padding: 10px; /* Aumentar el padding */
    border: 1px solid #ccc;
    border-radius: 4px;
}

#formularioEmergente button {
    width: 100%;
    padding: 12px 0; /* Aumentar el padding */
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

#formularioEmergente button[type="submit"] {
    background-color: #28a745;
    color: white;
    margin-bottom: 10px;
}

#formularioEmergente button#cerrarFormulario {
    background-color: #dc3545;
    color: white;
}
.favorito-activo svg {
        fill: red;
    }

    </style>
</head>
<body>

<!-- Barra de interacciones -->
<div class="interaction-bar">
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}">Home</a>
            <div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            </div>
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
            <a href="{{ url('/Playeras') }}" style="background-color: pink; color: black;">Playera</a>
            <!-- <a href="{{ url('/Zapatos') }}">Zapatos</a> -->
            <a href="{{ url('/Pantalones') }}">Pantalones</a>
            <a href="{{ url('/Tenis') }}">Tenis</a>
        </div>
    </div>
    <div id="carrito-container">
    <a href="#" id="mostrar-carrito">Carrito</a>
    <span id="contador-carrito">0</span>
</div>
</div>

  
</div>
<!-- Contenido principal -->
<div style="margin-top: 50px; display: flex; flex-wrap: wrap; justify-content: center; align-items: flex-start;">

<div id="carrito" style="display: none; position: fixed; top: 50px; left: 50%; transform: translateX(-50%); width: 400px; max-height: 80%; overflow-y: auto; background-color: #f9f9f9; border: 1px solid #ccc; border-radius: 8px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); z-index: 1000;">
        <h3 style="text-align: center; margin-bottom: 15px; font-size: 1.5rem; color: #333;">Carrito de Compras</h3>
        <div id="productos" style="max-height: 300px; overflow-y: auto; padding-right: 15px;"></div>
        <hr style="margin-top: 15px; margin-bottom: 15px; border: 0.5px solid #ddd;">
        <p id="total" style="font-weight: bold; text-align: right; margin-top: 10px; font-size: 1.2rem;">Total: $0</p>
        <button id="confirmarCompra" style="background-color: #28a745; color: white; border: none; padding: 8px 15px; font-size: 1rem; border-radius: 5px; cursor: pointer; float: right; margin-right: 10px;">Confirmar compra</button>
        <button id="cerrarCarrito" style="background-color: #333; color: white; border: none; padding: 8px 15px; font-size: 1rem; border-radius: 5px; cursor: pointer; float: right;">Cerrar</button>
    </div>


    
    <div id="formularioEmergente" style="display: none;">
        
        <form id="formularioCompra">
        <h3>Formulario de Compra</h3>
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="direccion">Dirección:</label>
                <input type="text" id="direccion" name="direccion" required>
            </div>
            <div>
                <label for="telefono">Teléfono:</label>
                <input type="text" id="telefono" name="telefono" required>
            </div>
            <button type="submit">Enviar</button>
            <button id="cerrarFormulario" type="button">Cerrar</button>
        </form>

    </div>

    <!-- Imagen 1 -->
    <div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
        <img src="{{ asset('img/IA1.jpeg') }}" alt="Producto 1" style="width: 50%; height: auto; border-radius: 20px;">
        <div style="padding: 10px; text-align: center;">
            <p style="margin-bottom: 10px; font-weight: bold;">Playera Veraniega $150</p>
            <div>
                <button id="agregarAlCarrito1" style="margin-right: 10px;">Agregar al carrito</button>
                <button id="favorito1" onclick="toggleFavorito(this)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.85 4.5 2.14C13.09 3.85 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </button>
        </div>
    </div>
</div>



    <!-- Imagen 2 -->
<div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA2.jpeg') }}" alt="Producto 2" style="width: 50%; height: auto; border-radius: 10px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">Playera adventure 2024 $100</p>
        <div>
            <button id="agregarAlCarrito2" style="margin-right: 10px;">Agregar al carrito</button>
            <button id="favorito1" onclick="toggleFavorito(this)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.85 4.5 2.14C13.09 3.85 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Imagen 3 -->
<div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA3.jpeg') }}" alt="Producto 3" style="width: 50%; height: auto; border-radius: 10px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">Playera Blanca Logo 2022 $160</p>
        <div>
            <button id="agregarAlCarrito3" style="margin-right: 10px;">Agregar al carrito</button>
            <button id="favorito1" onclick="toggleFavorito(this)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.85 4.5 2.14C13.09 3.85 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </button>
        </div>
    </div>
</div>


<!-- Imagen 4 -->
<div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA4.jpeg') }}" alt="Producto 4" style="width: 50%; height: auto; border-radius: 10px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">Playera TBOI ISSAC 2024 $200</p>
        <div>
            <button id="agregarAlCarrito4" style="margin-right: 10px;">Agregar al carrito</button>
            <button id="favorito1" onclick="toggleFavorito(this)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.85 4.5 2.14C13.09 3.85 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </button>
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
            <button id="favorito1" onclick="toggleFavorito(this)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.85 4.5 2.14C13.09 3.85 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<!-- Imagen 6 -->
<div style="flex: 0 0 calc(33.33% - 20px); margin-bottom: 40px; display: flex; flex-direction: column; align-items: center;">
    <img src="{{ asset('img/IA6.jpeg') }}" alt="Producto 6" style="width: 50%; height: auto; border-radius: 10px;">
    <div style="padding: 10px; text-align: center;">
        <p style="margin-bottom: 10px; font-weight: bold;">PLAYERA DE JUEGOS $100</p>
        <div>
            <button id="agregarAlCarrito6" style="margin-right: 10px;">Agregar al carrito</button>
            <button id="favorito1" onclick="toggleFavorito(this)">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.85 4.5 2.14C13.09 3.85 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                </svg>
            </button>
        </div>
    </div>
</div>
<div>   


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

    $(document).ready(function() {
    let cantidadProductosCarrito = 0;

    // Función para agregar productos al carrito
    function agregarProductoAlCarrito(productoHTML, precio) {
        const productosContainer = $('#productos');
        const nuevoProducto = $(`
            <div class="producto-carrito">
                ${productoHTML}
                <button class="eliminar-producto">Eliminar</button>
            </div>
        `);

        // Manejar clic en el botón de eliminar producto
        nuevoProducto.find('.eliminar-producto').on('click', function() {
            nuevoProducto.remove(); // Eliminar el producto del DOM

            // Recalcular el total
            let totalActual = 0;
            $('.producto-carrito').each(function() {
                const precioProducto = parseFloat($(this).find('.precio-producto').text().replace('$', ''));
                totalActual += precioProducto;
            });
            $('#total').text('Total: $' + totalActual.toFixed(2));

            // Decrementar el contador de productos
            cantidadProductosCarrito--;
            $('#contador-carrito').text(cantidadProductosCarrito);

            // Ocultar el carrito si ya no hay productos
            if (cantidadProductosCarrito === 0) {
                $('#carrito').hide();
            }
        });

        productosContainer.append(nuevoProducto);

        // Calcular el total
        const totalElement = $('#total');
        let totalActual = parseFloat(totalElement.text().replace('Total: $', '')) || 0;
        totalActual += precio;
        totalElement.text('Total: $' + totalActual.toFixed(2));

        // Incrementar el contador de productos en el carrito
        cantidadProductosCarrito++;
        $('#contador-carrito').text(cantidadProductosCarrito);
    }

    // Evento para mostrar/ocultar el carrito al hacer clic en el enlace "Carrito"
    $('#mostrar-carrito').on('click', function(e) {
        e.preventDefault();
        $('#carrito').toggle();
    });

    // Evento para cerrar el carrito
    $('#cerrarCarrito').on('click', function() {
        $('#carrito').hide();
    });

    // Eventos para agregar productos al carrito
    $('#agregarAlCarrito1').on('click', function() {
        const productoHTML = `
            <p class="nombre-producto" style="margin-bottom: 10px; font-weight: bold;">Playera Veraniega</p>
            <p class="precio-producto">$150</p>
            <img src="{{ asset('img/IA1.jpeg') }}" alt="Producto 1" style="width: 50%; height: auto; border-radius: 20px;">
        `;
        agregarProductoAlCarrito(productoHTML, 150);
    });

    $('#agregarAlCarrito2').on('click', function() {
        const productoHTML = `
            <p class="nombre-producto" style="margin-bottom: 10px; font-weight: bold;">Playera adventure 2024</p>
            <p class="precio-producto">$100</p>
            <img src="{{ asset('img/IA2.jpeg') }}" alt="Producto 2" style="width: 50%; height: auto; border-radius: 20px;">
        `;
        agregarProductoAlCarrito(productoHTML, 100);
    });

    $('#agregarAlCarrito3').on('click', function() {
        const productoHTML = `
            <p class="nombre-producto" style="margin-bottom: 10px; font-weight: bold;">Playera Blanca Logo 2022</p>
            <p class="precio-producto">$160</p>
            <img src="{{ asset('img/IA3.jpeg') }}" alt="Producto 3" style="width: 50%; height: auto; border-radius: 20px;">
        `;
        agregarProductoAlCarrito(productoHTML, 160);
    });

    $('#agregarAlCarrito4').on('click', function() {
        const productoHTML = `
            <p class="nombre-producto" style="margin-bottom: 10px; font-weight: bold;">Playera TBOI ISSAC 2024</p>
            <p class="precio-producto">$200</p>
            <img src="{{ asset('img/IA4.jpeg') }}" alt="Producto 4" style="width: 50%; height: auto; border-radius: 20px;">
        `;
        agregarProductoAlCarrito(productoHTML, 200);
    });

    $('#agregarAlCarrito5').on('click', function() {
        const productoHTML = `
            <p class="nombre-producto" style="margin-bottom: 10px; font-weight: bold;">PLAYERA DE CONSOLA</p>
            <p class="precio-producto">$120</p>
            <img src="{{ asset('img/IA5.jpeg') }}" alt="Producto 5" style="width: 50%; height: auto; border-radius: 20px;">
        `;
        agregarProductoAlCarrito(productoHTML, 120);
    });

    $('#agregarAlCarrito6').on('click', function() {
        const productoHTML = `
            <p class="nombre-producto" style="margin-bottom: 10px; font-weight: bold;">PLAYERA DE JUEGOS</p>
            <p class="precio-producto">$100</p>
            <img src="{{ asset('img/IA6.jpeg') }}" alt="Producto 6" style="width: 50%; height: auto; border-radius: 20px;">
        `;
        agregarProductoAlCarrito(productoHTML, 100);
    });

    $('#confirmarCompra').on('click', function() {
        $('#formularioEmergente').show();
    });

    $('#cerrarFormulario').on('click', function() {
        $('#formularioEmergente').hide();
    });

    $('#formularioCompra').on('submit', function(event) {
        event.preventDefault();

        const nombre = $('#nombre').val();
        const direccion = $('#direccion').val();
        const telefono = $('#telefono').val();

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF();
        doc.text(`Nombre: ${nombre}`, 10, 10);
        doc.text(`Dirección: ${direccion}`, 10, 20);
        doc.text(`Teléfono: ${telefono}`, 10, 30);

        let y = 40;
        doc.text('Productos en el carrito:', 10, y);
        y += 10;

        $('.producto-carrito').each(function() {
            const nombreProducto = $(this).find('.nombre-producto').text();
            const precioProducto = $(this).find('.precio-producto').text();
            doc.text(`- ${nombreProducto}: ${precioProducto}`, 10, y);$('#formularioCompra').on('submit', function(event) {
    event.preventDefault();

    const nombre = $('#nombre').val();
    const direccion = $('#direccion').val();
    const telefono = $('#telefono').val();

    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Título del documento
    doc.setFontSize(18);
    doc.text('Resumen de Compra', 20, 20);

    // Información del cliente
    doc.setFontSize(12);
    doc.text(`Nombre: ${nombre}`, 20, 40);
    doc.text(`Dirección: ${direccion}`, 20, 50);
    doc.text(`Teléfono: ${telefono}`, 20, 60);

    // Productos en el carrito
    doc.setFontSize(14);
    doc.setFontStyle('bold');
    doc.text('Productos en el carrito:', 20, 80);

    let y = 90;
    $('.producto-carrito').each(function(index) {
        const nombreProducto = $(this).find('.nombre-producto').text().trim();
        const precioProducto = $(this).find('.precio-producto').text().trim();

        doc.setFontSize(12);
        doc.setFontStyle('normal');
        doc.text(`- ${nombreProducto}: ${precioProducto}`, 20, y);

        y += 10;
    });

    // Total
    const total = $('#total').text();
    doc.setFontSize(14);
    doc.setFontStyle('bold');
    doc.text(total, 20, y + 10);

    // Guardar y descargar el PDF
    doc.save('resumen_compra.pdf');

    alert('¡Gracias por tu compra!');
    $('#formularioEmergente').hide();
});

            y += 10;
        });

        const total = $('#total').text();
        doc.text(total, 10, y);

        doc.save('Compra_misthu.pdf');

        alert('¡Gracias por tu compra!');
        $('#formularioEmergente').hide();
    });
});



</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script>
    function toggleFavorito(button) {
        button.classList.toggle('favorito-activo');
    }
</script>
<script>
    function toggleFavorito(button) {
        button.classList.toggle('favorito-activo');
        if (button.classList.contains('favorito-activo')) {
            mostrarMensaje('Favorito Agregado');
        } else {
            mostrarMensaje('Favorito desmarcado');
        }
    }

    function mostrarMensaje(mensaje) {
        alert(mensaje);
    }
</script>

    
</body>
</html>
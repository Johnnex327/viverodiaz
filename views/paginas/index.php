<main class="contenedor seccion">
    <h1>Más Sobre Nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Contamos con años de expriencias orientado a la venta de plantulas de cacao, nuestros clientes son nuestro respaldo.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Precio</h3>
            <p>
                Contamos con los mejores precios del mercado en todo Zhucay, Vivero Diaz es tu eleccion!
            </p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>
                El desarrollo de las plantas de cacao en sus diversas variedades son totalmente garantizadas, al disponer de productos de alta calidad.
            </p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2>Plantas disponibles</h2>

    <?php 
        include 'listado.php';
    ?>

    <div class="alinear-derecha">
        <a href="/propiedades" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Contacte con nosotros</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
    <a href="/contacto" class="boton-amarillo">Contactános</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada">
                    <h4>¿Qué cuidados dan a las plantas en un vivero?</h4>
                    <p>Escrito el: <span>09/06/2022</span> por: <span>Admin</span> </p>

                    <p>
                        Los productores de plantas tienen en cuenta una serie de factores como ...
                    </p>

                </a>
            </div>
        </article>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Texto Entrada Blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="/entrada2">
                    <h4>¿En qué consiste un invernadero inteligente?</h4>
                    <p>Escrito el: <span>02/06/2022</span> por: <span>Admin</span> </p>

                    <p>
                        Un invernadero inteligente tiene la capacidad de controlar las variables ambientales que afectan al cultivo ...
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
            </blockquote>
            <p>- Marco Mendoza</p>
        </div>
    </section>
</div>
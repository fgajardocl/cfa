<div class="preguntas" animelement>
    <div class="bg">
        <img class="azul" src="<?php echo get_template_directory_uri(); ?>/assets/img/cuadro-azul.svg">
        <img class="amarillo" src="<?php echo get_template_directory_uri(); ?>/assets/img/cuadro-amarillo.svg" style="display:none">
        <img class="verde" src="<?php echo get_template_directory_uri(); ?>/assets/img/cuadro-verde.svg" style="display:none">
    </div>
    <form id="formQuiz" class="contenidos" action="<?php echo get_template_directory_uri(); ?>/php/send.php" enctype="multipart/form-data" method="post" target="sendForm">
        <input type="hidden" name="token">
        <div class="cont cont0" style="display:block"><div class="center"><div>
            <h2>Mide tu grado<br>
            de toxicidad en<br>
            tus relaciones</h2>
            <p>Responde las siguientes preguntas y recibirás la orientación que necesitas para lograr relaciones duraderas.</p>
            <img class="bbtn bbtn1" src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-ingresar-amarillo.svg" go-next="6|0|verde">
        </div></div></div>

        <div class="cont cont1"><div class="center"><div>
            <h3>Tengo relaciones que sé<br>
                que no me aportan y no<br>
                me arrepiento</h3>
            <div class="radios">
                <div class="radio" go-next="2|1|azul" data="1"><i></i><label>Siempre</label></div>
                <div class="radio" go-next="2|1|azul" data="2"><i></i><label>A veces</label></div>
                <div class="radio" go-next="2|1|azul" data="3"><i></i><label>Nunca</label></div>
            </div>
            <input type="hidden" name="preg1">
        </div></div></div>
        <div class="cont cont2"><div class="center"><div>
            <h3>Me precipito<br>
                adquiriendo vínculos<br>
                por comodidad</h3>
            <div class="radios">
                <div class="radio" go-next="3|2|amarillo" data="1"><i></i><label>Siempre</label></div>
                <div class="radio" go-next="3|2|amarillo" data="2"><i></i><label>A veces</label></div>
                <div class="radio" go-next="3|2|amarillo" data="3"><i></i><label>Nunca</label></div>
            </div>
            <input type="hidden" name="preg2">
        </div></div></div>
        <div class="cont cont3"><div class="center"><div>
            <h3>En mis vínculos realizo<br>
                actos sin pensar bien<br>
                las consecuencias</h3>
            <div class="radios">
                <div class="radio" go-next="4|3|azul" data="1"><i></i><label>Siempre</label></div>
                <div class="radio" go-next="4|3|azul" data="2"><i></i><label>A veces</label></div>
                <div class="radio" go-next="4|3|azul" data="3"><i></i><label>Nunca</label></div>
            </div>
            <input type="hidden" name="preg3">
        </div></div></div>
        <div class="cont cont4"><div class="center"><div>
            <h3>Me dejo llevar por impulsos<br>
                que me llevan a relaciones de<br>
                satisfacción inmediata</h3>
            <div class="radios">
                <div class="radio" go-next="5|4|amarillo" data="1"><i></i><label>Siempre</label></div>
                <div class="radio" go-next="5|4|amarillo" data="2"><i></i><label>A veces</label></div>
                <div class="radio" go-next="5|4|amarillo" data="3"><i></i><label>Nunca</label></div>
            </div>
            <input type="hidden" name="preg4">
        </div></div></div>
        <div class="cont cont5"><div class="center"><div>
            <h3>Me enfrento a<br>
                relaciones que podría<br>
                desechar rápidamente</h3>
            <div class="radios">
                <div class="radio" go-next="7|5|verde" data="1"><i></i><label>Siempre</label></div>
                <div class="radio" go-next="7|5|verde" data="2"><i></i><label>A veces</label></div>
                <div class="radio" go-next="7|5|verde" data="3"><i></i><label>Nunca</label></div>
            </div>
            <input type="hidden" name="preg5">
        </div></div></div>

        <div class="cont cont6"><div class="center"><div>
            <h3>Por favor ingresa tus datos<br>para realizar al test</h3>
            <h6>Nos comprometemos a guardar la privacidad de tus datos.</h6>

            <input type="text" name="nombre" placeholder="NOMBRE">
            <div class="error error_nombre">Debe ingresar un nombre</div>

            <input type="text" name="email" placeholder="E-MAIL">
            <div class="error error_email">Debe ingresar un email válido</div>

            <input type="text" name="telefono" placeholder="TELÉFONO">
            <div class="error error_telefono">Debe ingresar un teléfono válido</div>

            <div>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-comienzatutest-azul.svg" class="bbtn bbtn1 btnValidarForm" hidden-go-next="1|6|amarillo">
            </div>
        </div></div></div>

        <div class="cont cont7"><div class="center"><div>
            <h4>Has completado<br>con éxito el test</h4>
            <p>Continúa para recibir tu resultado.</p>
            
            <div>
                <button type="submit">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/btn-enviar-azul.svg" class="bbtn bbtn3">
                </button>
            </div>
        </div></div></div>

        <div class="cont cont8"><div class="center"><div>
            <h4>¡MUCHAS GRACIAS!</h4>
            <p>Tu resultado ha sido<br>enviado a tu e-mail.</p>
        </div></div></div>
    </form>
</div>
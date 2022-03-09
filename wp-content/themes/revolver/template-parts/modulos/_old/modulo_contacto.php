<div class="modulo_contacto <?php the_sub_field('estilo');?>">
    <div class="wrap">
        <div class="cont">
            <h2><?php the_sub_field('titulo');?></h2>
            <form>
                <div class="input">
                    <label>NOMBRE</label>
                    <input type="text" name="nombre">
                </div>
                <div class="input">
                    <label>E-MAIL</label>
                    <input type="text" name="mail">
                </div>
                <div class="input">
                    <label>REQUERIMIENTO</label>
                    <input type="text" name="requerimiento">
                </div>
                <button type="submit">ENVIAR</button>
            </form>
        </div>
    </div>
</div>
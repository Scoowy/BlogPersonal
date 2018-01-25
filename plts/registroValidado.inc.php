<fieldset>
    <legend>Informacion personal</legend>
    <div class="form-group">
        <label>Nombre de usuario</label>
        <input class="form-control" placeholder="(Min-6  Max-24 caracteres)" type="text" name="nombre" <?php $validador->mostrarNombre() ?>>
        <?php
        $validador->mostrarErrorNombre();
        ?>
        <small id="userNamelHelp" class="form-text text-muted">Evita usar nombres que resulten obsenos o demigrantes para el resto de la comunidad.</small>
    </div>
    <div class="form-group">
        <label>Correo electrónico</label>
        <input class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ejemplo@dominio.com" type="email" name="email" <?php $validador->mostrarEmail() ?>>
        <?php
        $validador->mostrarErrorEmail();
        ?>
        <small id="emailHelp" class="form-text text-muted">Nunca compartiremos su correo electrónico con nadie más.</small>
    </div>
    <div class="form-group">
        <label>Contrasena</label>
        <input class="form-control" type="password" name="clave1">
        <?php
        $validador->mostrarErrorClave1();
        ?>
        <small id="passwordlHelp" class="form-text text-muted">Max 12 caracteres, debe incluir minimo un numero y un caracter especial( @ , - , _ ).</small>
    </div>
    <div class="form-group">
        <label>Repite la contrasena</label>
        <input class="form-control" type="password" name="clave2">
        <?php
        $validador->mostrarErrorClave2();
        ?>
        <small id="passwordlHelp2" class="form-text text-muted">.</small>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
        <button type="reset" class="btn btn-danger btn-sm">Limpiar</button>
    </div>
</fieldset>
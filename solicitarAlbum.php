<!-- CABECERA -->
<?php
    require_once('sesion/sesion.php');
	require_once('includes/controlAcceso.php');
?>
<!-- FIN CABECERA  ?> -->      

    <main>
        <form class="card" action="albumSolicitado.php" method="POST">
            Descripción: 
            <p class="anuncio"> 
                Este texto describe el funcionamiento de cómo se debe solicitar un álbum. En primer lugar,
                el nombre y apellidos son obligatorios para el envío postal y personalización del álbum. Las tarifas dependen
                del número de páginas, de la resolución y del color de la portada. El título del álbum tiene un máximo de 200
                carácteres y es obligatorio. El texto adicional será una dedicatoria o una descripción del álbum. El correo que
                se debe poner es el del destinatario para posibles notificaciones. En impresión a color seleccione la casilla
                si desea que se imprima a color o dejela deseleccionada para imprimir el álbum en blanco y negro.
            </p>
            <p>Tarifas:</p>
            <table style="margin: auto">
                <tr>
                    <th>Concepto</th>
                    <th>Tarifa</th>
                </tr>
                <tr>
                    <td>&lt; 5 Páginas</td>
                    <td>0.10 € por página</td>
                </tr>
                <tr>
                    <td>Entre 5 y 10 páginas</td>
                    <td>0.08 € por página</td>
                </tr>
                <tr>
                    <td>> 11 páginas</td>
                    <td>0.07 € por página</td>
                </tr>
                <tr>
                    <td>Blanco y Negro</td>
                    <td>0 €</td>
                </tr>
                <tr>
                    <td>Color</td>
                    <td>0.05 € por foto</td>
                </tr>
                <tr>
                    <td>Resolución > 300 DPI</td>
                    <td>0.02 € por foto</td>
                </tr>
            </table>
            
            * Campos obligatorios
            <p>
            <label>
                Nombre
                <input type="text" name="nombre" maxlength="200" required placeholder="Enter your Name">*
            </label>
            </p>
            <p>
            <label>
                Apellidos
                <input type="text" name="apellidos" maxlength="200" required placeholder="Enter your surname">*
            </label>
            </p>
            <p>
            <label>
                Título delálbum
                <input type="text" name="album" maxlength="200" required placeholder="200 carácteres">*
            </label>
            </p>
            <p>
            <label>
                Texto adicional
                <textarea rows="3" cols="30" name="textadic" maxlength="4000" placeholder="Enter your text here"></textarea>
            </label>
            </p>
            <p>
            <label>
                Correo electrónico:
                <input type="email" name="email" required placeholder="Enter your e-mail" maxlength="200">*
            </label>
            </p>
            <fieldset>
            <legend>Dirección postal*</legend>
            <p>    
            <label>
                    Calle
                    <input type="text" name="calle" placeholder="Calle" required>
                </label>
                </p>
                <p>
                <label>
                    Número
                    <input type="text" name="numero" placeholder="Número" required>
                </label>
                </p>
                <p>
                <label>
                    Puerta
                    <input type="text" name="puerta" placeholder="Puerta" required>
                </label>
                </p>
                <p>
                <label>
                    Ciudad
                    <input type="text" name="ciudad" placeholder="Ciudad" required>
                </label>
                <p>
                <label>
                    Provincia
                    <input type="text" name="provincia" placeholder="Provincia" required>
                </label>
                </p>
                <p>
                <label>
                    Código Postal
                    <input type="number" name="cpostal" placeholder="Cod.Postal" required>
                </label>
                </p>
            </fieldset>
            <p>
            <label>
                Color de portada
                <input type="color" name="favcolor">
            </label>
            </p>
            <p>
            <label>
                Número de copias
                <input type="number" name="copias" min="1" value="1" required>*
            </label>
            </p>
            <p>
            <label>
                Resolución de fotos
                <input type="number" name="resfoto" min="150" max="900" step="150" value="150">
            </label>
            </p>
            <p>
            <label>
                Álbum a escoger
                <select name="Álbumes">
                    <option value="1">Mis álbumes</option>
                    <option value="2">Álbum X</option>
                    <option value="3">Álmbum Y</option>
                </select>
            </label>*
            </p>
            <p>
            <label>
                Fecha de recepción:
                <input type="date" name="fecentrega">
            </label>
            </p>
            <p>
            <label>
                <input type="checkbox" name="impColor" value="unit-in-group" />Impresión a color
            </label>
            </p>
            <input type="submit" value="Enviar">
        </form>
    </main>

<!-- PÍE DE PÁGINA -->
    <?php include_once("includes/pie.inc"); ?>
<!-- FIN PÍE -->